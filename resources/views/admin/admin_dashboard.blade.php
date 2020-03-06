@extends('layouts.admin-master')


@section('content')


{{-- <div id="preloader">
  <div id="status">
    <div class="spinner">Loading...</div>
  </div>
</div> --}}


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


<h4><b>Institution</b></h4>

<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card-box">


      <h4 class="header-title mt-0 mb-2">Technician</h4>

      <div class="mt-1">
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> {{ $count_group['technicians'] }} </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">

      <h4 class="header-title mt-0 mb-3">Requestors</h4>


      <div class="mt-1">
        <div class="float-left" dir="ltr">
          <i class="glyphicon glyphicon-wrench"></i>
        </div>
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> {{ $status_group['assigned'] }} </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">


      <h4 class="header-title mt-0 mb-3">Properties</h4>

      <div class="mt-1">

        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> {{ $count_group['properties'] }} </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">

      <h4 class="header-title mt-0 mb-3">Locations</h4>

      <div class="mt-1">
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> {{ $count_group['locations'] }} </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->
</div>
<!-- end row -->

<br>
<h4><b>Service Request</b></h4>

<div class="row">
  <div class="col-xl-3 col-md-6">
    <div class="card-box">


      <h4 class="header-title mt-0 mb-2">Services</h4>

      <div class="mt-1">
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> {{ $count_group['service_requests'] }} </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">

      <h4 class="header-title mt-0 mb-3">Service Types</h4>


      <div class="mt-1">
        <div class="float-left" dir="ltr">
          <i class="glyphicon glyphicon-wrench"></i>
        </div>
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> {{ $count_group['service_types'] }} </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">


      <h4 class="header-title mt-0 mb-3">Appliance Types</h4>

      <div class="mt-1">

        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> {{ $count_group['appliances'] }} </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->

  <div class="col-xl-3 col-md-6">
    <div class="card-box">

      <h4 class="header-title mt-0 mb-3">Unit Types</h4>

      <div class="mt-1">
        <div class="text-right">
          <h2 class="mt-3 pt-1 mb-1"> {{ $count_group['units'] }} </h2>
          <p class="text-muted mb-0">Total Number</p>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div><!-- end col -->
</div>
<!-- end row -->

<br><br>
<h4><b>Today</b></h4>
<br>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h3>Service Request</h3><br>
        <div class="text-center">
          <button type="button" class="btn btn-outline-secondary waves-effect waves-light">
            Waiting for payment <br> {{ $status_group['new'] }}
          </button>
          <button type="button" class="btn btn-outline-primary waves-effect waves-light">
            Assigned Request <br> {{ $status_group['assigned'] }}
          </button>
          <button type="button" class="btn btn-outline-warning waves-effect waves-light">
            On-going Request <br> {{ $status_group['on_going'] }}
          </button> <br> <br>
          <button type="button" class="btn btn-outline-success waves-effect waves-light">
            Completed Request <br> {{ $status_group['closed'] }}
          </button>
          <button type="button" class="btn btn-outline-danger waves-effect waves-light">
            Cancelled Request <br> {{ $status_group['cancelled'] }}
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h3>Technician Availability</h3><br>
        <br>
        <div class="text-center">
          <button type="button" class="btn btn-outline-danger waves-effect waves-light">
            Not Available Tech/s <br> {{ $tech_group_by['unavailable'] }}
          </button>
          <button type="button" class="btn btn-outline-primary waves-effect waves-light">
            Assigned Tech/s<br> {{ $tech_group_by['unavailable'] }}
          </button>
          <button type="button" class="btn btn-outline-warning waves-effect waves-light">
            Not Assigned Tech/s <br> {{ $tech_group_by['available'] }}
          </button> <br> <br>
          <br><br>
        </div>
      </div>
    </div>
  </div>
</div>


</div>
</div>
</div>


@endsection

@push('scripts')

<script type="text/javascript">
  $(document).ready(function(){
    
  });

  function show_billing(client_id, sr_id) {
    window.location = `/admin/generate_reports/client_billing_report?client_id=${client_id}&sr_id=${sr_id}`;
  }

</script>
@endpush