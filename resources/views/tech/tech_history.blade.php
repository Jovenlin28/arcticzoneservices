@extends('layouts.tech-master')


@section('content')
                
<div class="row mt-5">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Service Job History</h4>
        </div>
    </div>
</div>   

    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title"><i class="fe-align-justify"></i> Service Request</h4>
                        <p class="text-muted font-13 mb-4">List of all completed service request job.</p>

                            <table id="basic-datatable" class="table dt-responsive nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Service ID</th>
                                        <th>Client ID</th>
                                        <th>Service Type</th>
                                        <th>Started Date</th>
                                        <th>Completed Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>SR01</td>
                                        <td>CL01</td>
                                        <td>Cleaning</td>
                                        <td>Jan 21 2020</td>
                                        <td>Jan 22 2020</td>
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
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-info" id="myModalLabel">Service Request Information</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                     <div class="row">
                                        <div class="col-md-7">
                                           <p><b>SR01 - Cleaning</b><br>
                                                Sofia Valerio <br>
                                                Quezon City ; Company <br>
                                                1720 Dahlia St. Purok 17 Brgy. Commonwealth Quezon City <br>
                                                09357288473
                                            </p>

                                           <p class="mt-2"><b>Appliances:</b><br>
                                                              Window (1) - Samsung/Non-inverter <br>
                                           </p>

                                           <p class="mt-2"> <b> Work Done:</b> <br>
                                                                - 
                                           </p>
                                       </div>

                                       <div class="col-md-5">

                                            <p><b>Status:</b><br>
                                            <span class="badge badge-success">Completed</span>
                                            </p>

                                            <p><b>Service Time and Date:</b><br>
                                            Jan 21 2020 /
                                            12PM - 3PM
                                            </p>

                                            <p class="mt-4"><b>Problems Encountered:</b><br>
                                                               -
                                            </p>

                                           <p class="mt-2"><b>Remarks:</b><br>
                                                              -
                                           </p>
                                       </div>
                                   </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!-- End Modal Content -->

@endsection

                            
                       