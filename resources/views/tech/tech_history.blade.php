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
								<td>SR{{ $service['id'] }}</td>
								<td>CL{{ $service['client']['id'] }}</td>
								<td>{{ $service['service_type']['name'] }}</td>
								<td>{{ date('M d, Y', strtotime($service['service_date'])) }}</td>
								<td>{{ date('M d, Y', strtotime($service['completed_at'])) }}</td>
								<td>
									<button class="btn btn-sm btn-info" data-target="#ServiceInfo" data-toggle="modal"><i
											class="fe-list"></i></button>
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
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-info" id="myModalLabel">Service Request Information</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-7">
						<p><b>SR{{ $service['id'] }} - {{ $service['service_type']['name'] }}</b><br>
							{{ $service['client']['firstname'] . ' ' . $service['client']['lastname'] }} <br>
							{{ $service['location']['name'] }} ; Company <br>
							{{ $service['client']['address'] }} <br>
							{{ $service['client']['contact_number'] }}
						</p>

						<p class="mt-2"><b>Appliances:</b><br>
							@foreach ($service['appliances'] as $appliance)
									{{ $appliance['name'] }} ({{$appliance['pivot']['qty']}}) -
									{{ $appliance['brand']['name'] . '/' . $appliance['unit']['name'] }}
									<br>
							@endforeach
						</p>

						<p class="mt-2"> <b> Work Done:</b> <br>
							@foreach ($service['workdone'] as $workdone)
									{{ $workdone['name'] }}<br>
							@endforeach
						</p>
					</div>

					<div class="col-md-5">

						<p><b>Status:</b><br>
							<span class="badge badge-success">Completed</span>
						</p>

						<p><b>Service Time and Date:</b><br>
							{{ date('M d, Y', strtotime($service['service_date'])) }} /
							{{ $service['timeslot']['start'] . ' - ' . $service['timeslot']['end'] }}
						</p>

						<p class="mt-4"><b>Problems Encountered:</b><br>
							-
						</p>

						<p class="mt-2"><b>Remarks:</b><br>
							{{ $service['remarks'] }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Modal Content -->

@endsection