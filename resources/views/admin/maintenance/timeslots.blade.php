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
								<td id="start_time">{{ date('h:iA', strtotime($timeslot->start)) }}</td>
								<td id="end_time">{{ date('h:iA', strtotime($timeslot->end)) }}</td>
								<td>
                  <button type="button" 
                    onclick="show_edit_modal( {{ $timeslot->id}} )"
                    class="btn btn-success btn-sm" 
                    data-toggle="modal" 
                    data-target="#editModal">
                    <i class="la la-pencil"></i></button>

                  <button type="button" 
                    onclick="delete_timeslot({{ $timeslot->id }})"
                    class="btn btn-danger btn-sm">
                    <i class="la la-trash"></i></button>
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

				<form id="add_timeslot_form">
					<div class="form-group">
            <div class="input-group clockpicker" 
              data-placement="bottom" 
              data-align="top" 
              data-autoclose="true">
              <input type="text" 
                name="start_time"
                class="form-control" 
                placeholder="Select start time">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
              </span>
            </div>
            <p id="start_time" class="text-danger"></p>
          </div>

					<div class="form-group">
            <div class="input-group clockpicker" 
              data-placement="bottom" 
              data-align="top" 
              data-autoclose="true">
              <input type="text" 
              name="end_time"
              class="form-control" 
              placeholder="Select end time">
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-time"></span>
              </span>
            </div>
            <p id="end_time" class="text-danger"></p>
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


				<form id="update_timeslot_form">
          @csrf
          @method('patch')

					<div class="modal-body">
            <input type="text" name="timeslot_id" id="id" hidden>
            <div class="form-group">
              <h4>Select start time</h4>
              <div class="input-group clockpicker" 
                data-placement="bottom" 
                data-align="top" 
                data-autoclose="true">
                
                <input type="text" 
                  id="start_time"
                  name="start_time"
                  class="form-control" 
                  placeholder="Select start time">
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
              <p id="start_time" class="text-danger"></p>
            </div>
  
            <div class="form-group">
              <h4>Select end time</h4>
              <div class="input-group clockpicker" 
                data-placement="bottom" 
                data-align="top" 
                data-autoclose="true">
                <input type="text" 
                id="end_time"
                name="end_time"
                class="form-control" 
                placeholder="Select end time">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
              </div>
              <p id="end_time" class="text-danger"></p>
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

@push('scripts')

<script type="text/javascript">
  $(document).ready(function() {

    $('.clockpicker').clockpicker({
      twelvehour: true
    });


    $('form#add_timeslot_form').on('submit', function(evt){
      evt.preventDefault();
      $('.is-invalid').removeClass('is-invalid');
      $('p.text-danger').text('');

      $.ajax({
				url: ' {{url("admin/maintenance/service_timeslots")}} ',
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: false,
        global: false,
        cache: false,
        processData: false,
				type: 'POST',
				data: new FormData(this),
				success: function(res) {
          if (res.errors) {
            for (const key in res.errors) {
              $(`form#add_timeslot_form [name=${key}]`).addClass('is-invalid');
              $('form#add_timeslot_form').find(`p#${key}`).text(res.errors[key][0]);
            }
          } else {
            Swal.fire(
              res.title,
              res.message,
              res.type
            ).then(() => {
              window.location.reload();
            })
          }
				},

				error: function(err) {
					console.log(err);
				}
      });
      
    });

    $('form#update_timeslot_form').on('submit', function(evt){
      evt.preventDefault();
      var id = $('#id').val();

      $('.is-invalid').removeClass('is-invalid');
      $('p.text-danger').text('');

      $.ajax({
				url: "/admin/maintenance/service_timeslots/" + id,
				headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        contentType: false,
        global: false,
        cache: false,
        processData: false,
				type: 'POST',
				data: new FormData(this),
				success: function(res) {
          if (res.errors) {
            for (const key in res.errors) {
              $(`form#update_timeslot_form [name=${key}]`).addClass('is-invalid');
              $('form#update_timeslot_form').find(`p#${key}`).text(res.errors[key][0]);
            }
          } else {
            Swal.fire(
              res.title,
              res.message,
              res.type
            ).then(() => {
              updateRow(id, 
              $('form#update_timeslot_form input#start_time').val(), 
              $('form#update_timeslot_form input#end_time').val())
              $('#editModal').modal('hide');
            });
          }
				},

				error: function(err) {
					console.log(err);
				}
      });
    });
  });

  function updateRow(id, startTime, endTime) {
    var table = $('#basic-datatable')[0];

    for (var i = 0; i < table.rows.length; i++) {
      if (table.rows[i].id == id) {
        table.rows[i].children[1].innerText = startTime;
        table.rows[i].children[2].innerText = endTime;
        break;
      }
    }
  }

  function deleteRow(id) {
    var table = $('#basic-datatable')[0];

    for (var i = 0; i < table.rows.length; i++) {
      if (table.rows[i].id == id) {
        table.rows[i].remove();
        break;
      }
    }
  }

  function delete_timeslot(id) {
    Swal.fire(
      {
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
      if (result.value) {
        $.ajax({
          url: "/admin/maintenance/service_timeslots/" + id,
          method: 'POST',
          data: {
            "_method": 'DELETE',
          },
          success: function (data){
            if (data.message == 'Deleted!') {
              Swal.fire('Deleted!','Your file has been deleted.','success').then(() => {
                deleteRow(id);
              });
            }
          },
          error: function(data){
              //
          }
        });
      }
    });
  }

  function show_edit_modal(id){
    eliminate_errors(
      'div#editModal input#start_time', 'div#editModal input#end_time',
      '#unit_name_error', '#unit_fee_error'
    );
    document.getElementById('update_timeslot_form').reset();
    const startTime = $(`tr#${id}`).find('td#start_time').text().trim();
    const endTime = $(`tr#${id}`).find('td#end_time').text().trim();
    $('#id').val(id);
    $('div#editModal input#start_time').val(startTime);
    $('div#editModal input#end_time').val(endTime);

    $('#editModal').modal('show');
  }
</script>

@endpush
