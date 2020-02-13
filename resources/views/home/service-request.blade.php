@extends('layouts.home-master')



@section('content')

<!--  ======================= Start Header Area ============================== -->

<header class="header_area">
  <div class="main-menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="/"><img src="{{ asset('home/img/arctic-zone-logo.png')}}" alt="logo" height="48"
          width="130"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mr-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/">Our Services <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pricing">Pricing <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/registration">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/client/auth/login">Log In</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<!--  ======================= End Header Area ============================== -->

<main class="site-main">
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <section>
          <form id="service-request">
            <input type="hidden" name="client_id" value="{{ Auth::user()->client->id }}">
            <div class="steps">
              <div class="step1 step">
                <h6 class="mt-4">Step 1 of 6 : LOCATION</h6>
                <h2 class="mt-1 m-0" style="color: #1988f1;">Where is the aircon located?</h2>
                <br>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><b>Service City</b></label>
                      <select name="location_id" class="form-control" width="200%">
                        @foreach ($locations as $location)
                        <option value="{{ $location->id }}">
                          {{ $location->name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><b>Property Type</b></label>
                      <select name="property_type_id" class="form-control">
                        @foreach ($property_types as $property_type)
                        <option value="{{ $property_type->id }}">
                          {{ $property_type->name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <p>*Serving around Metro Manila only.</p>
              </div>
              <div class="step2 step">
                <h6 class="mt-4">Step 2 of 6 : UNIT DETAILS</h6>
                <h2 class="mt-1 m-0" style="color: #1988f1;">Which service do you need?</h2>
                <br>
                @foreach ($service_types as $service_type)
                <div class="radio">
                  <label>
                    <input type="radio" {{ $service_type->name === 'Cleaning' ? 'checked' : '' }} name="service_type_id"
                      id="service-type{{ $service_type->id }}" value="{{ $service_type->id }}">
                    {{ $service_type->name }}
                  </label>
                </div>
                @endforeach
              </div>
              <div class="step3 step">
                <h6 class="mt-4">Step 2 of 6 : UNIT DETAILS</h6>
                <h2 class="mt-1 m-0" style="color: #1988f1;">Provide your aircon details.</h2>
                <p>To find out your aircon type and fees, <a href="" data-toggle="modal" data-target="AirconInfo">see
                    here</a>.</p>
                <br>
                <div class="after-add-more m-0">
                  <div class="card">
                    @include('shared.unit-details')
                    <br>
                  </div>
                  <br>
                </div>
                <button type="button" class="btn btn-block btn-default add-more"><img style="width: 100%;"
                    src="{{ asset('home/img/add-more.png')}}"></button>
                <div class="copy invisible">
                  <div class="card control-group">
                    <button type="button" class="btn btn-sm remove" style="opacity: 30%;">
                      <span class="badge badge-secondary rounded-circle float-right"
                        style="padding: 0.6rem 0.6rem 0.6rem 0.6rem;color: white; font-size: 8px;">X</span>
                    </button>
                    @include('shared.unit-details')
                  </div>
                  <br>
                </div>
              </div>
              <div class="step4 step">
                <h6 class="mt-4">Step 3 of 6 : DATE AND TIME</h6>
                <h2 class="mt-1 m-0" style="color: #1988f1;">When do you need the service?</h2>
                <br>
                <div class="row date">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label><b>Select your date</b></label>
                      <div id="datepicker"></div>
                    </div>
                  </div>
                  <div class="col-md-6 btn-request">
                    <b>Select your timeslots</b>
                    <br>
                    @foreach ($timeslots as $timeslot)

                    <button type="button" class="timeslot btn btn-md btn-block btn-primary">
                      <label for="timeslot-{{ $timeslot->id }}">
                        <input type="radio" id="timeslot-{{ $timeslot->id }}" value="{{ $timeslot->id }}"
                          name="timeslot_id">
                        {{ $timeslot->start . ' - ' . $timeslot->end }}
                      </label>
                      <small class="small">
                        <br> 2 Technicians Left
                      </small>
                    </button>
                    @endforeach

                  </div>
                </div>
                <p>*Technician arrives within the 1st-hour of a timeslot.</p>
              </div>
              <div class="step5 step">
                <h6 class="mt-4">Step 4 of 6 : CONTACT DETAILS</h6>
                <h2 class="mt-1 m-0" style="color: #1988f1;">What are your contact details?</h2>
                <p>Is the service for your home address?</p>


                <div class="card-box">
                  <ul class="nav nav-pills navtab-bg">
                    <li class="nav-item">
                      <a href="#yes" data-toggle="tab" aria-expanded="true" class="nav-link active">
                        <i class="mdi mdi-timeline mr-1"></i>YES
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#no" data-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="mdi mdi-settings-outline mr-1"></i>NO
                      </a>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane show active" id="yes">
                      <br>
                      {{-- <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" id="firstname" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" id="lastname" placeholder="">
                          </div>
                        </div> <!-- end col -->
                      </div> <!-- end row -->

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" id="email_address" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_no" placeholder="">
                          </div>
                        </div> <!-- end col -->
                      </div> <!-- end row --> --}}

                      <div class="form-group">
                        <label>Service Address</label>
                        <input type="text" name="service_address" class="form-control" id="service-address">
                      </div>

                      <div class="form-group">
                        <label>Near Landmark</label>
                        <input type="text" name="near_landmark" class="form-control" id="near-landmark">
                      </div>


                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="addtl-instruc">Additional Instructions</label>
                            <textarea class="form-control" name="special_instruction" id="addtl-instruc" rows="4"
                              placeholder="Any special instructions to technician?"></textarea>
                            <small class="text-muted">150 characters</small>
                          </div>

                        </div> <!-- end col -->
                      </div> <!-- end row -->



                    </div>
                    <!-- end yes content-->

                    <div class="tab-pane" id="no">
                      <br>


                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact First Name</label>
                            <input type="text" class="form-control" id="contact_firstname"
                              placeholder="Enter contact firstname">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Last Name</label>
                            <input type="text" class="form-control" id="contact_lastname"
                              placeholder="Enter contact last name">
                          </div>
                        </div> <!-- end col -->
                      </div> <!-- end row -->

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" class="form-control" id="email_address" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_no" placeholder="">
                          </div>
                        </div> <!-- end col -->
                      </div> <!-- end row -->

                      <div class="form-group">
                        <label>Service Address</label>
                        <input type="text" class="form-control" id="service_address" placeholder="">
                      </div>

                      <div class="form-group">
                        <label>Near Landmark</label>
                        <input type="text" class="form-control" id="near_landmark" placeholder="">
                      </div>


                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="userbio">Additional Instructions</label>
                            <textarea class="form-control" id="addtl_instruc" rows="4"
                              placeholder="Any special instructions to technician?"></textarea>
                            <small class="text-muted">150 characters</small>
                          </div>

                        </div> <!-- end col -->
                      </div> <!-- end row -->


                    </div>
                    <!-- end settings content-->

                  </div> <!-- end tab-content -->
                </div> <!-- end card-box-->


              </div>
              <div class="step6 step">

                <h6 class="mt-4">Step 6 of 6 : PAYMENTS DETAILS</h6>
                <h2 class="mt-1 m-0" style="color: #1988f1;">Choose your mode of payment.</h2>
                <br>
                @foreach ($payment_modes as $payment_mode)
                  <div class="radio">
                    <label for="payment-mode{{ $payment_mode->id }}">
                      <input type="radio" 
                      name="payment_mode_id" 
                      id="{{ $payment_mode->name === 'Full Payment' ? 'full-payment' : 'half-payment' }}" 
                      value="{{ $payment_mode->id }}">
                      {{ $payment_mode->name }}
                    </label>
                  </div>
                @endforeach
                <br>
                <h6>Breakdown of Payments</h6>
                <table class="table mb-0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Unit Type</th>
                      <th>Appliance Type</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody id="unit-details-rows">
                    {{-- <tr>
                      <th scope="row">1</th>
                      <td>Non-Inverter</td>
                      <td>Tower</td>
                      <td>2,000.00</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Inverter</td>
                      <td>Tower</td>
                      <td>2,000.00</td>
                    </tr> --}}
                  </tbody>
                </table>
                <br>
                <h6 class="text-right" style="margin-right: 3rem;">
                  <b>Grand Total Amount:</b> Php <span id="total-payment"></span>.00
                </h6>
              </div>
            </div>
            <br>
            <div class="buttons">
              <div class="row">
                <div class="col-md-6">
                  <button type="button" id="back_btn" class="btn btn-secondary w-25">Back</button>
                </div>
                <div class="col-md-6">
                  <button type="button" id="next_btn" class="btn btn-secondary w-25 float-right">Next</button>
                  <button type="button" id="submit_btn" class="btn btn-secondary w-25 float-right">Submit</button>
                </div>
              </div>
            </div>
          </form>


        </section>

      </div>
      <div id="request_summary" class="col-md-4">
        <br><br>
        <h4 class="mt-5">Request Summary</h4>
        <div class="card mt-3">
          <div class="container">
            <p class="mt-4 m-0" style="color: #1988f1;">Appliance</p>
            <small>AIRCON</small>

            <div class="row">
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Service City</p>
                <small id="summary_location"></small>
              </div>
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Property Type</p>
                <small id="summary_property_type"></small>
              </div>
            </div>

            <p class="mt-4 m-0" style="color: #1988f1;">Service Type</p>
            <small id="summary_service_type"></small>

            <br><br>

          </div>

        </div>
        <div class="card mt-3">
          <div id="unit_details_summary_template" class="container">
          </div>
        </div>
        <div class="card mt-3">
          <div class="container">
            <br>
            <div class="row">
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Service Date</p>
                <small id="summary_service_date"></small>
              </div>
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Service Time</p>
                <small id="summary_timeslot"></small>
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>


@endsection


@push('scripts')

<script type="text/javascript">
$(document).ready(function() {
  

  //initialize variable to handle current step count
  let activeStep = 1;
  //initialize variable to handle step class
  let step = "step" + activeStep;

  let totalPayment;

  //next button click event capture
  $(document).on('click', '#next_btn', function() {
      //hide previous step
      hideStep(step);
      //iterate activeStep variable to get next step class
      step = "step" + ++activeStep;
      //show next step
      nextStep(step);

      //show back button
      $('#back_btn').attr('style', 'display: block');

      if (activeStep === 5) {
        $('.copy').remove();
        displayUnitDetailsRow();
      }

      //show submit button if active step is 6 or the step you want to have the submit
      if (activeStep == 6) {
          $('.copy').remove();
          $(this).attr('style', 'display: none');
          $('#submit_btn').attr('style', 'display: block');
          $('#request_summary').fadeIn(1000);
          displaySummary();
      }
  });

  //back button click event capture
  $(document).on('click', '#back_btn', function() {
      //prevent back button click when active step is 1
      if (activeStep > 1) {
          //hide current step
          hideStep(step);
          //
          step = "step" + --activeStep;
          //show previous step
          nextStep(step);
          //hide back button if active step is 1
          if (activeStep == 1) {
              $('#back_btn').attr('style', 'display: none');
          }
          //hide submit button if active step is not on submit step form
          if (activeStep < 6) {
              if (activeStep === 5) {
                displayUnitDetailsRow();
              }
              //show next button
              $('#next_btn').attr('style', 'display: block');
              //hide submit button
              $('#submit_btn').attr('style', 'display: none');
              $('#request_summary').hide();
          }
      }
  });

  $(".add-more").click(function() {
      var html = $(".copy").html();
      $(".add-more").before(html);
  });

  $("body").on("click", ".remove", function() {
      $(this).parents(".control-group").remove();
  });

  $('#datepicker').datepicker({
    inline: true,
    showButtonPanel: true,
    minDate: new Date(),
    daysOfWeekDisabled: [0, 6],
    dateFormat : 'MM dd, yy'
  });

  $(document).on('click', 'button#submit_btn', function() {
      const input = $('form#service-request').serializeArray();
      const transformedInput = transformData(input);
      transformedInput.service_date = $('div#datepicker').datepicker().val();
      $.ajax({
          url: ' {{url("service-request/create")}} ',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          data: { data: transformedInput },
          success: function(res) {
              window.location = ' {{url("voucher")}} '
          },

          error: function(err) {
              console.log(err);
          }
      })
  });

  $(document).on('change', 'input[name="payment_mode_id"]', function(){
    const paymentType = $(this).val();
    if (paymentType === 'full') {
      totalPayment = totalPayment*2;
    } else {
      totalPayment = totalPayment/2;
    }
    $('span#total-payment').text(totalPayment);
  });

  //show next step
  //step -> next step class ie. step2
  function nextStep(step) {
      $('.' + step).fadeIn();
  }

  //hide previous step
  //step -> next step class ie. step1
  function hideStep(step) {
      $('.' + step).fadeOut();
  }

  function transformData(input) {
      const arrayData = ['appliance_id', 'brand_id', 'unit_id'];
      return input.reduce((acc, item) => {
          if (arrayData.includes(item.name)) {
              if (!acc[item.name]) {
                  acc[item.name] = [item.value];
              } else {
                  acc[item.name].push(item.value);
              }
          } else {
              acc[item.name] = item.value;
          }
          return acc;
      }, {})
  }

  function displayUnitDetailsRow() {
    const $appliances = $('select[name="appliance_id"] option:checked');
    const $units = $('select[name="unit_id"] option:checked');

    $('input[name="payment_mode_id"]').prop('checked', false);
    $('input#full-payment').prop('checked', true);

    let unitDetails = '';
    totalPayment = 0;

    $.each($appliances, function(index, elem) {
      const fee = +elem.getAttribute('data-fee');
      totalPayment += fee;
      unitDetails += `
      <tr>
          <th scope="row">${elem.value}</th>
          <td>${$units[index].text.trim()}</td>
          <td>${elem.text.trim()}</td>
          <td>${fee}</td>
      </tr>
      `;
    });

    $('#unit-details-rows').html(unitDetails);
    $('span#total-payment').text(totalPayment);
  }

  function displaySummary() {
      const serviceType = $('input[name="service_type_id"]:checked').parent().text().trim();
      const timeslot = $('input[name="timeslot_id"]:checked').parent().text().trim();
      const location = $('select[name="location_id"] option:checked').text().trim();
      const propertyType = $('select[name="property_type_id"] option:checked').text().trim();
      const $appliances = $('select[name="appliance_id"] option:checked');
      const $units = $('select[name="unit_id"] option:checked');
      const $brands = $('select[name="brand_id"] option:checked');

      const serviceDate = $('div#datepicker').datepicker().val();

      $('#summary_service_date').text(serviceDate);
      $('#summary_timeslot').text(timeslot);
      $('#summary_service_type').text(serviceType);
      $('#summary_location').text(location);
      $('#summary_property_type').text(propertyType);

      let unitDetails = '';

      $.each($appliances, function(index, elem) {
          unitDetails += `
          <div class="row">
            <div class="col-md-6">
              <p class="mt-3 m-0" style="color: #1988f1;">Appliance Type</p>
              <small>${elem.text.trim()}</small>
            </div>
            <div class="col-md-6">
              <p class="mt-3 m-0" style="color: #1988f1;">Unit Type</p>
              <small>${$units[index].text.trim()}</small>
            </div>
          </div>
          <p class="mt-4 m-0" style="color: #1988f1;">Brand</p>
          <small>${$brands[index].text.trim()}</small>
          <br><br>
          <hr>
          `;
      });

      $('#unit_details_summary_template').html(unitDetails);
    } 
  });
</script>

@endpush