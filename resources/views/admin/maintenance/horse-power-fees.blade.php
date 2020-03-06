@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row mt-5">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
          <li class="breadcrumb-item active">Horse Power Fees</li>
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
        <h4 class="header-title">Horse Power Fees</h4>
        <p class="text-muted font-13 mb-4"></p>

        <table id="basic-datatable" class="table dt-responsive">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>Appliance</th>
              <th>HP</th>
              <th>Fee</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($horse_power_fees as $hp)
              <tr id="{{ $hp->id }}">
                <td>{{ $hp->id }}</td>
                <td>{{ $hp->appliance->name }}</td>
                <td>{{ $hp->horse_power->hp }}</td>
                <td id="fee"> {{ number_format($hp->fee, 2) }} </td>
                <td>
                  <button type="button" 
                  onclick="show_edit_modal({{$hp}})"
                  class="btn btn-success btn-sm"><i class="la la-pencil"></i></button>

                  <button type="button" 
                  onclick="delete_hp_fee({{$hp->id}})"
                  class="btn btn-danger btn-sm"><i class="la la-trash"></i></button>
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
        <h4 class="header-title">Add Horse Power Fees</h4>
        <p class="text-muted">Horse Power fee per appliance type for new service requests</p>

        <form id="hp_fee_form">

          <div class="form-group">
            <label>Select Appliance Type<span class="text-danger">*</span></label>
            <select name="appliance_id" class="form-control">
              <option>-- Please select appliance type --</option>
              @foreach ($appliances as $appliance)
              <option value="{{ $appliance->id}}">
                {{ $appliance->name}}
              </option>
              @endforeach
            </select>
            <p class="text-danger mt-1"></p>
          </div>

          <div class="form-group">
            <label>Select Horse Power<span class="text-danger">*</span></label>
            <select name="hp_id" class="form-control">
              <option>-- Please select horse power --</option>
              @foreach ($horse_power as $hp)
              <option value="{{ $hp->id}}">
                {{ $hp->hp}}
              </option>
              @endforeach
            </select>
            <p class="text-danger mt-1"></p>
          </div>

          <div class="form-group">
            <label>Horse Power Addt'l Fee<span class="text-danger">*</span></label>
            <input name="fee" type="text" class="form-control">
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
          <h4 class="modal-title" id="myModalLabel">Edit Horse Power Fee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>


        <form id="update_hp_fee_form">
          @method('patch')
          <div class="modal-body">
            <input type="text" name="id" id="id" hidden>
            <div class="form-group">
              <label>Horse Power Addt'l Fee<span class="text-danger">*</span></label>
              <input id="fee" name="fee" type="text" class="form-control" required>
              <p class="text-danger mt-1" id="update_fee_error"></p>
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

    $('#hp_fee_form').on('submit', function(e) {
      var self = this;
      e.preventDefault();
      $('.is-invalid').removeClass('is-invalid');
      $('p.text-danger').text('');

      $.ajax({
        url: "/admin/maintenance/horse_power_fees",
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

    $('form#update_hp_fee_form').on('submit', function(e) {
      e.preventDefault();
      const id = $('#id').val();

      $.ajax({
        url: "/admin/maintenance/horse_power_fees/"+id,
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
              display_errors(data.errors.service_fee[0],'#editModal #fee','#editModal #update_fee_error') : 
              eliminate_errors('#editModal #fee', '#editModal #update_fee_error');
          }
          else{
            $('#editModal').modal('hide');
            Swal.fire(
              data.title,
              data.message,
              data.type
            ).then(() => {
              const newVal = $('#editModal #fee').val();
              $(`tr#${id}`).find('td#fee').text(newVal);
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
    window.location.reload();
  }

  function show_edit_modal(hp){
    eliminate_errors('#editModal #fee','#editModal #update_fee_error');
    document.getElementById('update_hp_fee_form').reset();
    $('#id').val(hp.id);
    const val = $(`tr#${hp.id}`).find('td#fee').text();
    $('#editModal #fee').val(val);

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

  function delete_hp_fee(id) {
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
          url: "/admin/maintenance/horse_power_fees/"+id,
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