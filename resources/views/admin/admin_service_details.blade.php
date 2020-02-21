@extends('layouts.admin-master')


@section('content')

<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
          <li class="breadcrumb-item active">Service Request Details</li>
        </ol>
      </div>
      <h4 class="page-title">Service Request Details</h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <!-- Portlet card -->
    <div class="card">
      <div class="card-body">
        <div class="card-widgets">
          <p>
            @if ($service_request['status'] === 'new')
              <span class="badge badge-primary status">New</span>
            @endif

            @if ($service_request['status'] === 'pending')
              <span class="badge badge-warning status">Pending</span>
            @endif

            @if ($service_request['status'] === 'cancelled')
              <span class="badge badge-danger status">Cancelled</span>
            @endif

            @if ($service_request['status'] === 'completed')
              <span class="badge badge-success status">Completed</span>
            @endif
            <br>
          </p>
        </div>
        <h4 class="card-title mb-3">SRID0{{ $service_request['id'] }} - {{ $service_request['service_type']['name'] }} 
        <br> <small>Submitted date: {{ date('Y-m-d h:i:s', strtotime($service_request['created_at'])) }}</small></h4>

        <br>

        <p class="text-muted">REQESTOR DETAILS</p>

        <div class="row mt-2">
          <div class="col-md-2">
            <h6 class="text-muted">Client ID</h6>
            <p>CL0{{ $service_request['client']['id']}}</p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">Requested By</h6>
            <p>{{ $service_request['client']['firstname'] . ' ' . $service_request['client']['lastname'] }}</p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">Contact Number</h6>
            <p>{{ $service_request['client']['contact_number'] }}</p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">Email Address</h6>
            <p>{{ $service_request['client']['user']['email'] }}</p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">Address</h6>
            <p>{{ $service_request['client']['address'] }}</p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">No. of Request Records</h6>
            <p>2</p>
          </div>
        </div>

        <br><br>

        <p class="text-muted">SERVICE DETAILS</p>

        <div class="row mt-2">
          <div class="col-md-3">
            <h6 class="text-muted">Service ID</h6>
            <p>SR0{{ $service_request['service_type']['id'] }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Status</h6>
            <p>{{ ucfirst($service_request['status']) }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Submitted Date</h6>
            <p>{{ date('Y-m-d h:i:s', strtotime($service_request['created_at'])) }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Service Date and Time</h6>
            <p>{{ date('g:i:A', strtotime($service_request['timeslot']['start'])) }} - 
              {{ date('g:i:A', strtotime($service_request['timeslot']['end'])) }}  
              {{ date('M d, Y', strtotime($service_request['service_date'])) }} </p>
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-md-3">
            <h6 class="text-muted">Service Type</h6>
            <p>{{ $service_request['service_type']['name'] }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Property Type</h6>
            <p>{{ $service_request['property']['name'] }}</p>
          </div>
          <div class="col-md-6">
            @foreach ($service_request['appliances'] as $i => $appliance)
            <div class="row">
              <div class="col-md-6">
                @if ($i === 0)
                <h6 class="text-muted">Appliance Type</h6>
                @endif
                <p>{{ $appliance['name'] }} ({{ $appliance['pivot']['qty'] }}) </p>
              </div>
              <div class="col-md-6">
                @if ($i === 0)
                <h6 class="text-muted">Unit Type and Brand</h6>
                @endif
                <p>{{ $appliance['unit']['name'] }} / {{ $appliance['brand']['name'] }}</p>
              </div>
            </div>
            @endforeach
          </div>
        </div>

        <div class="row mt-2">
          <div class="col-md-3">
            <h6 class="text-muted">Service Location</h6>
            <p>{{ $service_request['location']['name'] }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Service Address</h6>
            <p>{{ $service_request['service_address'] }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Near Landmark</h6>
            <p>{{ $service_request['near_landmark'] }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Addt'l Instructions</h6>
            <p>{{ $service_request['special_instruction'] }}</p>
          </div>
        </div>


        <br><br>

        <p class="text-muted">TECHNICIAN DETAILS</p>

        <div class="row mt-2">
          <div class="col-md-3">
            <h6 class="text-muted">Assigned Technician ID</h6>
            <p>
              @foreach ($service_request['technicians'] as $technician)
              TECH0{{ $technician['id'] }} <br>
              @endforeach
            </p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Assigned Technician</h6>
            <p>
              @foreach ($service_request['technicians'] as $technician)
              {{ $technician['username'] }} <br>
              @endforeach
            </p>
          </div>
          @if ($service_request['status'] === 'complete')
          <div class="col-md-3">
            <h6 class="text-muted">Work Done</h6>
            <p>
              @foreach ($service_request['workdone'] as $workdone)
              {{ $workdone['name'] }} <br>
              @endforeach
            </p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Remarks</h6>
            <p>
              @foreach ($service_request['remarks'] as $remark)
              {{ $remark['name'] }} <br>
              @endforeach
            </p>
          </div>
          @endif
        </div>
        <div class="row mt-2">

          <div class="col-md-3">
            <h6 class="text-muted">Date Created</h6>
            <p>{{ date('Y-m-d h:i:s', strtotime($service_request['created_at'])) }}</p>
          </div>
          @if ($service_request['updated_at'] !== null)
          <div class="col-md-3">
            <h6 class="text-muted">Date Modified</h6>
            <p>{{ date('Y-m-d h:i:s', strtotime($service_request['updated_at'])) }}</p>
          </div>
          @endif
          
          @if ($service_request['canceled_at'] !== null)
          <div class="col-md-3">
            <h6 class="text-muted">Date Cancelled</h6>
            <p>{{ date('Y-m-d h:i:s', strtotime($service_request['canceled_at'])) }}</p>
          </div> 
          @endif
        </div>
      </div>
    </div> <!-- end card-->


    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">

            <h4 class="header-title">Billing Details

              <td>
                <button type="button" class="btn btn-secondary btn-sm float-right"><i class="fe-pencil"></i> Modify
                  Payment</button>
              </td>
            </h4>

            <div class="row mt-2">
              <div class="col-md-4">
                <h6 class="text-muted">Billing ID</h6>
                <p>{{ '-' }}</p>
              </div>
              <div class="col-md-4">
                <h6 class="text-muted">Reference NO.</h6>
                <p>{{ '-' }}</p>
              </div>
              <div class="col-md-4">
                <h6 class="text-muted">Due Date</h6>
                <p>{{ date('m/d/Y', strtotime($service_request['created_at'])) }}</p>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-4">
                <h6 class="text-muted">Total Amount</h6>
                <p>{{ 0 }}</p>
              </div>
              <div class="col-md-4">
                <h6 class="text-muted">Mode of Payment</h6>
                <p>{{ $service_request['payment_mode']['name'] }}</p>
              </div>
              <div class="col-md-4">
                <h6 class="text-muted">Status</h6>
                <p>{{ $service_request['is_paid'] ? 'Paid' : 'Not yet paid' }}</p>
              </div>
              
            </div>

            @if ($service_request['receipt_payment_file'] !== null)
            <div class="row mt-2">
              <div class="col-md-12">
                <h6 class="text-muted">Receipt</h6>
                <p>
                  <button type="button" 
                    id="view_receipt"
                    data-sr_id="{{ $service_request['id'] }}"
                    data-payment_receipt_filepath="{{ url('/uploads' . '/receipt_payments' . '/' . $service_request['receipt_payment_file']) }}"
                    class="btn btn-primary btn-sm" 
                    data-toggle="modal"
                    data-target="#viewReceipt">View Receipt</button>
                </p>
              </div>
            </div>  
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>



<!-- Modal Content -->
<div id="viewReceipt" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="confirm_payment">
        @csrf
        <input type="hidden" name="service_request_id">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Payment Receipt
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
  
          <p>Reference No:</p>
          <p>Submitted Date and Time:</p>
          <br>
          <div>
            <img id="payment_receipt" width="100%" height="100%" src="">
          </div>
  
        </div>
        @if (!$service_request['is_paid'])
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary waves-effect waves-light">Confirm</button>
        </div>
        @endif
        
      </form>
      
    </div>
  </div>
</div>

<!-- End of Modal Content -->
@endsection

@push('scripts')

<script type="text/javascript">
  $(document).ready(function(){

    $('button#view_receipt').on('click', function(){
      const sr_id = $(this).attr('data-sr_id');
      $('input[name="service_request_id"]').val(sr_id);
      const payment_receipt_filepath = $(this).attr('data-payment_receipt_filepath');
      $('img#payment_receipt').attr('src', payment_receipt_filepath);
    });

    $('form#confirm_payment').on('submit', function(evt){
      evt.preventDefault();
      $.ajax({
        url:"{{ url('admin/service_request/confirm_payment') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method:"POST",
        data: new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
          console.log(res);
          Swal.fire(
            res.title,
            res.message,
            res.type
          ).then(() => {
            window.location.reload();
          });
          
        },

        error: function(err) {
          console.log(err);
        }
      });
    });
  });
</script>

@endpush