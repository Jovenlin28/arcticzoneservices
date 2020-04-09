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

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-primary mb-0">Pending Lane</h5>

        <div class="collapse pt-3 show">
          This lane shows the service is pending. You may want to see all your progress.
        </div>
      </div>
    </div>


    @foreach ($sr_status_group['pending'] as $sr)
    <div class="card">
      <div class="card-header bg-primary py-3 text-white">
        <div class="card-widgets">
          <a data-toggle="collapse" href="#pending_{{ $sr['id'] }}" role="button" aria-expanded="false"
            aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
        </div>

        <h5 class="card-title mb-0 text-white">SRID{{ date('Y') . '-0000' . $sr['id'] }}</h5>
      </div>

      <div id="pending_{{ $sr['id'] }}" class="collapse show">
        <div class="card-body">
          <p>
            @if ($sr['client_contact_person'] === null)
            <b> {{ $sr['client']['firstname'] . ' ' . $sr['client']['lastname'] }} </b> <br>
            {{ $sr['location']['name'] }} ; Company <br>
            {{ $sr['client']['address'] }} <br>
            {{ $sr['client']['contact_number'] }}
            @else
            <b>
              {{ $sr['client_contact_person']['firstname'] . ' ' . $sr['client_contact_person']['lastname'] }}
            </b> <br>
            {{ $sr['location']['name'] }} ; Company <br>
            {{ $sr['client_contact_person']['address'] }} <br>
            {{ $sr['client_contact_person']['contact_number'] }}
            @endif <br>
            {{-- {{ $sr['service_address'] }} <br>
            {{ $sr['location']['name'] }} ; Company <br>
            {{ $sr['client']['contact_number'] }} --}}
            <br>
            <br>
            <b>Service Date and Time</b>
            <br>
            {{ date('F d, Y', strtotime($sr['service_date'])) }}
            {{ date('h:i A', strtotime($sr['timeslot']['start'])) }} -
            {{ date('h:i A', strtotime($sr['timeslot']['end'])) }}
            <br>
            <br>
            <b>Appliances Information</b>
            <br>
            @foreach ($sr['appliances'] as $appliance)
            {{ $appliance['name'] }} ({{ $appliance['pivot']['qty'] }}) -
            {{ $appliance['brand']['name'] . ' / ' . $appliance['unit']['name'] . ' / ' . $appliance['service_type']['name']}}
            <br>
            @endforeach
            <br>
            <br>
            <b>Problems Encountered</b>
            <br>
            -

          </p>

          <div class="row">
            <div class="col-md-6">
              <p class="text-muted">
                {{ \Carbon\Carbon::parse($sr['validated_at'])->diffForHumans() }}
              </p>
            </div>
          </div>

        </div>
      </div>
    </div>
    @endforeach


  </div>

  <div class="col-md-4">

    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-danger mb-0">On-going Lane</h5>

        <div class="collapse pt-3 show">
          This lane shows the service is on-going. You may want to see all your progress.
        </div>
      </div>
    </div>



    @foreach ($sr_status_group['on_going'] as $sr)
    <div class="card">
      <div class="card-header bg-danger py-3 text-white">
        <div class="card-widgets">
          <a data-toggle="collapse" href="#on_going_{{ $sr['id'] }}" role="button" aria-expanded="false"
            aria-controls="cardCollpase2"><i class="mdi mdi-minus"></i></a>
        </div>

        <h5 class="card-title mb-0 text-white">SRID{{ date('Y') . '-0000' . $sr['id'] }}</h5>
      </div>

      <div id="on_going_{{ $sr['id'] }}" class="collapse show">
        <div class="card-body">
          <p>
            @if ($sr['client_contact_person'] === null)
            <b> {{ $sr['client']['firstname'] . ' ' . $sr['client']['lastname'] }} </b> <br>
            {{ $sr['location']['name'] }} 
            {{ isset($sr['company_name']) ? ';' . $sr['company_name'] : ''}} <br>
            {{ $sr['client']['address'] }} <br>
            {{ $sr['client']['contact_number'] }}
            @else
            <b>
              {{ $sr['client_contact_person']['firstname'] . ' ' . $sr['client_contact_person']['lastname'] }}
            </b> <br>
            {{ $sr['location']['name'] }} ; Company <br>
            {{ $sr['client_contact_person']['address'] }} <br>
            {{ $sr['client_contact_person']['contact_number'] }}
            @endif <br>
            {{-- {{ $sr['service_address'] }} <br>
            {{ $sr['location']['name'] }} ; Company <br>
            {{ $sr['client']['contact_number'] }} --}}
            <br>
            <br>
            <b>Service Date and Time</b>
            <br>
            {{ date('F d, Y', strtotime($sr['service_date'])) }}
            {{ date('h:i A', strtotime($sr['timeslot']['start'])) }} -
            {{ date('h:i A', strtotime($sr['timeslot']['end'])) }}
            <br>
            <br>
            <b>Appliances Information</b>
            <br>
            @foreach ($sr['appliances'] as $appliance)
            {{ $appliance['name'] }} ({{ $appliance['pivot']['qty'] }}) -
            {{ $appliance['brand']['name'] . ' / ' . $appliance['unit']['name'] . ' / ' . $appliance['service_type']['name']}}
            <br>
            @endforeach
            <br>
            <br>
            <b>Problems Encountered</b>
            <br>
            -

          </p>

          <div class="row">
            <div class="col-md-6">
              <p class="text-muted">
                {{ \Carbon\Carbon::parse($sr['validated_at'])->diffForHumans() }}
              </p>
            </div>
            <div class="col-md-6">
              @if (!in_array($tech_id, array_column($sr['remarks'], 'technician_id')))
              <button class="finish-service btn btn-danger btn-md float-right" data-request-id="{{ $sr['id'] }}"
                data-toggle="modal" data-target="#sendRemarks">Remarks</button>
              @else
              <span class="badge badge-success status float-right">Waiting for approval</span>
              @endif
            </div>
          </div>

        </div>
      </div>
    </div>
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


    @foreach ($sr_status_group['completed'] as $sr)
    <div class="card">
      <div class="card-header bg-success py-3 text-white">

        <div class="card-widgets">
          <a data-toggle="collapse" href="#rq-completed{{ $sr['id'] }}" role="button" aria-expanded="false"
            aria-controls="cardCollpase2">
            <i class="mdi mdi-minus"></i></a>
        </div>

        <h5 class="card-title mb-0 text-white">SRID{{ date('Y') . '-0000' . $sr['id'] }}</h5>
      </div>

      <div id="rq-completed{{ $sr['id'] }}" class="collapse show">
        <div class="card-body">
          <p class=""> <strong>Remarks:</strong> <br>
            @if ($sr['remarks'][0]['technician_id'] === $tech_id)
            {{ $sr['remarks'][0]['name'] }}
            @else
            {{ $sr['remarks'][1]['name'] }}
            @endif
          </p>

          <p class="text-muted">
            {{ \Carbon\Carbon::parse($sr['completed_at'])->diffForHumans() }}
          </p>

        </div>
      </div>
    </div>

    @endforeach
  </div>
