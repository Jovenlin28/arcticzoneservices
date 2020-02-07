@extends('layouts.admin-master')


@section('content')


<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
                    <li class="breadcrumb-item active">Technician Management</li>
                </ol>
            </div>
            <h4 class="page-title">Manage Technician</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <h4 class="header-title">Technician</h4>
                        <p class="text-muted font-13 mb-2">List of all technicians.</p>
                    </div>

                    <div class="col-md-6">
                        <button class="btn btn-md btn-secondary float-right" data-toggle="modal" data-target="#Addtechnician"><i class="fe-plus"></i> Add Technician</button>
                    </div>
                </div>

                        <table id="basic-datatable" class="table dt-responsive">
                            <thead class="thead-light">
                                <tr>
                                    <th>Tech ID</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Contact Number</th>
                                    <th>Availability Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>TC01</td>
                                    <td>Juan Dela Cruz</td>
                                    <td>juandelacruz@gmail.com</td>
                                    <td>09357288473</td>
                                    <td><span class="btn-success" style="padding-left: 1rem; padding-right: 1rem;">Assigned</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#changeStatus"><i class="fe-edit"></i></button>
                                        <button class="btn btn-sm btn-warning" data-target="#infoTechnician" data-toggle="modal" ><i class="fe-eye"></i></button>
                                       
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>


   <!-- Modal Content -->
   <div id="Addtechnician" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Technician</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <p class="text-muted">PERSONAL DETAILS</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" id="" placeholder="Enter first name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="" placeholder="Enter last name">
                                </div>
                            </div>
                        </div>
                            <div class="form-group">
                                <label>Contact Number</label>
                                <input type="text" class="form-control" id="" placeholder="Enter contact number">
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control" id="" placeholder="Enter email address">
                            </div>
                            <div class="form-group">
                                <label>Home Address</label>
                                <textarea class="form-control" rows="2"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Technician Image</label><br>
                                <input type="file" id="">
                            </div>

                    

                    <p class="text-muted mt-4">ACCOUNT DETAILS</p>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" id="" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="" placeholder="Enter your password">
                    </div>
                    <div class="form-group">
                        <label>Re-enter Password</label>
                        <input type="password" class="form-control" id="">
                      </div>
                
                  </form>
                                                                                    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- End of Modal Content -->

 <!-- Modal Content -->
 <div id="changeStatus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Change Availability Status
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <p>Current Status of Technician: <b>Available</b></p>

                <form>
                    <div class="">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Available
                      </label>
                    </div>
                    <div class="">
                      <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        Not Available
                      </label>
                    </div>
                </form>
                 
                                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- End of Modal Content -->

 <!-- Modal Content -->
 <div id="infoTechnician" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Technician Information
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <div class="text-center">
                            <img src="{{ asset('assets/images/users/user-7.jpg')}}">
                            <br>
                            <small class="text-muted">Technician</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="">
                            <p class="m-0"><b>Technician ID:</b> <br> 0091 </p>
                            <p class="m-0"><b>Technician Name:</b> <br> Jose Riza</p>
                            <p class="m-0"><b>Home Address:</b> <br> 1720 Dahlia St. Purok 17 Brgy Commonwealth Quezon City</p>
                            <p class="m-0"><b>Contact Number:</b> <br> 09192640851</p>
                            <p class="m-0"><b>Email Address:</b> joserizal@gmail.com</p>
                        </div>
                    </div>
                </div>

                
                
               
           
                                 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>

<!-- End of Modal Content -->


@endsection