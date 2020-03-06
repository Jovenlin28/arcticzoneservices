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
            <button type="button" class="btn btn-outline-secondary waves-effect waves-light">
              @if ($service_request['is_paid'])
              <span>Waiting for assignment</span>
              @else
              <span>Waiting for payment</span>
              @endif
            </button>
            @endif

            @if ($service_request['status'] === 'pending')
            <button type="button" class="btn btn-outline-primary waves-effect waves-light">Assigned Request</button>
            @endif

            @if ($service_request['status'] === 'cancelled')
            <button type="button" class="btn btn-outline-danger waves-effect waves-light">Cancelled Request</button>
            @endif

            @if ($service_request['status'] === 'completed')
            <button type="button" class="btn btn-outline-success waves-effect waves-light">Completed Request</button>
            @endif
            <br>
          </p>
        </div>
        <h4 class="card-title mb-3">SRID{{ $service_request['id'] }} - {{ $service_request['service_type']['name'] }}
          <br> <small>Submitted date: {{ date('F d, Y g:i A', strtotime($service_request['created_at'])) }}</small></h4>

        <br>

        <p class="text-info"><b>REQUESTOR DETAILS</b></p>

        <div class="row mt-2">
          <div class="col-md-2">
            <h6 class="text-muted">Client ID</h6>
            <p>CL{{ $service_request['client']['id']}}</p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">Requested By</h6>
            <p>
              @if ($service_request['client_contact_person'] === null)
              {{ $service_request['client']['firstname'] . ' ' . $service_request['client']['lastname'] }}
              @else
              {{ $service_request['client_contact_person']['firstname'] . ' ' . $service_request['client_contact_person']['lastname'] }}
              @endif
            </p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">Contact Number</h6>
            <p>
              @if ($service_request['client_contact_person'] === null)
              {{ $service_request['client']['contact_number'] }}
              @else
              {{ $service_request['client_contact_person']['contact_number'] }}
              @endif
            </p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">Email Address</h6>
            <p>
              @if ($service_request['client_contact_person'] === null)
              {{ $service_request['client']['user']['email'] }}
              @else
              {{ $service_request['client_contact_person']['email'] }}
              @endif
            </p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">Address</h6>
            <p>
              @if ($service_request['client_contact_person'] === null)
              {{ $service_request['client']['address'] }}
              @else
              {{ $service_request['client_contact_person']['address'] }}
              @endif
            </p>
          </div>
          <div class="col-md-2">
            <h6 class="text-muted">No. of Request Records</h6>
            <p>2</p>
          </div>
        </div>

      </div>
    </div>

    <div class="card">
      <div class="card-body">

        <p class="text-info"><b>SERVICE DETAILS</b></p>

        <div class="row mt-2">
          <div class="col-md-3">
            <h6 class="text-muted">Service ID</h6>
            <p>SR{{ $service_request['service_type']['id'] }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Status</h6>
            <p>{{ ucfirst($service_request['status']) }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Submitted Date</h6>
            <p>{{ date('F d, Y g:i A', strtotime($service_request['created_at'])) }}</p>
          </div>
          <div class="col-md-3">
            <h6 class="text-muted">Service Date and Time</h6>
            <p>{{ date('g:i A', strtotime($service_request['timeslot']['start'])) }} -
              {{ date('g:i A', strtotime($service_request['timeslot']['end'])) }}
              {{ date('F d, Y', strtotime($service_request['service_date'])) }} </p>
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
      </div>
    </div> <!-- end card-->



    <div class="row">
      <div class="col-md-6">

        <div class="card-box">
          <div class="card-body">

            <p class="text-info"><b>TECHNICIAN DETAILS</b></p>

            <div class="row mt-2">
              <div class="col-md-6">
                <h6 class="text-muted">Assigned Technician ID</h6>
                <p>
                  @foreach ($service_request['technicians'] as $technician)
                  TECH{{ $technician['id'] }} <br>
                  @endforeach
                </p>
              </div>
              <div class="col-md-6">
                <h6 class="text-muted">Assigned Technician</h6>
                <p>
                  @foreach ($service_request['technicians'] as $technician)
                  {{ $technician['username'] }} <br>
                  @endforeach
                </p>
              </div>
            </div>
            @if ($service_request['status'] === 'complete')
            <h6 class="text-muted">Work Done</h6>
            <p>
              @foreach ($service_request['workdone'] as $workdone)
              {{ $workdone['name'] }} <br>
              @endforeach
            </p>

            <h6 class="text-muted">Remarks</h6>
            <p>
              @foreach ($service_request['remarks'] as $remark)
              {{ $remark['name'] }} <br>
              @endforeach
            </p>

            @endif

            <h6 class="text-muted">Date Created</h6>
            <p>{{ date('F d, Y h:i A', strtotime($service_request['created_at'])) }}</p>

            @if ($service_request['updated_at'] !== null)

            <h6 class="text-muted">Date Modified</h6>
            <p>{{ date('F d, Y h:i A', strtotime($service_request['updated_at'])) }}</p>

            @endif

            @if ($service_request['canceled_at'] !== null)

            <h6 class="text-muted">Date Cancelled</h6>
            <p>{{ date('F d, Y h:i A', strtotime($service_request['canceled_at'])) }}</p>

            @endif

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card-box">
          <div class="card-body">
            <p class="text-info">
              <b>BILLING DETAILS</b>
              <a href="" class="float-right">See Invoice <i class="fe-download"></i></a>

            </p>

            <div class="row mt-2">
              <div class="col-md-6">
                <h6 class="text-muted">Billing Invoice ID</h6>
                <p>-</p>
              </div>
              <div class="col-md-6">
                <h6 class="text-muted">Status</h6>
                <p>
                  <button type="button" class="btn btn-outline-primary waves-effect waves-light">
                    {{ $service_request['is_paid'] ? 'Paid' : 'Not yet paid' }}
                  </button>
                </p>
              </div>

            </div>

            @if ($service_request['receipt_payment_file'] !== null)
            <div  class="row mt-2">
              <div class="col-md-6">
                <h6 class="text-muted">Date and Time Receipt Accepted</h6>
                <p>-</p>
              </div>
              <div class="col-md-6">
                <h6 class="text-muted">Proof of Payment</h6>
                <p>
                  <button type="button" 
                    id="view_receipt" data-sr_id="{{ $service_request['id'] }}"
                    data-is_paid="{{ $service_request['is_paid'] }}"
                    data-payment_receipt_filepath="{{ url('/uploads' . '/receipt_payments' . '/' . $service_request['receipt_payment_file']) }}"
                    class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewReceipt">View Receipt
                  </button>
                  </a>
                </p>
              </div>
            </div>
            @endif

            <div class="row mt-2">
              <div class="col-md-6">
                <h6 class="text-muted">Mode of Payment</h6>
                <p>{{ $service_request['payment_mode']['name'] }}</p>
              </div>
              <div class="col-md-6">
                <h6 class="text-muted">Total Payment</h6>
                <p>
                  <b>{{ number_format($service_request['total_amount'], 2) }}</b>
                </p>
              </div>
            </div>

            <div class="row mt-2">
              <div class="col-md-6">
                <h6 class="text-muted">Date and Time Modified</h6>
                <p>-</p>
              </div>
              <div class="col-md-6">
                <h6 class="text-muted">Date and Time Collected</h6>
                <p>-</p>
              </div>
            </div>


            <button type="button" class="btn btn-primary btn-md float-right" data-toggle="modal"
              data-target="#modifyPayment">
              <i class="fe-edit-2"></i> Modify Payment
            </button>

            <br>
            <br>
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

          <p>Date and Time Submitted: <br>
            -
          </p>

          <p>Receipt / Reference Number: <br>
            -
          </p>
          <br>
          <div>
            <img id="payment_receipt" width="100%" height="100%" src="">
          </div>

        </div>
        <div id="view_receipt_footer" class="modal-footer">
          <button type="submit" class="btn btn-primary waves-effect waves-light">Accept</button>
          <button id="decline_payment" type="button" class="btn btn-secondary waves-effect waves-light">Decline</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- End of Modal Content -->

<div id="modifyPayment" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Billing ID:
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">


        <h4 class="header-title">Additional Payments</h4>
        <p class="sub-header">
          You may add new additional payments to include in client service request billing.
        </p>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <input type="text" class="form-control">
            </div>
          </div>
          <div class="col-md-2">
            <button class="btn btn-secondary btn-md" type="button">Add Fee/s</button>
          </div>
        </div>

        <br>

        <h4 class="header-title">Breakdown of Payments</h4>
        <p class="sub-header">
          Shows the list of description of payments.
        </p>


        <div class="table-responsive">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th>Description</th>
                <th># of Units</th>
                <th>Total</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th>Window 2HP, 3HP Cleaning</th>
                <td>2</td>
                <td>100.00</td>
              </tr>

              <tr>
                <th>Window 2HP, 3HP Cleaning</th>
                <td>2</td>
                <td>100.00</td>
              </tr>

            </tbody>
          </table>
        </div> <!-- end table-responsive-->

        <h4 class="float-right"><b>Grand Total : PHP 200.00</b></h4>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary waves-effect waves-light">Modify</button>
        <button type="button" class="btn btn-secondary waves-effect waves-light">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- End of Modal Content -->

@endsection

@push('scripts')

<script type="text/javascript">
  $(document).ready(function(){

    $('button#decline_payment').on('click', function(){
      $.ajax({
        url:"{{ url('admin/service_request/decline_payment') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method:"POST",
        data: new FormData($('form#confirm_payment')[0]),
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

    $('button#view_receipt').on('click', function(){
      const sr_id = $(this).attr('data-sr_id');
      $('input[name="service_request_id"]').val(sr_id);
      const payment_receipt_filepath = $(this).attr('data-payment_receipt_filepath');
      const is_paid = +$(this).attr('data-is_paid');
      if (is_paid) {
        $('#view_receipt_footer').hide();
      }
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