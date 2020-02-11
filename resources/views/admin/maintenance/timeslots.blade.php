@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
					<li class="breadcrumb-item active">Service Timeslots</li>
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
				<h4 class="header-title">Service Timeslots</h4>
				<p class="text-muted font-13 mb-4"></p>

				<table id="basic-datatable" class="table dt-responsive">
					<thead class="thead-light">
						<tr>
							<th>ID</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>

						@foreach ($timeslots as $timeslot)
							<tr id="{{ $timeslot->id }}">
								<td>{{ $timeslot->id }}</td>
								<td>{{ $timeslot->start }}</td>
								<td>{{ $timeslot->end }}</td>
								<td>
									<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal"><i
											class="la la-pencil"></i></button>

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
				<h4 class="header-title">Add Timeslots</h4>
				<p class="text-muted">Service timeslots for new service requests</p>

				<form>

					<div class="form-group">
						<label>Start Time<span class="text-danger">*</span></label>
						<input type="text" class="form-control" placeholder="Enter starting time">
					</div>

					<div class="form-group">
						<label>End Time<span class="text-danger">*</span></label>
						<input type="text" class="form-control" placeholder="Enter end time">
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
					<h4 class="modal-title" id="myModalLabel">Edit Service Timeslots</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>


				<form>


					<div class="modal-body">
						<div class="form-group">
							<label>Start Time<span class="text-danger">*</span></label>
							<input type="text" class="form-control">
						</div>

						<div class="form-group">
							<label>End Time<span class="text-danger">*</span></label>
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