@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
					<li class="breadcrumb-item active">Service Fees</li>
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
				<h4 class="header-title">Service Fees</h4>
				<p class="text-muted font-13 mb-4"></p>

				<table id="basic-datatable" class="table dt-responsive">
					<thead class="thead-light">
						<tr>
							<th>ID</th>
							<th>Service</th>
							<th>Appliance</th>
							<th>Fee</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>

						@foreach ($service_fees as $service_fee)
						<tr>
							<td> {{ $service_fee->id }}</td>
							<td> {{ $service_fee->service_type->name }}</td>
							<td> {{ $service_fee->appliance->name }}</td>
							<td> {{ $service_fee->fee }}</td>
							<td>
								<button type="button" class="btn btn-success btn-sm"><i class="la la-pencil"></i></button>

								<button type="button" class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<h4 class="header-title">Add Service Fees</h4>
				<p class="text-muted">Service fee per service and appliance type for new service requests</p>

				<form>

					<div class="form-group">
						<label>Select Service Type<span class="text-danger">*</span></label>
						<select name="service_type_id" class="form-control">
							@foreach ($service_types as $service_type)
								<option value="{{ $service_type->id}}"> 
									{{ $service_type->name}} 
								</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Select Appliance Type<span class="text-danger">*</span></label>
						<select name="appliance_id" class="form-control">
							@foreach ($appliances as $appliance)
								<option value="{{ $appliance->id}}"> 
									{{ $appliance->name}} 
								</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Service Fee<span class="text-danger">*</span></label>
						<input name="fee" type="text" class="form-control">
					</div>

					<button type="submit" class="btn btn-primary">Save</button>
				</form>
			</div>
		</div>
	</div>

	<!--Edit Modal Content-->
	<div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Edit Service Fee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>


				<form>


					<div class="modal-body">
						<div class="form-group">
							<label>Select Service Type<span class="text-danger">*</span></label>
							<select class="form-control">
								<option>-- Please select service type --</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>

						<div class="form-group">
							<label>Select Appliance Type<span class="text-danger">*</span></label>
							<select class="form-control">
								<option>-- Please select appliance type --</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>

						<div class="form-group">
							<label>Service Fee<span class="text-danger">*</span></label>
							<input type="text" class="form-control">
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