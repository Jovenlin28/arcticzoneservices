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
                                           <p><span class="btn-danger" style="padding-left: 3rem; padding-right: 3rem; padding-top: 0.3rem; padding-bottom: 0.3rem;">Canceled</span><br></p>
                                        </div>
                                        <h4 class="card-title mb-3">SRID0293 - Cleaning <br> <small>Submitted date: 2019-11-29 17:19:40</small></h4>
                                       

                                        <br>

                                        <p class="text-muted">REQESTOR DETAILS</p>

                                        <div class="row mt-2">
                                            <div class="col-md-2">
                                                <h6 class="text-muted">Client ID</h6>
                                                <p>CL09192</p>
                                            </div>
                                            <div class="col-md-2">
                                                <h6 class="text-muted">Requested By</h6>
                                                <p>Sofia Valerio</p>
                                            </div>
                                            <div class="col-md-2">
                                                <h6 class="text-muted">Contact Number</h6>
                                                <p>09192640851</p>
                                            </div>
                                            <div class="col-md-2">
                                                <h6 class="text-muted">Email Address</h6>
                                                <p>sofiabalastavalerio@gmail.com</p>
                                            </div>
                                             <div class="col-md-2">
                                                <h6 class="text-muted">Address</h6>
                                                <p>1720 Dahlia St. Purok 17 Brgy. Commonwealth Q.C</p>
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
                                                <p>SR09192</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Status</h6>
                                                <p>Canceled</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Submitted Date</h6>
                                                <p>2019-11-29 17:19:40</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Service Date and Time</h6>
                                                <p>9AM - 10AM Dec 20, 2020</p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Service Type</h6>
                                                <p>Cleaning</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Property Type</h6>
                                                <p>Household</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Appliance Type</h6>
                                                <p>Split (1)</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Unit Type and Brand</h6>
                                                <p>Inverter / Samsung</p>
                                            </div>
                                        </div>

                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Service Location</h6>
                                                <p>Quezon City</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Service Address</h6>
                                                <p>1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Near Landmark</h6>
                                                <p>McDonalds</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Addt'l Instructions</h6>
                                                <p>-</p>
                                            </div>
                                        </div>


                                        <br><br>

                                        <p class="text-muted">TECHNICIAN DETAILS</p>

                                        <div class="row mt-2">
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Assigned Technician ID</h6>
                                                <p>TECH0919 <br> TECH0192</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Assigned Technician</h6>
                                                <p>Jose Rizal <br> Juan Cruz</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Work Done</h6>
                                                <p>-</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Remarks</h6>
                                                <p>-</p>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Date Created</h6>
                                                <p>2019-11-29 17:19:40</p>
                                            </div>
                                           <div class="col-md-3">
                                                <h6 class="text-muted">Date Modified</h6>
                                                <p>2019-11-29 17:19:40</p>
                                            </div>
                                            <div class="col-md-3">
                                                <h6 class="text-muted">Date Closed</h6>
                                                <p>2019-11-29 17:19:40</p>
                                            </div>
                                      
                                        </div>
                                    </div>
                                </div> <!-- end card-->


                                <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

               <h4 class="header-title">Billing Details 

                  <td>
                        <button type="button" class="btn btn-secondary btn-sm float-right"><i class="fe-pencil"></i> Modify Payment</button>
                    </td>
               </h4>
                  
                                        <table  class="table dt-responsive nowrap mt-3">
                                            <thead>
                                                <tr>
                                                    <th>BID</th>
                                                    <th>Reference No.</th>
                                                    <th>Due Date</th>
                                                    <th>Total Amount</th>
                                                    <th>Mode of Payment</th>
                                                    <th>Status</th>
                                                    <th>Receipt</th>
                                                 
                                               
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <tr>
                                                    <td>B234</td>
                                                    <td>2020-155-223</td>
                                                    <td>12/20/20</td>
                                                    <td>2,000.00</td>
                                                    <td>Half Payment</td>
                                                    
                                                    <td>Not Fully Paid</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewReceipt">View Receipt</button>
                                                    </td>

                                                   
                                                </tr>

                                                 <tr>
                                                    <td>B234</td>
                                                    <td>2020-155-223</td>
                                                    <td>12/20/20</td>
                                                    <td>2,000.00</td>
                                                    <td>Half Payment</td>
                                                    
                                                    <td>Not Yet Paid</td>

                                                    <td>
                                                        -                                                    

                                                    </td>

                                                   

                                                   
                                                </tr>
                                              
                                            </tbody>
                                        </table>

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
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Payment Receipt
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

            <p>Reference No:</p>
            <p>Submitted Date and Time:</p>

            <br>

            <div >
                <img style="height: 100%; width: 100%;"src="{{ asset('assets/images/receipt_sample.png')}}">
            </div>
                                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- End of Modal Content -->





@endsection