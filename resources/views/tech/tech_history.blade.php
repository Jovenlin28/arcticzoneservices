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
						@foreach ($completed_services as $service)
							<tr>
								<td>SR{{ date('Y') . '-' . '0000' . $service['id'] }}</td>
								<td>CL{{ $service['client']['id'] }}</td>
								<td>{{ $service['service_type']['name'] }}</td>
								<td>{{ date('F d, Y', strtotime($service['service_date'])) }}</td>
								<td>{{ date('F d, Y', strtotime($service['completed_at'])) }}</td>
								<td>
                  <button class="btn btn-sm btn-info" 
                    onclick="showDetails( {{json_encode($service)}}, {{ $tech_id }} )"
                    data-target="#ServiceInfo" 
                    data-toggle="modal">
                    <i class="fe-list"></i></button>
									<button class="btn btn-sm btn-secondary"><i class="fe-trash"></i></button>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<!-- Modal Content -->
<div id="ServiceInfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	
</div>
<!-- End Modal Content -->

<script type="text/javascript">
  function showDetails(service, techId) {
    const remark = service['remarks'].
    filter(remark => {
      return remark.technician_id == techId;
    })[0];
    const template = `
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel">Service Request Information</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">

                  <div class="row">
                    <div class="col-md-9">
                      Date of Service:  ${service['service_date']} <br>
                      Completed Date: ${service['completed_at']} <br>
                      Re-scheduled Date: <br>
                      Timeslot: ${service['timeslot']['start'] + ' - ' + service['timeslot']['end']}
                    </div>
                    <div class="col-md-3">
                 

                    </div>
                  </div>

                  <br>
              
           
                <p class="text-info"> <b>Requestor Information</b></p>
                  <div class="row">
                    <div class="col-md-3">
                      Client Name: <br>
                      Client Contact Number: <br>
                      Service Address: <br>
                      Location Area:
                    </div>
                    <div class="col-md-3">
                      ${service['client']['firstname'] + ' ' + service['client']['lastname']}<br>
                      ${service['client']['contact_number']} <br>
                      ${service['client']['address']} <br>
                      ${service['location']['name']}

                    </div>
                  </div>

                  <br><br>

                <p class="text-info"><b>Appliances Information:</b></p>
                  ${service['appliances'].map(appliance => {
                      return appliance['name'] + '(' + appliance['pivot']['qty'] + ') - ' 
                      + appliance['brand']['name'] + '/' + appliance['unit']['name'] + '<br>'
                    }).join('')
                    }


                    <br>

                <p class=" text-info"><b>Problems Encountered:</b></p>
                  -
                

                <br>

                <p class=" text-info"><b>Remarks:</b></p>
                  ${remark ? remark.name : ''}
              </div>
            </div>
          </div>
        </div>
      </div>`

    $('div#ServiceInfo').html(template);
  }
</script>

@endsection