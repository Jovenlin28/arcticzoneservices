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
                        <option>- Select your service type -</option>
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
                        <option>- Select your property type -</option>
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
              {{-- <div class="step2 step">
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
              </div> --}}
              <div class="step2 step">
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
              <div class="step3 step">
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

                    <button type="button" 
                      {{ $timeslot->service_requests_count >= 2 ? 'disabled' : '' }}
                      class="timeslot btn btn-md btn-block btn-primary">
                      <label for="timeslot-{{ $timeslot->id }}">
                        <input type="radio" 
                          {{ $timeslot->service_requests_count >= 2 ? 'disabled' : '' }}
                          id="timeslot-{{ $timeslot->id }}"
                          value="{{ $timeslot->id }}"
                          name="timeslot_id">
                        {{ date('h:i A', strtotime($timeslot->start)) . ' - ' . date('h:i A', strtotime($timeslot->end)) }}
                      </label>
                    </button>
                    @endforeach

                  </div>
                </div>
                <br>
                <small>*We can only serve two (2) requests per timeslot. Our technician arrives within the 1st-hour of a timeslot.*</small>
              </div>
              <div class="step4 step">
                <h6 class="mt-4">Step 4 of 6 : CONTACT DETAILS</h6>
                <h2 class="mt-1 m-0" style="color: #1988f1;">What are your contact details?</h2>
                <p>Is the service for your home address?</p>


                <div class="card-box">
                  <ul class="nav nav-pills navtab-bg">
                    <li class="nav-item">
                      <a href="#yes" data-answer="yes" data-toggle="tab" aria-expanded="true"
                        class="nav-link active client_details">
                        <i class="mdi mdi-timeline mr-1"></i>YES
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#no" data-answer="no" data-toggle="tab" aria-expanded="false"
                        class="nav-link client_details">
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
                      </div> <!-- end row --> --}}

                      <div id="company_details" class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" name="company_name" class="form-control" id="company_name" placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Company Branch</label>
                            <input type="text" name="company_branch" class="form-control" id="company_branch" placeholder="">
                          </div>
                        </div> <!-- end col -->
                      </div> <!-- end row -->

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
                            <input type="text" name="contact_firstname" class="form-control" id="contact_firstname"
                              placeholder="Enter contact firstname">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contact Last Name</label>
                            <input type="text" name="contact_lastname" class="form-control" id="contact_lastname"
                              placeholder="Enter contact last name">
                          </div>
                        </div> <!-- end col -->
                      </div> <!-- end row -->

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="contact_email" class="form-control" id="contact_email"
                              placeholder="">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="text" name="contact_mobile_number" class="form-control"
                              id="contact_mobile_number" placeholder="">
                          </div>
                        </div> <!-- end col -->
                      </div> <!-- end row -->

                      <div class="form-group">
                        <label>Service Address</label>
                        <input type="text" name="contact_address" class="form-control" id="contact_address"
                          placeholder="">
                      </div>

                      <div class="form-group">
                        <label>Near Landmark</label>
                        <input type="text" name="contact_near_landmark" class="form-control" id="contact_near_landmark"
                          placeholder="">
                      </div>


                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="userbio">Additional Instructions</label>
                            <textarea class="form-control" name="contact_additional_instruction"
                              id="contact_additional_instruction" rows="4"
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
              <div class="step5 step">

                <h6 class="mt-4">Step 6 of 6 : PAYMENTS DETAILS</h6>
                <h2 class="mt-1 m-0" style="color: #1988f1;">Choose your mode of payment.</h2>
                <br>
                @foreach ($payment_modes as $payment_mode)
                <div class="radio">
                  <label for="{{ $payment_mode->name === 'Full Payment' ? 'full-payment' : 'half-payment' }}">
                    <input type="radio" name="payment_mode_id"
                      id="{{ $payment_mode->name === 'Full Payment' ? 'full-payment' : 'half-payment' }}"
                      value="{{ $payment_mode->id }}">
                    {{ $payment_mode->name }}
                  </label>
                </div>
                @endforeach
                <br>
                <h6>Estimated Breakdown of Payments</h6>
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
            <br>
            <div id="validation-errors"></div>
          </form>


        </section>

      </div>
      <div id="request_summary" class="col-md-4">
        <br><br>
        <h4 class="mt-5">Request Summary</h4>
        <div class="card mt-3">
          <div class="container">
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

  let isHomeAddress = true;

  let serviceFees;

  initServiceFees();

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

      // if (activeStep === 2) {
      //   filter_appliance_options();
      // }

      if (activeStep === 3) {
        $('#company_details').hide();
        const propertyType = $('select[name="property_type_id"] option:checked').text().trim();
        if (propertyType === 'Company') {
          $('#company_details').show();
        }
      }

      if (activeStep === 4) {
        $('.copy').remove();
        displayUnitDetailsRow();
      }

      //show submit button if active step is 6 or the step you want to have the submit
      if (activeStep == 5) {
          $('.copy').remove();
          $(this).attr('style', 'display: none');
          $('#submit_btn').attr('style', 'display: block');
          $('#request_summary').fadeIn(1000);
          displaySummary();
      }
  });

  //back button click event capture
  $(document).on('click', '#back_btn', function() {
      $('div#validation-errors').html('');
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
          if (activeStep < 5) {
              if (activeStep === 4) {
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
    showButtonPanel: true,
    startDate: "now()",
    daysOfWeekDisabled: '06',
    dateFormat : 'MM dd, yy'
  });

  $(document).on('click', 'a.client_details', function(){
    isHomeAddress = $(this).attr('data-answer') === 'yes';
  });

  $(document).on('click', 'button#submit_btn', function() {
    Swal.fire({
      title: 'Go to voucher page',
      text: "Are you sure?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok'
    }).then((result) => {
      if (result.value) {
        const input = $('form#service-request').serializeArray();
        const transformedInput = transformData(input);
        const serviceDate = $('div#datepicker').datepicker('getDate');
        transformedInput.service_date = $.datepicker.formatDate("MM dd, yy", serviceDate);
        transformedInput.is_home_address = isHomeAddress;
        console.log(transformedInput);
        $.ajax({
          url: ' {{url("service-request/create")}} ',
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: 'POST',
          data: { data: transformedInput },
          success: function(res) {
            let errorsTemplate = '<h4>There are errors creating service request</h4><ul>';
            if (res.errors) {
              for (const key in res.errors) {
                errorsTemplate += `<li class="text-danger">${res.errors[key][0]}</li>`;
              }
              errorsTemplate += '</ul>';
              $('div#validation-errors').html(errorsTemplate);
            } else {
              Swal.fire(
                res.title,
                res.message,
                res.type
              ).then((result) => {
                window.location = ' {{url("voucher")}} ';
              });
            }
          },

          error: function(err) {
              console.log(err);
          }
        })
      }
    });
  });

  $(document).on('change', 'input[name="payment_mode_id"]', function(){
    const paymentType = $(this).attr('id');
    if (paymentType === 'full-payment') {
      totalPayment = totalPayment*2;
    } else {
      totalPayment = totalPayment/2;
    }
    $('span#total-payment').text(totalPayment);
  });

  $(document).on('change', 'select[name="service_type_id"]', function(){
    const $parent_container = $(this).parents('div.col-md-3');
    filter_appliance_options($parent_container);
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

  function filter_appliance_options($parent_container) {
    $parent_container.parent().next().show();
    const $appliance_options = $parent_container.next().find('select[name="appliance_id"] option');
    $appliance_options.show();
    const $checked_service_type = 'select[name="service_type_id"] option:checked';
    const service_type_id = +$parent_container.find($checked_service_type).val();
    const service_type_name = $parent_container.find($checked_service_type).text().trim();

    if (service_type_name !== 'Repair') {
      $parent_container.parent().next().hide();
    }
    const appliance_ids = serviceFees.filter(s => {
      return s.service_id === service_type_id;
    }).map(service_fee => service_fee.appliance_id);

    $appliance_options.filter(function( index, elem ) {
        return !appliance_ids.includes(+elem.value);
      }).hide();
  }

  function initServiceFees() {
    $.get("{{ url('pricing/get-service-fees') }}", function(data) {
      serviceFees = data;
    });
  }

  function transformData(input) {
      const arrayData = ['appliance_id', 'brand_id', 'unit_id', 'trouble_id', 'service_type_id'];
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

    const service_type_id = +$('select[name="service_type_id"] option:checked').val();

    $.each($appliances, function(index, elem) {
      let fee;
      const appliance_id = +elem.value;
      serviceFees.forEach(serviceFee => {
        if (serviceFee.service_id === service_type_id && serviceFee.appliance_id === appliance_id) {
          fee = serviceFee.fee;
        }
      });
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
      const timeslot = $('input[name="timeslot_id"]:checked').parent().text().trim();
      const location = $('select[name="location_id"] option:checked').text().trim();
      const propertyType = $('select[name="property_type_id"] option:checked').text().trim();
      const $appliances = $('select[name="appliance_id"] option:checked');
      const $units = $('select[name="unit_id"] option:checked');
      const $brands = $('select[name="brand_id"] option:checked');
      const $service_types = $('select[name="service_type_id"] option:checked');

      const serviceDate = $('div#datepicker').datepicker('getDate');

      $('#summary_service_date').text($.datepicker.formatDate("MM dd, yy", serviceDate));
      $('#summary_timeslot').text(timeslot);
      $('#summary_location').text(location);
      $('#summary_property_type').text(propertyType);

      let unitDetails = '';

      $.each($appliances, function(index, elem) {
          unitDetails += `
          <div class="row">
            <div class="col-md-6">
              <p class="mt-3 m-0" style="color: #1988f1;">Service Type</p>
              <small>${$service_types[index].text.trim()}</small>
            </div>
            <div class="col-md-6">
              <p class="mt-3 m-0" style="color: #1988f1;">Appliance Type</p>
              <small>${elem.text.trim()}</small>
            </div>
            <div class="col-md-6">
              <p class="mt-3 m-0" style="color: #1988f1;">Unit Type</p>
              <small>${$units[index].text.trim()}</small>
            </div>
            <div class="col-md-6">
              <p class="mt-3 m-0" style="color: #1988f1;">Brand</p>
              <small>${$brands[index].text.trim()}</small>
            </div>
          </div>
          <hr>
          `;
      });

      $('#unit_details_summary_template').html(unitDetails);
    } 
  });
</script>

@endpush