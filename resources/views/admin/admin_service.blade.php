@extends('layouts.admin-master')


@section('content')

<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
					<li class="breadcrumb-item active">Services</li>
				</ol>
			</div>
			<h4 class="page-title">Services</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">

				<h4 class="header-title">Service Requested</h4>
				<p class="text-muted font-13 mb-4">
					List of all service request.
				</p>

				<table id="basic-datatable" class="table dt-responsive nowrap ">
					<thead>
						<tr>
							<th>SRID</th>
							<th>Requested By</th>
							<th>Property</th>
							<th>Date and Time</th>
							<th>Assigned Tech/s</th>
							<th>Status</th>

						</tr>
					</thead>


					<tbody>
						<tr>
							<td><a href="/admin/services/service_request_details">334</a></td>
							<td>Sofia Valerio</td>
							<td>Household</td>
							<td>12/21/20 9:00 - 11:00</td>
							<td>-</td>

							<td><span class="btn-primary" style="padding-left: 1rem; padding-right: 1rem;">Assigned</span></td>
						</tr>
						<tr>
							<td>334</td>
							<td>Sofia Valerio</td>
							<td>Household</td>
							<td>12/21/20 9:00 - 11:00</td>
							<td>-</td>

							<td><span class="btn-warning" style="padding-left: 1rem; padding-right: 1rem; color:white;">Open</span>
							</td>
						</tr>
						<tr>
							<td>334</td>
							<td>Sofia Valerio</td>
							<td>Household</td>
							<td>12/21/20 9:00 - 11:00</td>
							<td>-</td>

							<td><span class="btn-danger" style="padding-left: 1rem; padding-right: 1rem;">Canceled</span></td>
						</tr>
						<tr>
							<td>334</td>
							<td>Sofia Valerio</td>
							<td>Household</td>
							<td>12/21/20 9:00 - 11:00</td>
							<td>-</td>

							<td><span class="btn-secondary" style="padding-left: 1.5rem; padding-right: 1.6rem;">New</span></td>
						</tr>
						<tr>
							<td>334</td>
							<td>Sofia Valerio</td>
							<td>Household</td>
							<td>12/21/20 9:00 - 11:00</td>
							<td>-</td>

							<td><span class="btn-success" style="padding-left: 1.5rem; padding-right: 1.8rem;">Closed</span></td>
						</tr>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>






@endsection