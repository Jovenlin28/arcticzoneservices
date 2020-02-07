@extends('layouts.admin-master')


@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
                    <li class="breadcrumb-item active">Generate Reports</li>
                </ol>
            </div>
            <h4 class="page-title">Generate Reports</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-4 col-md-6">
        <div class="card-box">
        

            <h4 class="header-title mt-0 mb-2">Service Report</h4>
            <p>All Summary Service Requested Report</p>


            <div class="form-group mb-3">
                <label>Select Date Ranges</label>
                <input type="text" style="font-size: 15px; color: black;" class="form-control date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning">
            </div>

            <a href="/admin/generate_reports/service_status_report"><button type="button" class="btn btn-md btn-primary btn-block">Generate</button></a>
        </div>
    </div>

    <div class="col-xl-4 col-md-6">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-2">Service Status Report</h4>
            <p>All Summary Status of Services Report</p>

            <div class="form-group mb-3">
                <label>Select Date Ranges</label>
                <input type="text" style="font-size: 15px; color: black;" class="form-control date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning">
            </div>

            <a href="report2.php"><button type="button" class="btn btn-md btn-primary btn-block">Generate</button></a>
        </div>
    </div>


    <div class="col-xl-4 col-md-6">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-2">Technician Service Job Report</h4>
            <p>Total Finished Job of Technician Report </p>

            <div class="form-group">
                <label>Select Technician</label>
                <select class="form-control">
                    <option>-- Please select technician --</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label>Select Date Ranges</label>
                <input type="text" style="font-size: 15px; color: black;" class="form-control date" id="singledaterange" data-toggle="date-picker" data-cancel-class="btn-warning">
            </div>

            <button type="button" class="btn btn-md btn-primary btn-block">Generate</button>

        </div>
    </div>
</div>
      

@endsection