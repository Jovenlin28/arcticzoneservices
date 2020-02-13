@extends('layouts.tech-master')


@section('content')

<div class="row mt-5">
	<div class="col-12">
		<div class="page-title-box">
			<h4 class="page-title">Service Job</h4>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		@foreach ($service_requests as $request)
			@if ($request['status'] === 'pending')
				<div class="card">
					<div class="card-header bg-danger py-3 text-white">
						<div class="card-widgets">
							<a data-toggle="collapse" 
								href="#sr{{$request['id']}}" 
								role="button" 
								aria-expanded="false"
								aria-controls="cardCollpase2">
								<i class="mdi mdi-minus"></i></a>
						</div>

						<h5 class="card-title mb-0 text-white">
							SR{{ $request['id'] }} - {{ $request['service_type']['name'] }}
						</h5>
					</div>

					<div id="sr{{$request['id']}}" class="collapse show">
						<div class="card-body">
							<div class="row">
								<div class="col-md-7">
									<p> <b> CL{{ $request['client']['id'] }} - 
										{{ $request['client']['firstname'] . ' ' . $request['client']['lastname'] }}</b> <br>
										{{ $request['location']['name'] }} ; Company <br>
										{{ $request['client']['address'] }} <br>
										{{ $request['client']['contact_number'] }}
									</p>

									<p class="mt-4"> <b> Appliances:</b> <br>
										@foreach ($request['appliances'] as $appliance)
												{{ $appliance['name'] }} ({{ $appliance['pivot']['qty'] }}) - 
												{{ $appliance['brand']['name'] . ' / ' . $appliance['unit']['name']}}
										@endforeach
									</p>

									<p class="mt-4"> <b> Problems Encountered:</b> <br>
										-
									</p>

								</div>

								<div class="col-md-5">
									<p> <b> Service Time and Date:</b> <br>
										{{ date('M d, Y', strtotime($request['service_date'])) }} /
										{{ $request['timeslot']['start'] }} - {{ $request['timeslot']['end'] }}
									</p>
								</div>
							</div>


							<div class="row">
								<div class="col-md-6">
									<p class="text-muted">
										{{ \Carbon\Carbon::parse($request['validated_at'])->diffForHumans() }}
									</p>
								</div>
								<div class="col-md-6">
									<button class="btn btn-danger btn-md float-right" data-toggle="modal" data-target="#FinishService">Finish
										Service</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endif
			
		@endforeach
		
	</div>


	<div class="col-md-4">
		<div class="card">
			<div class="card-body">
				<h5 class="card-title text-success mb-0">Completed Lane</h5>

				<div class="collapse pt-3 show">
					This lane shows the service is finished. You may want to see all your progress.
				</div>
			</div>
		</div>

		@foreach ($service_requests as $request)
			@if ($request['status'] === 'completed')
				<div class="card">
					<div class="card-header bg-success py-3 text-white">
						<div class="card-widgets">
							<a data-toggle="collapse" 
								href="#rq-completed{{ $request['id'] }}" 
								role="button" 
								aria-expanded="false"
								aria-controls="cardCollpase2">
								<i class="mdi mdi-minus"></i></a>
						</div>

						<h5 class="card-title mb-0 text-white">SR{{ $request['id'] }} - Cleaning</h5>
					</div>

					<div id="rq-completed{{ $request['id'] }}" class="collapse show">
						<div class="card-body">
							<p> <strong>Work Done:</strong> <br>
								@foreach ($request['workdone'] as $sr_workdone)
										{{ $sr_workdone['name'] }}
								@endforeach
							</p>

							<p class="mt-4"> Remarks: <br>
								-
							</p>

							<p class="text-muted">
								{{ \Carbon\Carbon::parse($request['completed_at'])->diffForHumans() }}
							</p>

						</div>
					</div>
				</div>
			@endif
			
		@endforeach
	
	</div>
</div>


<!-- Modal Content -->
<div id="FinishService" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title text-danger" id="myModalLabel">Finish Service</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">

				<label>Work Done:</label>
				<select name="workdone_id" class="form-control">
					@foreach ($workdone as $work)
						<option value="{{ $work['id'] }}">{{ $work['name'] }}</option>
					@endforeach
				</select>

				<br>

				<label>Please enter your remarks:</label>
				<textarea name="remarks" class="form-control" rows="5"></textarea>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger waves-effect waves-light">Finish Service</button>
			</div>
		</div>
	</div>
</div>

<!-- End of Modal Content -->

<script type="text/javascript">
	$(document).ready(function(){
		alert(1);
	});
</script>


@endsection