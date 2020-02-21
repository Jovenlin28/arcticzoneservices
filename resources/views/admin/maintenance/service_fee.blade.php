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
            <tr id="{{ $service_fee->id }}">
              <td> {{ $service_fee->id }}</td>
              <td> {{ $service_fee->service_type->name }}</td>
              <td> {{ $service_fee->appliance->name }}</td>
              <td id="service_fee"> {{ $service_fee->fee }}</td>
              <td>
                <button type="button" 
                  onclick="show_edit_modal({{$service_fee}})"
                  class="btn btn-success btn-sm">
                  <i class="la la-pencil"></i></button>

                <button type="button" 
                  onclick="delete_service_fee({{$service_fee->id}})"
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
        <h4 class="header-title">Add Service Fees</h4>
        <p class="text-muted">Service fee per service and appliance type for new service requests</p>

        <form id="service_fee_form">

          <div class="form-group">
            <label>Select Service Type<span class="text-danger">*</span></label>
            <select name="service_type_id" class="form-control">
              @foreach ($service_types as $service_type)
              <option value="{{ $service_type->id}}">
                {{ $service_type->name}}
              </option>
              @endforeach
            </select>
            <p class="text-danger mt-1"></p>
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
            <p class="text-danger mt-1"></p>
          </div>

          <div class="form-group">
            <label>Service Fee<span class="text-danger">*</span></label>
            <input name="service_fee" type="text" class="form-control">
            <p class="text-danger mt-1"></p>
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
        <form id="update_service_fee">
          @method('patch')
          <div class="modal-body">
            <input type="text" name="id" id="id" hidden>
            <div class="form-group">
              <label>Service Fee<span class="text-danger">*</span></label>
              <input id="service_fee" name="service_fee" type="text" class="form-control" required>
              <p class="text-danger mt-1" id="service_fee_error"></p>
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

  $(document).ready(function(){

    $('#service_fee_form').on('submit', function(e) {
      var self = this;
      e.preventDefault();
      $('.is-invalid').removeClass('is-invalid');
      $('p.text-danger').text('');

      $.ajax({
        url: "/admin/maintenance/service_fees",
        method: "POST",
        context: document.body,
        data: new FormData(this),
        contentType: false,
        global: false,
        cache: false,
        processData: false,
        success: function (data) {
          if (data.errors) {
            for (const key in data.errors) {
              $(`[name=${key}]`).addClass('is-invalid');
              $(`[name=${key}]`).next().text(data.errors[key][0]);
            }

            return;
          }

          if (data.type) {
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

    $('form#update_service_fee').on('submit', function(e) {
      e.preventDefault();
      const id = $('#id').val();

      $.ajax({
        url: "/admin/maintenance/service_fees/"+id,
        method: "POST",
        context: document.body,
        data: new FormData(this),
        contentType: false,
        global: false,
        cache: false,
        processData: false,
        success: function (data){
          if(data.errors){
              (data.errors.service_fee) ? 
              display_errors(data.errors.service_fee[0],'#editModal #service_fee','#editModal #service_fee_error') : 
              eliminate_errors('#editModal #service_fee', '#editModal #service_fee_error');
          }
          else{
            $('#editModal').modal('hide');
            Swal.fire(
              data.title,
              data.message,
              data.type
            ).then(() => {
              const newVal = $('#editModal #service_fee').val();
              $(`tr#${id}`).find('td#service_fee').text(newVal);
            });
          }
        },
        error: function(data){
            alert('errror!!!');
            alert(data);
        }
      });
    });
  });

  function addRow(data) {
    // reload muna sa ngayun
    window.location.reload();

    // pero kung gusto mo na hindi na mag reload
    // lagay mo code dito...
    // console.log(data);
  }

  function show_edit_modal(service_fee){
    eliminate_errors('#editModal #service_fee','#editModal #service_fee_error');
    document.getElementById('update_service_fee').reset();
    $('#id').val(service_fee.id);
    const val = $(`tr#${service_fee.id}`).find('td#service_fee').text();
    $('#editModal #service_fee').val(val);

    $('#editModal').modal('show');
  }

  function deleteRow(id) {
      const table = $('#basic-datatable')[0];

      for (let i = 0; i < table.rows.length; i++) {
          if (table.rows[i].id == id) {
              table.rows[i].remove();
              break;
          }
      }
  }

  function delete_service_fee(id) {
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
          url: "/admin/maintenance/service_fees/"+id,
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

@endpush