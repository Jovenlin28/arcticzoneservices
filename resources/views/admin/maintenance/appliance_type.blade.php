@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			<div class="page-title-right">
				<ol class="breadcrumb m-0">
					<li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
					<li class="breadcrumb-item active">Appliance Type</li>
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
				<h4 class="header-title">Appliance Type</h4>
				<p class="text-muted font-13 mb-4"></p>

				<table id="basic-datatable" class="table dt-responsive">
					<thead class="thead-light">
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>

						@foreach ($appliances as $appliance)
							<tr id="{{$appliance->id}}">
								<td>{{ $appliance->id }}</td>
								<td>{{ $appliance->name }}</td>
								<td>
									<img width="80" 
										height="80" 
										class="appliance-img" 
										src="{{ url('/uploads/appliances/' . $appliance->image)}}">
								</td>
								<td>
                  <button type="button" 
                    onclick="show_edit_modal({{$appliance}})"
                    class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal">
                    <i class="la la-pencil"></i></button>
                  <button type="button" 
                    onclick="delete_appliance_type({{$appliance->id}})"
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
				<h4 class="header-title">Add Appliance Type</h4>
				<p class="text-muted">Appliance type for new service requests</p>

				<form id="add_appliance_form" enctype="multipart/form-data">
          {{ csrf_field() }}
					<div class="form-group">
						<label>Appliance Name<span class="text-danger">*</span></label>
            <input name="name" type="text" class="form-control">
            <p class="text-danger"></p>
					</div>

					<div class="form-group">
						<label>Appliance Image<span class="text-danger">*</span></label><br>
            <input name="file" type="file" id="exampleInputFile">
            <p class="text-danger"></p>
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
				<form id="update_appliance_form" enctype="multipart/form-data">
          @method('patch')
					<div class="modal-body">
            <input type="text" name="id" id="id" hidden>
						<div class="form-group">
							<label>Appliance Name
                <span class="text-danger">*</span>
              </label>
              <input id="name" name="name" type="text" class="form-control">
              <p class="text-danger"></p>
						</div>

						<div class="form-group">
							<label>Appliance Image
                <span class="text-danger">*</span>
              </label><br>
              <input name="file" type="file" id="exampleInputFile">
              <p class="text-danger"></p>
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
    $('form#add_appliance_form').on('submit', function(evt){
      evt.preventDefault();
      $('.is-invalid').removeClass('is-invalid');
      $('p.text-danger').text('');
      $.ajax({
        url:"{{ url('admin/maintenance/appliance_type') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        context: document.body,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
          if (res.errors) {
            for (const key in res.errors) {
              $(`[name=${key}]`).addClass('is-invalid');
              $(`[name=${key}]`).next().text(res.errors[key][0]);
            }
          } else {
            Swal.fire(
              res.title,
              res.message,
              res.type
            ).then(() => {
              window.location.reload();
            });
          }
        },

        error: function(err) {
          console.log(err);
        }
      });
    });


    $('form#update_appliance_form').on('submit', function(evt){
      evt.preventDefault();
      var id = $('#id').val();

      $('.is-invalid').removeClass('is-invalid');
      $('p.text-danger').text('');
      $.ajax({
        url: "/admin/maintenance/appliance_type/"+ id,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: "POST",
        data: new FormData($(this)[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
          if (res.errors) {
            for (const key in res.errors) {
              $(`div#editModal [name=${key}]`).addClass('is-invalid');
              $(`div#editModal [name=${key}]`).next().text(res.errors[key][0]);
            }
          } else {
            Swal.fire(
              res.title,
              res.message,
              res.type
            ).then(() => {
              window.location.reload();
            });
          }
        },

        error: function(err) {
          console.log(err);
        }
      });
    });

  });

  function show_edit_modal(appliance){
    document.getElementById('update_appliance_form').reset();
    $('#id').val(appliance.id);

    console.log(appliance.name);
    $('#editModal input#name').val(appliance.name);

    $('#editModal').modal('show');
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

  function delete_appliance_type(id) {
    Swal.fire({
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
          url: "/admin/maintenance/appliance_type/"+id,
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
</script>

@endpush()