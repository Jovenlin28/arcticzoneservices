@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
                    <li class="breadcrumb-item active">Appliance Type</li>
                </ol>
            </div>
            <h4 class="page-title">Maintenance</h4>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Appliance Type</h4>
                <p class="text-muted font-13 mb-4"></p>

                <table id="basic-datatable" class="table dt-responsive">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>Window</td>
                            <td><img src="{{ asset('assets/images/acimages/window.png')}}"></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal"><i class="la la-pencil"></i></button>

                                <button type="button" class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Add Appliance Type</h4>
                <p class="text-muted">Appliance type for new service requests</p>

                <form>
                    
                    <div class="form-group">
                        <label>Appliance Name<span class="text-danger">*</span></label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Appliance Image<span class="text-danger">*</span></label><br>
                        <input type="file" id="exampleInputFile">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Modal Content-->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Service Fee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

               
                <form>
                   

                    <div class="modal-body">
                        <div class="form-group">
                            <label>Appliance Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control">
                        </div>
    
                        <div class="form-group">
                            <label>Appliance Image<span class="text-danger">*</span></label><br>
                            <input type="file" id="exampleInputFile">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!--Edit Modal Content-->
</div>
@endsection


