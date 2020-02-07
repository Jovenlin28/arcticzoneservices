@extends('layouts.admin-master')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
                    <li class="breadcrumb-item active">Service History</li>
                </ol>
            </div>
            <h4 class="page-title">Service History</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

               <h4 class="header-title">Service Requested History</h4>
                    <p class="text-muted font-13 mb-4">
                     List of all service requested closed.
                    </p>

                                        <table id="basic-datatable" class="table dt-responsive nowrap ">
                                            <thead>
                                                <tr>
                                                    <th>SRID</th>
                                                    <th>Requested By</th>
                                                    <th>Started Date</th>
                                                    <th>Closed Date</th>
                                                    <th>Assigned Tech/s</th>
                                                    <th>Action</th>
                                               
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
                                                <tr>
                                                    <td>334</td>
                                                    <td>Sofia Valerio</td>
                                                    <td>Household</td>
                                                    <td>12/21/20 9:00 - 11:00</td>
                                                    <td>-</td>
                                                    <td>
                                                         <button class="btn btn-sm btn-info" data-target="#ServiceInfo" data-toggle="modal" ><i class="fe-list"></i></button>
                                                         <button class="btn btn-sm btn-secondary"><i class="fe-trash"></i></button>
                                                    </td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>

            </div>
        </div>
    </div>
</div>

 <!-- Modal Content -->
                    <div id="ServiceInfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-success" id="myModalLabel">Request Information</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="container">
                                    

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End Modal Content -->







@endsection