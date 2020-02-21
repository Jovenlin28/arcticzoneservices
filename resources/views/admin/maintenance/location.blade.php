@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
          <li class="breadcrumb-item active">Location</li>
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
        <h4 class="header-title">Location</h4>
        <p class="text-muted font-13 mb-4"></p>

        <table id="basic-datatable" class="table dt-responsive">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>Location Name</th>
              <th>Date Created</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>
            @foreach($locations as $location)
            <tr id="{{$location->id}}">
              <td>{{$location->id}}</td>
              <td>{{$location->name}}</td>
              <td>{{$location->created_at}}</td>
              <td>
                <button type="button" class="btn btn-success btn-sm" onclick="show_edit_modal({{$location}})"><i
                    class="la la-pencil"></i></button>

                <button type="button" class="btn btn-danger btn-sm" onclick="delete_location({{$location->id}})"><i
                    class="la la-trash"></i></button>
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
        <h4 class="header-title">Add New Location</h4>
        <p class="text-muted">New location for new service requests</p>

        <form id="addlocation_form">
          @csrf
          <div class="form-group">
            <label>Location Name<span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" placeholder="Enter location name" class="form-control" required>
            <p class="text-danger mt-1" id="location_name_error"></p>
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
          <h4 class="modal-title" id="myModalLabel">Edit Location</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>

        @csrf
        <form id="location_form">
          @method('patch')

          <div class="modal-body">
            <input type="text" name="id" id="id" hidden>
            <div class="form-group">
              <label>Location Name</label>
              <input type="text" class="form-control" name="location_name" id="location_name">
              <p class="text-danger" id="location_name_error"></p>
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
  function addRow(data) {
        // reload muna sa ngayun
        window.location.reload();

        // pero kung gusto mo na hindi na mag reload
        // lagay mo code dito...
        // console.log(data);
    }

    function updateRow(id, newVal) {
        var table = $('#basic-datatable')[0];

        for (var i = 0; i < table.rows.length; i++) {
            if (table.rows[i].id == id) {
                // children[1] = 'LOCATION' column
                table.rows[i].children[1].innerText = newVal;
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

    function delete_location(id) {
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
                    url: "/admin/maintenance/location/"+id,
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
        })

    }

    $(document).ready(function(){
        $('#location_form').on('submit', function(e) {
            e.preventDefault();
            var id = $('#id').val();

            $.ajax({
                url: "/admin/maintenance/location/"+id,
                method: "POST",
                context: document.body,
                data: new FormData(this),
                contentType: false, // nakalimutan mo hehe
                global: false,
                cache: false,
                processData: false,
                success: function (data){
                    if(data.errors){
                        (data.errors.location_name) ? display_errors(data.errors.location_name,'#location_name','#location_name_error') : eliminate_errors('#location_name', '#location_name_error');
                    }
                    else{
                        $('#editModal').modal('hide');
                        Swal.fire(
                        data.title,
                        data.message,
                        data.type
                        ) // sweetalert rep.

                        // change value nung row..?
                        updateRow(id, $('#location_name').val())
                    }
                },
                error: function(data){
                    alert('errror!!!');
                    alert(data);
                }
            });
        });
    });

    function show_edit_modal(location){
        eliminate_errors('#location_name','#location_name_error');
        document.getElementById('location_form').reset();
        $('#id').val(location.id);
        $('#location_name').val(location.name);

        $('#editModal').modal('show');
    }

    $(document).ready(function(){
        $('#addlocation_form').on('submit', function(e) {
            var self = this;
            e.preventDefault();

            $.ajax({
                url: "/admin/maintenance/location",
                method: "POST",
                context: document.body,
                data: new FormData(this),
                contentType: false, // nakalimutan mo hehe
                global: false,
                cache: false,
                processData: false,
                success: function (data) {
                    // validation message
                    if (data.errors) {
                        if (data.errors.name) {
                            display_errors(data.errors.name,'#name','#location_name_error');
                        } else {
                            eliminate_errors('#name', '#location_name_error');
                        }

                        return;
                    }

                    if (data.type) {
                        // sweetalert rep.
                        Swal.fire(data.title, data.message, data.type)
                            .then((result) => {
                                if (data.type == 'success') {
                                    addRow(data.service);
                                }
                            });
                    } else {
                        // error message
                    }
                },
                error: function(data){
                    //
                }
            });
        });
    });
</script>

@endpush