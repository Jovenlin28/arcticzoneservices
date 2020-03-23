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
  <div class="col-xl-6 col-md-6">
    <div class="card-box">


      <h4 class="header-title mt-0 mb-2">Service Report</h4>
      <p>All Summary Service Requested Report</p>


      <div class="form-group mb-2">
        <input type="text" class="form-control" id="service_requests_report" data-toggle="date-picker"
          placeholder="Select Date Ranges" data-cancel-class="btn-warning">
      </div>


      <a data-url="/admin/generate_reports/service_requests_report" id="service_requests_report" class="generate"
        href="#">
        <button type="button" class="btn btn-md btn-primary btn-block">Generate</button></a>
    </div>
  </div>

  <div class="col-xl-6 col-md-6">
    <div class="card-box">
      <h4 class="header-title mt-0 mb-2">Service Status Report</h4>
      <p>All Summary Status of Services Report</p>

      <div class="form-group mb-2">
        <input type="text" class="form-control" id="service_requests_status_report" data-toggle="date-picker"
          placeholder="Select Date Ranges" data-cancel-class="btn-warning">
      </div>

      <a data-url="/admin/generate_reports/service_requests_status_report" id="service_requests_status_report"
        class="generate" href="#">
        <button type="button" class="btn btn-md btn-primary btn-block">Generate</button>
      </a>
    </div>
  </div>

  


  <div class="col-xl-6 col-md-6">
    <div class="card-box">
      <h4 class="header-title mt-0 mb-2">Payment Status Report</h4>
      <p>Summary Service Requested Payments</p>

      <div class="form-group">
        <label>Select Payment Status</label>
        <select name="payment_status" class="form-control">
          <option>-- Please select status --</option>
          <option value="1">Paid</option>
          <option value="0">Not Paid</option>
        </select>
      </div>


      <div class="form-group mb-2">
        <input type="text" class="form-control" id="payment_status_reports" data-toggle="date-picker"
          placeholder="Select Date Ranges" data-cancel-class="btn-warning">
      </div>



      <a data-url="/admin/generate_reports/service_requests_payment_status_report" id="payment_status_reports" class="generate"
        href="#">
        <button type="button" class="btn btn-md btn-primary btn-block">Generate</button>
      </a>

    </div>
  </div>

  <div class="col-xl-6 col-md-6">
    <div class="card-box">


      <h4 class="header-title mt-0 mb-2">Service Type Report</h4>
      <p>Summary of Service Requested by Service Type</p>

      <div class="form-group">
        <label>Select Service Type</label>
        <select name="service_type_id" class="form-control">
          @foreach ($service_types as $service_type)
          <option value="{{ $service_type->id}} ">
            {{ $service_type->name }}
          </option>
          @endforeach
        </select>
      </div>


      <div class="form-group mb-2">
        <input type="text" class="form-control" id="service_requests_by_type_report"
          placeholder="Select Date Ranges" data-cancel-class="btn-warning">
      </div>


      <a data-url="/admin/generate_reports/service_requests_by_type_report" id="service_requests_by_type_report" 
      class="generate" href="#">
        <button type="button" class="btn btn-md btn-primary btn-block">Generate</button></a>
    </div>
  </div>

  <div class="col-xl-6 col-md-6">
    <div class="card-box">
      <h4 class="header-title mt-0 mb-2">Technician Service Job Report</h4>
      <p>Total Finished Job of Technician Report </p>

      <div class="form-group">
        <label>Select Technician</label>
        <select name="select_technician" class="form-control">
          @foreach ($technicians as $technician)
          <option value="{{ $technician->id}} ">
            {{ $technician->username }}
          </option>
          @endforeach
        </select>
      </div>


      <div class="form-group mb-3">
        <input type="text" class="form-control" id="technician_service_jobs" data-toggle="date-picker"
          placeholder="Select Date Ranges" data-cancel-class="btn-warning">
      </div>



      <a data-url="/admin/generate_reports/technician_service_jobs_report" id="technician_service_jobs" class="generate"
        href="#">
        <button type="button" class="btn btn-md btn-primary btn-block">Generate</button>
      </a>

    </div>
  </div>
</div>




@endsection

@push('scripts');
<script type="text/javascript">
  $(document).ready(function(){
    $('input#service_requests_status_report, input#service_requests_report, input#technician_service_jobs, input#service_requests_by_type_report, input#payment_status_reports').daterangepicker({
      locale: {
        format: 'YYYY-MM-DD'
      }
    });

    $('a.generate').on('click', function(){
      let url = $(this).attr('data-url');
      const id = $(this).attr('id');
      const daterange = $(`input#${id}`).val();
      const parts = daterange.split(' - ');
      const dateFrom = parts[0];
      const dateTo = parts[1];
      url += `?date_from=${dateFrom}&date_to=${dateTo}`;
      if (id.includes('technician')) {
        const tech_id = +$('select[name="select_technician"]').val();
        url += '&technician_id=' +  tech_id;
      }

      if (id.includes('type')) {
        const service_type_id = +$('select[name="service_type_id"]').val();
        const service_type = $('select[name="service_type_id"] > option:checked').text().trim();
        url += '&service_type_id=' +  service_type_id + '&service_type=' + service_type;
      }

      if (id.includes('payment')) {
        const is_paid = +$('select[name="payment_status"]').val();
        const status = $('select[name="payment_status"] > option:checked').text().trim();
        url += '&payment_status=' +  status + '&is_paid=' + is_paid;
      }
      window.location = url;
    });
  });
</script>
@endpush