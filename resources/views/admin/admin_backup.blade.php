@extends('layouts.admin-master')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
                    <li class="breadcrumb-item active">Backup and Restore</li>
                </ol>
            </div>
            <h4 class="page-title">Backup and Restore</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6  text-center">
                        <img class="mt-5" src="{{ asset ('assets/images/maintenance.svg') }}" width="200" alt="error-image"/>
                        <h4 class="mt-4">Backup and Restore Files</h4>
                        <p class="text-muted">Back up your files and restore them if the originals are lost, damaged or deleted. <br>Input your credentials to export your database.</p>
                    </div>

                    <div class="col-md-5">
                        <h4 class="mt-5">Administration Credentials</h4>
                        <br>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your username">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your password">
                        </div>
                        
                        <button type="button" class="btn btn-primary btn-md">Submit</button>
                    </div>
                </div>

                <br><br><br><br>
            </div>
        </div>
    </div>
</div>


@endsection