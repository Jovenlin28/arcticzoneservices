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
    @if ($request['status'] === 'pending' 
    && \Carbon\Carbon::now()->gte(\Carbon\Carbon::parse($request['service_date'])))
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
					SR{{ date('Y') . '-' . '0000' . $request['id'] }}
				</h5>
			</div>

			<div id="sr{{$request['id']}}" class="collapse show">
				<div class="card-body">
					<div class="row">
						<div class="col-md-7">
							<p> 
                @if ($request['client_contact_person'] === null) 
                  <b> {{ $request['client']['firstname'] . ' ' . $request['client']['lastname'] }} </b> <br>
                  {{ $request['location']['name'] }} ; Company <br>
                  {{ $request['client']['address'] }} <br>
                  {{ $request['client']['contact_number'] }}
                @else
                  <b> {{ $request['client_contact_person']['firstname'] . ' ' . $request['client_contact_person']['lastname'] }} </b> <br>
                  {{ $request['location']['name'] }} ; Company <br>
                  {{ $request['client_contact_person']['address'] }} <br>
                  {{ $request['client_contact_person']['contact_number'] }}
                @endif
							</p>

							<p class="mt-4"> <b> Appliances:</b> <br>
								@foreach ($request['appliances'] as $appliance)
								{{ $appliance['name'] }} ({{ $appliance['pivot']['qty'] }}) -
                {{ $appliance['brand']['name'] . ' / ' . $appliance['unit']['name'] . ' / ' . $appliance['service_type']['name']}}
                <br>
								@endforeach
							</p>

							<p class="mt-4"> <b> Problems Encountered:</b> <br>
								-
							</p>

						</div>

						<div class="col-md-5">
							<p> <b> Service Time and Date:</b> <br>
								{{ date('F d, Y', strtotime($request['service_date'])) }} /
                {{ date('h:i A', strtotime($request['timeslot']['start'])) }} - 
                {{ date('h:i A', strtotime($request['timeslot']['end'])) }}
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
              @if (!in_array($tech_id, array_column($request['remarks'], 'technician_id')))
                <button class="finish-service btn btn-danger btn-md float-right" 
                data-request-id="{{ $request['id'] }}"
                data-toggle="modal" 
                data-target="#FinishService">Remarks</button>
              @else
                  <span class="badge badge-success status float-right">Waiting for approval</span>
              @endif
							
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
		@if ($request['status'] === 'completed' && count($request['remarks']) === 2)
		<div class="card">
			<div class="card-header bg-success py-3 text-white">
        
				<div class="card-widgets">
					<a data-toggle="collapse" href="#rq-completed{{ $request['id'] }}" role="button" aria-expanded="false"
						aria-controls="cardCollpase2">
						<i class="mdi mdi-minus"></i></a>
        </div>

				<h5 class="card-title mb-0 text-white">SR{{ $request['id'] }} - Cleaning</h5>
			</div>

			<div id="rq-completed{{ $request['id'] }}" class="collapse show">
				<div class="card-body">
					<p class=""> <strong>Remarks:</strong> <br>
						@if ($request['remarks'][0]['technician_id'] === $tech_id)
              {{ $request['remarks'][0]['name'] }}
            @else
              {{ $request['remarks'][1]['name'] }}
            @endif
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
				<h4 class="modal-title text-danger" id="myModalLabel">Remarks</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<label>Please enter your remarks:</label>
				<textarea id="remarks" name="remarks" class="form-control" rows="5"></textarea>

			</div>
			<div class="modal-footer">
				<button type="button" id="finish-service" class="btn btn-danger waves-effect waves-light">Send Remarks</button>
			</div>
		</div>
	</div>
</div>

<!-- End of Modal Content -->

<script type="text/javascript">
	let service_request_id;
	$(document).ready(function(){

		$('button.finish-service').on('click', function(){
			service_request_id = $(this).attr('data-request-id');
		});

		$('button#finish-service').on('click', function(){
			const submitBtn = $(this);
			// const workdone_id = $('select#workdone-id').val();
			const remarks = $('textarea#remarks').val();

			submitBtn.prop('disabled', true);

			$.ajax({
				url: ' {{url("service-request/finish")}} ',
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				data: {service_request_id, remarks},
				success: function(data) {
					submitBtn.prop('disabled', false);
					if (data.type) {
						Swal.fire(data.title, data.message, data.type)
						.then((result) => {
							window.location.reload();
						});
					} else {
							// error message
					}
				},

				error: function(err) {
					console.log(err);
				}
			});
		});
	});
</script>


@endsection