</div>


<!-- Modal Content -->
<div id="sendRemarks" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="send_remarks">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Service Request ID:
          </h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">

          <label>Horse Power Addt'l Details</label>

          <div class="after-add-more">
            <div class="row">
              <div class="col-md-5">
                <div class="form-group">
                  <label>Appliance Type<span class="text-danger">*</span></label>
                  <select name="appliance_id" class="form-control">
                    <option>-- Select --</option>
                    @foreach ($appliances as $appliance)
                    <option value="{{ $appliance['id'] }}">
                      {{ $appliance['name'] }}
                    </option>
                    @endforeach
                  </select>
                </div>

              </div>
              <div class="col-md-5">
                <div class="form-group">
                  <label>HP<span class="text-danger">*</span></label>
                  <select name="horse_power_id" class="form-control">
                    <option>-- Select --</option>
                    @foreach ($horse_power as $hp)
                    <option value="{{ $hp['id'] }}">
                      {{ $hp['hp'] }}
                    </option>
                    @endforeach
                  </select>
                </div>

              </div>

              <div class="col-md-2">
                <br>
                <button type="button" class="btn btn-secondary btn-md mt-1 float-right" id="add-more"><i
                    class="fe-plus"></i></button>
              </div>
            </div>
          </div>



          <div class="copy invisible mb-0">
            <div class="control-group">
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label>Appliance Type<span class="text-danger">*</span></label>
                    <select name="appliance_id" class="form-control">
                      <option>-- Select --</option>
                      @foreach ($appliances as $appliance)
                      <option value="{{ $appliance['id'] }}">
                        {{ $appliance['name'] }}
                      </option>
                      @endforeach
                    </select>
                  </div>

                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    <label>HP<span class="text-danger">*</span></label>
                    <select name="horse_power_id" class="form-control">
                      <option>-- Select --</option>
                      @foreach ($horse_power as $hp)
                      <option value="{{ $hp['id'] }}">
                        {{ $hp['hp'] }}
                      </option>
                      @endforeach
                    </select>
                  </div>

                </div>

                <div class="col-md-2">
                  <br>
                  <button type="button" class="btn btn-danger btn-md mt-1 float-right" id="remove"><i
                      class="fe-minus"></i></button>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label>Work Done Description</label>
            <input name="work_done" type="text" class="form-control">
          </div>

          <div class="form-group">
            <label>Remarks</label>
            <textarea name="remarks" class="form-control" rows="6"></textarea>
          </div>

        </div>
        <div class="modal-footer">
          <button id="send_remarks_button" type="submit" class="btn btn-danger waves-effect waves-light">Send Remarks</button>
        </div>
      </form>


    </div>
  </div>
</div>

<!-- End of Modal Content -->

<script type="text/javascript">
  let service_request_id;
	$(document).ready(function(){
    $(document).on('click', 'button#add-more', function(){  
      const html = $('.copy').html();
      $('.after-add-more').append(html);
    });

    $(document).on('click', '#remove', function(){ 
        $(this).parents(".control-group").remove();
    });

		$('button.finish-service').on('click', function(){
			service_request_id = $(this).attr('data-request-id');
		});

		$('form#send_remarks').on('submit', function(e){
      e.preventDefault();

      const input = $(this).serializeArray();
      const transformedInput = transformData(input);
      transformedInput.service_request_id = service_request_id;

			$('button#send_remarks_button').prop('disabled', true);

			$.ajax({
				url: ' {{url("service-request/finish")}} ',
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type: 'POST',
				data: { data: transformedInput },
				success: function(data) {
          console.log(data);
					$('button#send_remarks_button').prop('disabled', false);
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

  function transformData(input) {
    const arrayData = ['appliance_id', 'horse_power_id'];
    return input.reduce((acc, item) => {
      if (item.value.includes('Select')) return acc;
      if (arrayData.includes(item.name)) {
        if (!acc[item.name]) {
            acc[item.name] = [item.value];
        } else {
            acc[item.name].push(item.value);
        }
      } else {
        acc[item.name] = item.value;
      }
      return acc;
    }, {})
  }
</script>

@endsection