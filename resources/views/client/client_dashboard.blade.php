@extends('layouts.client-master')


@section('content')

<div class="content-page">
	<div class="content">

		<!-- Start Content-->
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<h4 class="page-title">Home</h4>
					</div>
				</div>
			</div>
			<!-- end page title -->

			<div class="row">
				<div class="col-lg-12">
					<div class="card card-body"
						style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.0), 0 2px 2px 0 rgba(0, 0, 0, 0.1);">
						<h5>Personal Information
							<a href="/client/account_settings"><small class="float-right"><i class="fa fa-edit"></i>
									Update Profile</small></a>
						</h5>
						<hr>
						<div class="row">

							<div class="col-md-3">
								<p class="text-muted">Full Name</p>
								<p>
									{{ Auth::user()->client->firstname . ' ' . Auth::user()->client->lastname}}
								</p>
							</div>
							<div class="col-md-3">
								<p class="text-muted">Contact Number</p>
								<p>{{ Auth::user()->client->contact_number }}</p>
							</div>
							<div class="col-md-3">
								<p class="text-muted">Email Address</p>
								<p>{{ Auth::user()->email }}</p>
							</div>
							<div class="col-md-3">
								<p class="text-muted">Address</p>
								<p>{{ Auth::user()->client->address }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="row">

				<div class="col-lg-12">
					<div class="card"
						style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.0), 0 2px 2px 0 rgba(0, 0, 0, 0.1); background-color: #F2F4F5;">

						<ul class="nav nav-tabs nav-bordered nav-justified">
							<li class="nav-item">
								<a href="#new-b2" data-toggle="tab" aria-expanded="true" class="nav-link active">
									New Requests ({{ count($client['service_requests_category']['new']) }})
								</a>
							</li>
							<li class="nav-item">
								<a href="#pending-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
									Pending Requests ({{ count($client['service_requests_category']['pending']) }})
								</a>
							</li>
							<li class="nav-item">
								<a href="#completed-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
									Completed Requests ({{ count($client['service_requests_category']['completed']) }})
								</a>
							</li>
							<li class="nav-item">
								<a href="#canceled-b2" data-toggle="tab" aria-expanded="false" class="nav-link">
									Canceled Requests ({{ count($client['service_requests_category']['canceled']) }})
								</a>
							</li>
						</ul>
					</div>

					<div class="tab-content mb-0">
						@foreach ($client['service_requests_category'] as $category => $service_requests)
							<div class="tab-pane {{ $category === 'new' ? 'active' : ''}}" id="{{$category}}-b2">
								@foreach ($service_requests as $request)
									<div class="row">
										<div class="col-md-3">
											<div class="card-box">
												<h5 class="text-primary">{{ ucfirst($category) }} Requests</h5>
												<hr>
												<div class="row">
													<div class="col-md-6">
														SR00{{ $request['id'] }}
													</div>
													<div class="col-md-6">
														{{ $request['service_date'] }}
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-9">
											<div class="card-box">
												<h5>Service Request Information</h5>
												<hr>
												@if ($category === 'new')
													<p>Before we assign your service requested to our technician. Kindly pay first
														using our given voucher and send us your receipt of payment <a href="" data-toggle="modal"
															data-target="#myModal">here</a>. 
													</p>
												@endif
												<p class="text-muted mt-4"><b>SERVICE DETAILS</b></p>
												<div class="row">
													<div class="col-md-3">
														<p class="text-muted">Service ID</p>
														<p>SR00{{ $request['id'] }}</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Status</p>
														<p>{{ ucfirst($category)}} </p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Submitted Date</p>
														<p>	{{ $request['service_date'] }}</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Service Date</p>
														<p> 
															{{ $request['timeslot']['start'] }} - {{ $request['timeslot']['end'] }} 
															<br> {{ $request['service_date'] }} 
														</p>
													</div>
		
												</div>
		
		
												<div class="row mt-3">
													<div class="col-md-3">
														<p class="text-muted">Service Type</p>
														<p>{{ $request['service_type']['name'] }}</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Property Type</p>
														<p>{{ $request['property']['name'] }}</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Appliance Type</p>
														<p>Split (1)</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Type and Brand</p>
														Non-inverter / Samsung
													</div>
		
												</div>
		
		
												<div class="row mt-3">
		
													<div class="col-md-3">
														<p class="text-muted">Service Location</p>
														<p>{{ $request['location']['name'] }}</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Service Address</p>
														<p> {{ $request['service_address'] }} </p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Near Landmark</p>
														<p>McDonalds</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Addt'l Instructions</p>
														-
													</div>
		
												</div>

												@if ($category !== 'new')
													<p class="text-muted">Assigned Technician</p>
													<p>Mr. Jose P. Rizal <br> Mr. Juan D. Cruz</p>
												@endif

												<p class="text-muted mt-4"><b>PAYMENT DETAILS</b> </p>
		
												<div class="row">
		
													<div class="col-md-3">
														<p class="text-muted">Mode of Payment</p>
														<p>Full Payment</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Status</p>
														<p>Not Paid</p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Total Payment</p>
														<p><a href="">See full details</a></p>
													</div>
													<div class="col-md-3">
														<p class="text-muted">Date and Time Received</p>
														<p>-</p>
													</div>
												</div>
												@if ($category === 'pending')
													<div class="mt-5">
														<button type="button" style="width: 49%;" class="btn btn-primary waves-effect waves-light"
															data-toggle="modal" data-target="#myReschedule">Reschedule Request</button>
														<button type="button" style="width: 50%;" class="btn btn-danger waves-effect waves-light">Cancel
															Request</button>
													</div>
													<br><br>
												@endif
											</div>
										</div>
									</div>
								@endforeach
							</div>
						@endforeach
						{{-- <div class="tab-pane" id="pending-b2">
							<div class="row">
								<div class="col-md-3">
									<div class="card-box">
										<h5 class="text-warning">Pending Requests</h5>
										<hr>
										<div class="row">
											<div class="col-md-6">
												SR0928
											</div>
											<div class="col-md-6">
												Dec 20,2020
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-9">
									<div class="card-box">
										<h5>Service Request Information</h5>
										<hr>
										<p class="text-muted mt-4"><b>SERVICE DETAILS</b></p>
										<div class="row">
											<div class="col-md-3">
												<p class="text-muted">Service ID</p>
												<p>SR0928</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Status</p>
												<p>Pending</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Submitted Date</p>
												<p>Dec 21, 2020</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Service Time and Date</p>
												<p> 9AM - 10AM <br> Dec 20, 2020</p>
											</div>
										</div>
										<div class="row mt-3">
											<div class="col-md-3">
												<p class="text-muted">Service Type</p>
												<p>Aircondition Cleaning</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Property Type</p>
												<p>Company</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Appliance Type</p>
												<p>Split (1)</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Type and Brand</p>
												Non-inverter / Samsung
											</div>

										</div>


										<div class="row mt-3">

											<div class="col-md-3">
												<p class="text-muted">Service Location</p>
												<p>Quezon City</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Service Address</p>
												<p>1720 Dahlia St. Purok 17 Brgy Commonwealth Quezon City</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Near Landmark</p>
												<p>McDonalds</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Addt'l Instructions</p>
												-
											</div>

										</div>

										<p class="text-muted">Assigned Technician</p>
										<p>Mr. Jose P. Rizal <br> Mr. Juan D. Cruz</p>



										<p class="text-muted mt-4"><b>PAYMENT DETAILS</b></p>

										<div class="row">

											<div class="col-md-3">
												<p class="text-muted">Mode of Payment</p>
												<p>Full Payment</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Status</p>
												<p>Paid</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Total Payment</p>
												<p><a href="">See full details</a></p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Date and Time Received</p>
												<p>12:00 AM Dec 20,2020</p>
											</div>

										</div>

										<div class="mt-5">
											<button type="button" style="width: 49%;" class="btn btn-primary waves-effect waves-light"
												data-toggle="modal" data-target="#myReschedule">Reschedule Request</button>
											<button type="button" style="width: 50%;" class="btn btn-danger waves-effect waves-light">Cancel
												Request</button>
										</div>


									</div>
								</div>
							</div>

						</div>
						<div class="tab-pane" id="completed-b2">
							<div class="row">
								<div class="col-md-3">
									<div class="card-box">
										<h5 class="text-success">Completed Requests</h5>
										<hr>



										<div class="row">
											<div class="col-md-6">
												SR0928
											</div>
											<div class="col-md-6">
												Dec 20,2020
											</div>
										</div>

									</div>
								</div>
								<div class="col-md-9">
									<div class="card-box">
										<h5>Service Request Information</h5>
										<hr>

										<p class="text-muted mt-4"><b>SERVICE DETAILS</b></p>
										<div class="row">
											<div class="col-md-3">
												<p class="text-muted">Service ID</p>
												<p>SR0928</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Status</p>
												<p>Completed</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Submitted Date</p>
												<p>Dec 21, 2020</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Service Date</p>
												<p> 9AM - 10AM <br> Dec 20, 2020</p>
											</div>

										</div>


										<div class="row mt-3">
											<div class="col-md-3">
												<p class="text-muted">Service Type</p>
												<p>Aircondition Cleaning</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Property Type</p>
												<p>Company</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Appliance Type</p>
												<p>Split (1)</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Type and Brand</p>
												Non-inverter / Samsung
											</div>

										</div>


										<div class="row mt-3">

											<div class="col-md-3">
												<p class="text-muted">Service Location</p>
												<p>Quezon City</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Service Address</p>
												<p>1720 Dahlia St. Purok 17 Brgy Commonwealth Quezon City</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Near Landmark</p>
												<p>McDonalds</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Addt'l Instructions</p>
												-
											</div>

										</div>

										<div class="row mt-3">

											<div class="col-md-3">
												<p class="text-muted">Assigned Technician</p>
												<p>Mr. Jose P. Rizal <br> Mr. Juan D. Cruz</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Date and Time Completed</p>
												<p>12:00 PM Dec 20, 2020</p>
											</div>
											<div class="col-md-3">

											</div>
											<div class="col-md-3">

											</div>

										</div>




										<p class="text-muted mt-4"><b>PAYMENT DETAILS</b></p>

										<div class="row">

											<div class="col-md-3">
												<p class="text-muted">Mode of Payment</p>
												<p>Full Payment</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Status</p>
												<p>Paid</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Total Payment</p>
												<p><a href="">See full details</a></p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Date and Time Received</p>
												<p>12:00 AM Dec 20,2020</p>
											</div>

										</div>




									</div>
								</div>
							</div>

						</div>
						<div class="tab-pane" id="canceled-b2">
							<div class="row">
								<div class="col-md-3">
									<div class="card-box">
										<h5 class="text-danger">Canceled Requests</h5>
										<hr>


										<div class="row">
											<div class="col-md-6">
												SR0928
											</div>
											<div class="col-md-6">
												Dec 20,2020
											</div>
										</div>

									</div>
								</div>
								<div class="col-md-9">
									<div class="card-box">
										<h5>Service Request Information</h5>
										<hr>

										<p class="text-muted mt-4"><b>SERVICE DETAILS</b></p>
										<div class="row">
											<div class="col-md-3">
												<p class="text-muted">Service ID</p>
												<p>SR0928</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Status</p>
												<p>Canceled</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Submitted Date</p>
												<p>Dec 21, 2020</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Service Date</p>
												<p> 9AM - 10AM <br> Dec 20, 2020</p>
											</div>

										</div>


										<div class="row mt-3">
											<div class="col-md-3">
												<p class="text-muted">Service Type</p>
												<p>Aircondition Cleaning</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Property Type</p>
												<p>Company</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Appliance Type</p>
												<p>Split (1)</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Type and Brand</p>
												Non-inverter / Samsung
											</div>

										</div>


										<div class="row mt-3">

											<div class="col-md-3">
												<p class="text-muted">Service Location</p>
												<p>Quezon City</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Service Address</p>
												<p>1720 Dahlia St. Purok 17 Brgy Commonwealth Quezon City</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Near Landmark</p>
												<p>McDonalds</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Addt'l Instructions</p>
												-
											</div>

										</div>

										<div class="row mt-3">

											<div class="col-md-3">
												<p class="text-muted">Assigned Technician</p>
												<p>Mr. Jose P. Rizal <br> Mr. Juan D. Cruz</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Date and Time Canceled</p>
												<p>12:00 PM Dec 20, 2020</p>
											</div>
											<div class="col-md-3">

											</div>
											<div class="col-md-3">

											</div>

										</div>




										<p class="text-muted mt-4"><b>PAYMENT DETAILS</b></p>

										<div class="row">

											<div class="col-md-3">
												<p class="text-muted">Mode of Payment</p>
												<p>Full Payment</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Status</p>
												<p>Paid</p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Total Payment</p>
												<p><a href="">See full details</a></p>
											</div>
											<div class="col-md-3">
												<p class="text-muted">Date and Time Received</p>
												<p>12:00 AM Dec 20,2020</p>
											</div>

										</div>




									</div>
								</div>
							</div>

						</div> --}}
					</div>
				</div>
			</div> <!-- end card-box-->
		</div> <!-- end col -->
	</div>
	<!-- end row -->



	<!-- sample modal content -->
	<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Payment Receipt</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">

					<p>Please attach the file here. Use your Service Request ID number in image name. We only accept the
						image with 300-400 KB (kilobytes).</p>

					<div class="form-group">
						<label for="exampleInputFile">File input</label><br>
						<input type="file" id="exampleInputFile">
						<p class="help-block"></p>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary waves-effect waves-light">Send</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->




	<!-- sample modal content -->
	<div id="myReschedule" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
		aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Reschedule Service Request</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				</div>
				<div class="modal-body">

					<p>Set your desire date and timeslot of your service request. You can only reschedule your service
						request <b>2</b> times.</p>

					<div class="form-group mb-3">
						<label>Select Date</label>
						<input type="text" class="form-control" data-provide="datepicker">
					</div>

					<label>Select Timeslot</label>
					<select class="form-control">
						<option></option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary waves-effect waves-light">Save</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</div> <!-- container -->
</div> <!-- content -->

</main>


@endsection