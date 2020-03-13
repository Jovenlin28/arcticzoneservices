@extends('layouts.admin-master')


@section('content')

<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
          <li class="breadcrumb-item active">Services</li>
        </ol>
      </div>
      <h4 class="page-title">Services</h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">

        <h4 class="header-title">Service Requested</h4>
        <p class="text-muted font-13 mb-4">
          List of all service request.
        </p>

        <table class="table dt-responsive nowrap datatable">
          <thead>
            <tr>
              <th>SRID</th>
              <th>Requested By</th>
            
              <th>Property</th>
              <th>Date and Time</th>
              <th>Assigned Tech/s</th>
              <th>Status</th>
              <th>Action</th>

            </tr>
          </thead>


          <tbody>
            @foreach ($service_requests as $service_request)
            <tr>
              <td>
                <a href="{{ url('/admin/services/service_request_details/' . $service_request['id'])}}">
                  {{ date('Y') . '-' . '0000' . $service_request['id'] }}
                </a>
              </td>
              <td>
                @if ($service_request['client_contact_person'] === null) 
                {{ $service_request['client']['firstname'] . ' ' . $service_request['client']['lastname'] }}
                @else
                {{ $service_request['client_contact_person']['firstname'] . ' ' . $service_request['client_contact_person']['lastname'] }} 
                @endif
              </td>
              <td>{{ $service_request['property']['name'] }}</td>
              <td>{{ date('F d, Y', strtotime($service_request['service_date'])) }}
                {{ date('h:i A', strtotime($service_request['timeslot']['start'])) }} -
                {{ date('h:i A', strtotime($service_request['timeslot']['end'])) }}</td>
              <td>
                @foreach ($service_request['technicians'] as $technician)
                <small> {{ $technician['username'] }} </small> <br>
                @endforeach
              </td>

              <td>
                @if ($service_request['status'] === 'new')
                <button type="button" class="btn btn-outline-secondary waves-effect waves-light">
                  @if (!$service_request['is_paid'])
                    <span>Waiting for payment</span>
                  @else
                    <span>Waiting for assignment</span>
                  @endif   
                </button>
                @endif

                @if ($service_request['status'] === 'pending')
                  @if (\Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($service_request['service_date'])))
                  <button type="button" class="btn btn-outline-warning waves-effect waves-light">On-going Request</button>
                  @else
                  <button class="btn btn-outline-warning waves-effect waves-light">
                    Pending Request
                  </button>       
                  @endif
                @endif

                @if ($service_request['status'] === 'cancelled')
                <button type="button" class="btn btn-outline-danger waves-effect waves-light">Cancelled Request</button>
                @endif

                @if ($service_request['status'] === 'completed')
                  {{-- @if (count($service_request['remarks']) === 2)
                  <button type="button" class="btn btn-outline-success waves-effect waves-light">Completed Request</button>
                  @endif --}}
                  <button type="button" class="btn btn-outline-success waves-effect waves-light">Completed Request</button>
                @endif
                
              </td>
              <td>
                @if ($service_request['status'] === 'new' && $service_request['is_paid'])
                  <button data-toggle="modal"
                    data-service-request-id="{{ $service_request['id'] }}"
                    data-target="#assign-tech" 
                    class="btn btn-primary btn-xs action on-assign-tech">Assign</button>
                @endif

                @if ($service_request['status'] === 'pending' && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($service_request['service_date'])))
                  <button data-service-request-id="{{ $service_request['id'] }}"
                    class="btn btn-warning btn-xs action complete-service-request">
                    Complete Request
                  </button>
                @endif
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>

      </div>
    </div>
    
  </div>
</div>

<div id="assign-tech" 
  class="modal fade" 
  tabindex="-1" 
  role="dialog" 
  aria-labelledby="myModalLabel" 
  aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="assign-tech" class="">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Assign Technicians</h4>
            <button type="button" 
              class="close" 
              data-dismiss="modal"
              aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <input name="service-request-id" type="hidden" value="">
            <div class="form-group">
              <label for="select-technician-1">Select Technician 1</label>
              <select name="technician-id-1" 
                id="select-technician-1" 
                class="form-control">
                @foreach ($technicians as $technician)
                <option value="{{ $technician['id'] }}">
                  {{ $technician['username'] }}
                </option>
                @endforeach
              </select>
            </div>
  
            <div class="form-group">
              <label for="select-technician-1">Select Technician 2</label>
              <select name="technician-id-2" 
                id="select-technician-2" 
                class="form-control">
                @foreach ($technicians as $technician)
                <option value="{{ $technician['id'] }}">
                  {{ $technician['username'] }}
                </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" 
              id="reschedule-service-request"
              class="btn btn-primary waves-effect waves-light">Save</button>
          </div>
        </form>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


  <script type="text/javascript">
  
    $(document).ready(function(){

      $(document).on('click', 'button.complete-service-request', function() {
        const service_request_id = $(this).attr('data-service-request-id');
        console.log(service_request_id);
        $.ajax({
          url: ' {{url("admin/services/complete_service_request")}} ',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'PUT',
          data: {service_request_id},
          success: function(data) {
            if (data.type) {
              Swal.fire(data.title, data.message, data.type)
              .then((result) => {
                window.location.reload();
              });
            } else {
                // error message
            }
          },

          error: function(err) {
            console.log(err);
          }
			  });
      });

      $(document).on('click', 'button.on-assign-tech', function(){
        const serviceRequestId = $(this).attr('data-service-request-id');
        $('input[name="service-request-id"]').val(serviceRequestId);
      });

      $(document).on('submit', 'form#assign-tech', function(e){
        e.preventDefault();
        $.ajax({
          url: ' {{url("admin/services/assign_technicians")}} ',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          data: $(this).serialize(),
          success: function(data) {
            if (data.type) {
              Swal.fire(data.title, data.message, data.type)
              .then((result) => {
                window.location.reload();
              });
            } else {
                // error message
            }
          },

          error: function(err) {
            console.log(err);
          }
			  });
      })
    });
  </script>

@endsection