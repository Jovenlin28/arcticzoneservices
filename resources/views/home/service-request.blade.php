@extends('layouts.home-master')



@section('content')

  <!--  ======================= Start Header Area ============================== -->

  <header class="header_area">
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="/"><img src="{{ asset('home/img/arctic-zone-logo.png')}}" alt="logo" height="48" width="130"></a>
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
  <div class="steps">
      <div class="step1 step">
        <h6 class="mt-4">Step 1 of 6 : LOCATION</h6>
        <h2 class="mt-1 m-0" style="color: #1988f1;">Where is the aircon located?</h2>
        <br>
          <div class="row">
            <div class="col-md-6">
                  <div class="form-group">
                    <label><b>Service City</b></label>
                    <select class="form-control" width="200%">
                      <option>- Select your service city - </option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>

            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label><b>Property Type</b></label>
                    <select class="form-control">
                      <option>- Select your property type -</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
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
           <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Cleaning
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                Installation
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                Repair
              </label>
            </div>

      </div>
      <div class="step3 step">
          <h6 class="mt-4">Step 2 of 6 : UNIT DETAILS</h6>
          <h2 class="mt-1 m-0" style="color: #1988f1;">Provide your aircon details.</h2>
         <p>To find out your aircon type and fees, <a href="" data-toggle="modal" data-target="AirconInfo">see here</a>.</p>


          <br>
        
      <div class="after-add-more m-0">
        <div class="card">
          <div class="container">
            <br><br>
            <div class="row">
              <div class="col-md-4">
                  <div class="form-group">
                    <label><b>Aircon Type</b></label>
                    <select class="form-control">
                      <option>Select..</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><b>Brand</b></label>
                    <select class="form-control">
                      <option>Select..</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label><b>Unit Type</b></label>
                    <select class="form-control">
                      <option>Select..</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                </div>
            </div>
          </div>
          <br>
         </div>
         <br>
       </div>

        <button type="button" class="btn btn-block btn-default add-more"><img  style="width: 100%;"src="{{ asset('home/img/add-more.png')}}"></button>



        

         

       
         
              <div class="copy invisible">
            <div class="card control-group">
              <button type="button" class="btn btn-sm remove" style="opacity: 30%;">
                <span class="badge badge-secondary rounded-circle float-right" style="padding: 0.6rem 0.6rem 0.6rem 0.6rem;color: white; font-size: 8px;">X</span>
              </button>
              <div class="container">
                <br>
                <div class="row mt-1">
                  <div class="col-md-4">
                      <div class="form-group">
                        <label><b>Aircon Type</b></label>
                        <select class="form-control">
                          <option>Select..</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label><b>Brand</b></label>
                        <select class="form-control">
                          <option>Select..</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label><b>Unit Type</b></label>
                        <select class="form-control">
                          <option>Select..</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                        </select>
                      </div>
                    </div>
                </div>
                <br>
              </div>
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

               <div class="form-group" >
                  <label><b>Select your date</b></label>
                  <div id="datepicker"></div>
                </div>
            </div>
            <div class="col-md-6 btn-request">

                <label><b>Select your timeslots</b></label>
                   <button type="button" class="btn btn-md btn-block btn-primary">9 AM - 12 PM <br>
                    <small class="small">2 Technicians Left</small>
                   </button>

                   <br>
               
                  <button type="button" class="btn btn-md  btn-block btn-primary">12 PM - 3 PM <br>
                    <small class="small">2 Technicians Left</small>
                  </button>
                  <br>
              
                  <button type="button" class="btn btn-md  btn-block btn-primary">3 PM - 6 PM <br> 
                    <small class="small">2 Technicians Left</small>
                  </button>
                  <br>
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

                                                
                                                <div class="row">
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
                                                            <textarea class="form-control" id="addtl_instruc" rows="4" placeholder="Any special instructions to technician?"></textarea>
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
                                                            <input type="text" class="form-control" id="contact_firstname" placeholder="Enter contact firstname">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Contact Last Name</label>
                                                            <input type="text" class="form-control" id="contact_lastname" placeholder="Enter contact last name">
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
                                                            <textarea class="form-control" id="addtl_instruc" rows="4" placeholder="Any special instructions to technician?"></textarea>
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
        <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Half Payment
              </label>
        </div>
         <div class="radio">
              <label>
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Full Payment
              </label>
        </div>

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
                                            <tbody>
                                            <tr>
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
                                            </tr>
                                            </tbody>
                                        </table>
                                        <br>
        <h6 class="text-right" style="margin-right: 3rem;"><b>Grand Total Amount:</b> Php 4,000.00</h6>

        


        
      </div>
    </div>
    <br><br><br>
    <div class="buttons">
      <div class="row">
        <div class="col-md-6">
          <button id="back_btn" class="btn btn-secondary w-25">Back</button>
        </div>
        <div class="col-md-6">
           <button href="#" id="next_btn" class="btn btn-secondary w-25 float-right mt-2">Next</button>
           <a href="/voucher"><button href="#" id="submit_btn" class="btn btn-secondary w-25 float-right mt-2">Submit</button></a>
        </div>
      </div>
      
     
    </div>

</section>

      </div>




      <div class="col-md-4">
        <br><br>
        <h4 class="mt-5">Request Summary</h4>
        <div class="card mt-3">
          <div class="container">
            <p class="mt-4 m-0" style="color: #1988f1;">Appliance</p>
            <small>AIRCON</small>

            <div class="row">
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Service City</p>
                <small>QUEZON CITY</small>
              </div>
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Property Type</p>
                <small>HOUSE | TOWNHOUSE</small>
              </div>
            </div>

            <p class="mt-4 m-0" style="color: #1988f1;">Service Type</p>
            <small>CLEANING</small>

            <br><br>

        </div>

        </div>


        <div class="card mt-3">
          <div class="container">

            <br>

            <div class="row">
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Appliance Type</p>
                <small>TOWER</small>
              </div>
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Unit Type</p>
                <small>NON-INVERTER</small>
              </div>
            </div>

            <p class="mt-4 m-0" style="color: #1988f1;">Brand</p>
            <small>COLDFRONT</small>

            <br><br>

            <hr>

             <div class="row">
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Appliance Type</p>
                <small>TOWER</small>
              </div>
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Unit Type</p>
                <small>NON-INVERTER</small>
              </div>
            </div>

            <p class="mt-4 m-0" style="color: #1988f1;">Brand</p>
            <small>COLDFRONT</small>

            <br><br>

        </div>



        </div>


        <div class="card mt-3">
          <div class="container">

            <br>

            <div class="row">
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Service Date</p>
                <small>January 29, 2020</small>
              </div>
              <div class="col-md-6">
                <p class="mt-3 m-0" style="color: #1988f1;">Service Time</p>
                <small>9 AM - 12 PM</small>
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


      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".add-more").before(html);
      });

      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });



    });


</script>


<script type="text/javascript">
        $(function () {
            $('#datepicker').datepicker({
                inline: true,
                sideBySide: true,
                useCurrent: false,
                daysOfWeekDisabled: [0, 6]
            });
        });
</script>

@endpush