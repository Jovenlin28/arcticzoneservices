@extends('layouts.admin-master')


@section('content')


<div id="preloader">
  <div id="status">
    <div class="spinner">Loading...</div>
  </div>
</div>


<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
      <h4 class="page-title">Dashboard</h4>
    </div>
  </div>
</div>


<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card-box">

      <h4 class="header-title mt-0 mb-2">Waiting for Assign</h4>

      <div class="mt-1">
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> 268 </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">

      <h4 class="header-title mt-0 mb-3">Assigned Service Job</h4>


      <div class="mt-1">
        <div class="float-left" dir="ltr">
          <i class="glyphicon glyphicon-wrench"></i>
        </div>
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> 8715 </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">


      <h4 class="header-title mt-0 mb-3">On-going Service Job</h4>

      <div class="mt-1">

        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> 925 </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">

      <h4 class="header-title mt-0 mb-3">Closed Service Job</h4>

      <div class="mt-1">
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> 78 </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->
</div>
<!-- end row -->


<div class="row">
  <div class="col-md-6">
    <div class="card-box">

      <h4 class="header-title mb-3">No. of Service Job per Technician</h4>

      <div class="table-responsive">
        <table class="table table-centered table-borderless table-hover mb-0">
          <thead class="thead-light">
            <tr>
              <th class="border-top-0">TECHID</th>
              <th class="border-top-0">Name</th>
              <th class="border-top-0">No. of Jobs</th>
              <th class="border-top-0">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Jose Rizal</td>
              <td>4</td>
              <td>Assigned</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card-box">

      <h4 class="header-title mb-3">No. of Service Request per Location</h4>

      <div class="table-responsive">
        <table class="table table-centered table-borderless table-hover mb-0">
          <thead class="thead-light">
            <tr>
              <th class="border-top-0">Location ID</th>
              <th class="border-top-0">Location Name</th>
              <th class="border-top-0">No. of SR</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Quezon City</td>
              <td>2</td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="card-box">
  <h4 class="header-title mb-3">Service Request Transaction</h4>

  <div class="table-responsive">
    <table class="table table-centered table-borderless table-hover mb-0" id="basic-datatable">
      <thead class="thead-light">
        <tr>
          <th class="border-top-0">SRID</th>
          <th class="border-top-0">Service Type</th>
          <th class="border-top-0">Client Name</th>
          <th class="border-top-0">Requested Date and Time</th>
          <th class="border-top-0">Billing</th>
          <th class="border-top-0">Total Amount</th>
          <th class="border-top-0">Payment Status</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Cleaning</td>
          <td>Sofia Valerio</td>
          <td>Jan 12 2020 9:00 - 12:00</td>
          <td><a href="">See full details</a></td>
          <td>2,750.00</td>
          <td>Paid</td>


        </tr>

      </tbody>
    </table>
  </div>
</div>



</div>
</div>
</div>


@endsection