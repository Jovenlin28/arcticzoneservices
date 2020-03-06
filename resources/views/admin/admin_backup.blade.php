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
                        <img class="mt-5" src="{{ asset ('assets/images/maintenance.svg') }}" width="500" height="200"alt="error-image"/>
                        
                    </div>

                    <div class="col-md-5">
                      <br><br>
                      <h2 class="mt-4">BackUp and Restore Files</h2>
                      <h5 class="text-muted">Backing up files can protect against accidental loss of user data, database corruption, hardware failures, and even natural disasters. It's your job as an administrator to make sure that backups are performed. </h5> <br>
                      <button type="button" class="btn btn-primary btn-lg">BackUp and Restore Data Now</button>
                    </div>
                </div>

                <br><br><br><br>
            </div>
        </div>
    </div>
</div>


@endsection