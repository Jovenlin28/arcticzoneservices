@extends('layouts.client-master')


@section('content')

<div class="content-page">
  <div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <h4 class="page-title">Home</h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-12">
          <div class="card card-body"
            style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.0), 0 2px 2px 0 rgba(0, 0, 0, 0.1);">
            <h5>Personal Information
              <a href="/client/account_settings"><small class="float-right"><i class="fa fa-edit"></i>
                  Update Profile</small></a>
            </h5>
            <hr>
            <div class="row">

              <div class="col-md-3">
                <p class="text-muted">Full Name</p>
                <p>
                  {{ Auth::user()->client->firstname . ' ' . Auth::user()->client->lastname}}
                </p>
              </div>
              <div class="col-md-3">
                <p class="text-muted">Contact Number</p>
                <p>{{ Auth::user()->client->contact_number }}</p>
              </div>
              <div class="col-md-3">
                <p class="text-muted">Email Address</p>
                <p>{{ Auth::user()->email }}</p>
              </div>
              <div class="col-md-3">
                <p class="text-muted">Address</p>
                <p>{{ Auth::user()->client->address }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">

        <div class="col-lg-12">
          <div class="card"
            style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.0), 0 2px 2px 0 rgba(0, 0, 0, 0.1); background-color: #F2F4F5;">

            <ul class="nav nav-tabs nav-bordered nav-justified">
              <li class="nav-item">
                <a href="#new-b2" data-toggle="tab" aria-expanded="true" class="nav-link active">
                  New Requests ({{ count($client['service_requests_category']['new']) }})
                </a>
              </li>
              <li class="nav-item">
                <a href="#pending-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                  Pending Requests ({{ count($client['service_requests_category']['pending']) }})
                </a>
              </li>
              <li class="nav-item">
                <a href="#completed-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                  Completed Requests ({{ count($client['service_requests_category']['completed']) }})
                </a>
              </li>
              <li class="nav-item">
                <a href="#cancelled-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
                  Cancelled Requests ({{ count($client['service_requests_category']['cancelled']) }})
                </a>
              </li>
            </ul>
          </div>

          <div class="tab-content mb-0">
            @foreach ($client['service_requests_category'] as $category => $service_requests)
            <div class="tab-pane {{ $category === 'new' ? 'active' : ''}}" id="{{$category}}-b2">
              @foreach ($service_requests as $request)
              <div class="row">
                <div class="col-md-3">
                  <div class="card-box">
                    <div class="card-widgets">
                      <a data-toggle="collapse" href="#sr{{$request['id']}}" role="button" aria-expanded="false"
                        aria-controls="cardCollpase2">
                        <i class="mdi mdi-minus"></i></a>
                    </div>

                    <h5 class="card-title text-primary">
                      {{ ucfirst($category) }} Requests
                    </h5>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        SR00{{ $request['id'] }}
                      </div>
                      <div class="col-md-6">
                        {{ $request['service_date'] }}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-9">
                  <div id="sr{{$request['id']}}" class="card-box collapse">
                    <h5>Service Request Information</h5>
                    <hr>
                    @if ($category === 'new')
                      @if ($request['receipt_payment_file'] === null)
                      <p>Before we assign your service requested to our technician. Kindly pay first
                        using our given voucher and send us your receipt of payment 
                        <a href="" 
                          id="{{$request['id']}}"
                          class="receipt_payment"
                          data-toggle="modal"
                          data-target="#attachReceiptPayment">here</a>.
                      </p>
                      @else
                        <a href="" 
                        data-payment_receipt_filepath="{{ url('/uploads' . '/receipt_payments' . '/' . $request['receipt_payment_file']) }}"
                        class="view_payment_receipt"
                        data-toggle="modal"
                        data-target="#viewReceiptPayment">View payment receipt</a>.
                      @endif
                    @endif
                    <p class="text-muted mt-4"><b>SERVICE DETAILS</b></p>
                    <div class="row">
                      <div class="col-md-3">
                        <p class="text-muted">Service ID</p>
                        <p>SR00{{ $request['id'] }}</p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Status</p>
                        <p>{{ ucfirst($category)}} </p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Submitted Date</p>
                        <p> {{ $request['service_date'] }}</p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Service Date</p>
                        <p>
                          {{ date('g:iA', strtotime($request['timeslot']['start'])) }} -
                          {{ date('g:iA', strtotime($request['timeslot']['end'])) }}
                          <br> {{ date('M d, Y', strtotime($request['service_date'])) }}
                        </p>
                      </div>

                    </div>


                    <div class="row mt-3">
                      <div class="col-md-3">
                        <p class="text-muted">Service Type</p>
                        <p>{{ $request['service_type']['name'] }}</p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Property Type</p>
                        <p>{{ $request['property']['name'] }}</p>
                      </div>
                      <div class="col-md-6">
                        @foreach ($request['appliances'] as $i => $appliance)
                        <div class="row">
                          <div class="col-md-6">
                            @if ($i === 0)
                            <p class="text-muted">Appliance Type</p>
                            @endif
                            <p>{{ $appliance['name'] }} ({{ $appliance['pivot']['qty'] }}) </p>
                          </div>
                          <div class="col-md-6">
                            @if ($i === 0)
                            <p class="text-muted">Unit Type and Brand</p>
                            @endif
                            <p>{{ $appliance['unit']['name'] }} / {{ $appliance['brand']['name'] }}</p>
                          </div>
                        </div>
                        @endforeach

                      </div>


                    </div>


                    <div class="row mt-3">

                      <div class="col-md-3">
                        <p class="text-muted">Service Location</p>
                        <p>{{ $request['location']['name'] }}</p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Service Address</p>
                        <p> {{ $request['service_address'] }} </p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Near Landmark</p>
                        <p>{{ $request['near_landmark'] }}</p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Addt'l Instructions</p>
                        <p>{{ $request['special_instruction'] }}</p>
                      </div>

                    </div>

                    @if ($category !== 'new')
                    <div class="row mt-3">
                      <div class="col-md-6">
                        <p class="text-muted">Assigned Technician</p>
                        <p>
                          @foreach ($request['technicians'] as $technician)
                          {{ $technician['username'] }} <br>
                          @endforeach
                        </p>
                      </div>
                      @if ($category === 'completed')
                      <div class="col-md-6">
                        <p class="text-muted">Date and Time Completed</p>
                        <p>{{ date('g:i A M d, Y', strtotime($request['completed_at'])) }}</p>
                      </div>
                      @endif
                    </div>
                    @endif

                    <p class="text-muted mt-4"><b>PAYMENT DETAILS</b> </p>

                    <div class="row">

                      <div class="col-md-3">
                        <p class="text-muted">Mode of Payment</p>
                        <p>{{ $request['payment_mode']['name']}}</p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Status</p>
                        <p> {{ $request['is_paid'] ? 'Paid' : 'Not Paid' }}</p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Total Payment</p>
                        <p>
                          <a onclick="show_client_billing({{ $client['id'] }}, {{ $request['id'] }})" href="#">See full details</a>
                        </p>
                      </div>
                      <div class="col-md-3">
                        <p class="text-muted">Date and Time Received</p>
                        <p>-</p>
                      </div>
                    </div>
                    @if ($category === 'pending')
                    <div class="mt-5">
                      <button type="button" data-service-request-id="{{ $request['id'] }}" style="width: 49%;"
                        class="reschedule-service-request btn btn-primary waves-effect waves-light" data-toggle="modal"
                        data-target="#myReschedule">Reschedule Request</button>
                      <button type="button" 
                        onclick="cancelServiceRequest( {{$request['id']}} )"
                        style="width: 50%;" 
                        class="btn btn-danger waves-effect waves-light">Cancel
                        Request</button>
                    </div>
                    <br><br>
                    @endif
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            @endforeach
          </div>
        </div>
      </div> <!-- end card-box-->
    </div> <!-- end col -->
  </div>
  <!-- end row -->



  <!-- sample modal content -->
  <div id="attachReceiptPayment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="attach_receipt_payment" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="service_request_id">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Payment Receipt</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
  
            <p>Please attach the file here. Use your Service Request ID number in image name. We only accept the
              image with 300-400 KB (kilobytes).</p>
            <div class="form-group">
              <label for="receipt_payment">Attach Payment Receipt</label><br>
              <input name="file" type="file" id="receipt_payment">
              <p class="help-block"></p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary waves-effect waves-light">Send</button>
          </div>
        </form>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div id="viewReceiptPayment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Payment Receipt</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <img width="100%" src="" id="payment_receipt">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <div id="myReschedule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Reschedule Service Request</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">

          <p>Set your desire date and timeslot of your service request. You can only reschedule your service
            request <b>2</b> times.</p>

          <div class="form-group mb-3">
            <label>Select Date</label>
            <div id="datepicker"></div>
          </div>

          <label>Select Timeslot</label>
          <select id="new-timeslot-id" class="form-control">
            @foreach ($timeslots as $timeslot)
            <option value="{{ $timeslot->id }}">
              {{ date('g:i A', strtotime($timeslot->start)) }} -
              {{ date('g:i A', strtotime($timeslot->end)) }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" id="reschedule-service-request"
            class="btn btn-primary waves-effect waves-light">Save</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div> <!-- container -->
</div> <!-- content -->

</main>

<script type="text/javascript">
  let service_request_id;
	$(document).ready(function(){
		
		$('#datepicker').datepicker({
			showButtonPanel: true,
			startDate: "now()" ,
			daysOfWeekDisabled: '06',
			dateFormat : 'MM dd, yy'
    });
    
    $('a.receipt_payment').on('click', function(){
      const sr_id = $(this).attr('id');
      $('input[name="service_request_id"]').val(sr_id);
    });

    $('a.view_payment_receipt').on('click', function(){
      const payment_receipt_filepath = $(this).attr('data-payment_receipt_filepath');
      $('img#payment_receipt').attr('src', payment_receipt_filepath);
    });

		$('button.reschedule-service-request').on('click', function(){
			service_request_id = $(this).attr('data-service-request-id');
    });
    
    $('form#attach_receipt_payment').on('submit', function(evt){
      evt.preventDefault();
      $.ajax({
        url:"{{ url('client/service_request/attach_receipt_payment') }}",
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
          if (res.errors) {
            Swal.fire(
              'Error uploading files:',
              res.errors.file[0],
              'error'
            )
          } else {
            Swal.fire(
              res.title,
              res.message,
              res.type
            ).then(() => {
              // $('.photo-preview').html(res.uploaded_image);
              window.location.reload();
            });
          }
          
        },

        error: function(err) {
          console.log(err);
        }
      });
    });

		$('button#reschedule-service-request').on('click', function(){
			const timeslot_id = $('select#new-timeslot-id').val();
			const service_date = $('#datepicker').datepicker('getDate');
			$.ajax({
				url: ' {{url("service-request/reschedule")}} ',
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				data: {timeslot_id, service_date, service_request_id},
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

  function show_client_billing(client_id, sr_id) {
    window.location = `/client/generate_reports/client_billing_report?client_id=${client_id}&sr_id=${sr_id}`;
  }
  
  function cancelServiceRequest(id) {
    Swal.fire({
      title: 'Cancel Service Request ' + 'SR0' + id,
      text: "You won't be able to revert this!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Confirm'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "/client/service_request/cancel/",
          headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          method: 'PUT',
          data: {service_request_id: id},
          success: function (data){
            console.log(data);
            Swal.fire(
            data.title,
            data.message,
            data.type
            ).then(() => {
              window.location.reload();
            });
          },
          error: function(data){
              //
          }
        });
      }
    });
  }
</script>

@endsection