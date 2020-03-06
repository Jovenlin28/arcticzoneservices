@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row mt-5">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
          <li class="breadcrumb-item active">Horse Power</li>
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
        <h4 class="header-title">Horse Power</h4>
        <p class="text-muted font-13 mb-4"></p>

        <table id="basic-datatable" class="table dt-responsive">
          <thead class="thead-light">
            <tr>
              <th>ID</th>
              <th>HP</th>
              <th>Date Created</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

            @foreach ($horse_power as $hp)
            <tr id="{{ $hp->id }}">
              <td> {{ $hp->id }} </td>
              <td id="hp"> {{ $hp->hp }} </td>
              <td> {{ date('F d, Y', strtotime($hp->created_at)) }}</td>
              <td>
                <button type="button" onclick="show_edit_modal({{ $hp }})" class="btn btn-success btn-sm">
                  <i class="la la-pencil"></i>
                </button>

                <button type="button" onclick="delete_hp({{ $hp->id }})" class="btn btn-danger btn-sm">
                  <i class="la la-trash"></i>
                </button>
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
        <h4 class="header-title">Add Horse Power</h4>
        <p class="text-muted">New horse power for new service requests</p>

        <form id="add_hp_form">

          <div class="form-group">
            <label>Horse Power<span class="text-danger">*</span></label>
            <input id="hp" name="hp" type="text" class="form-control">
            <p class="text-danger mt-1" id="add_hp_error"></p>
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
          <h4 class="modal-title" id="myModalLabel">Edit Horse Power</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>


        <form id="update_hp_form">
          @method('patch')
          <input type="text" name="id" id="id" hidden>
          <div class="modal-body">
            <div class="form-group">
              <label>Horse Power<span class="text-danger">*</span></label>
              <input id="update_hp" name="hp" type="text" class="form-control">
              <p class="text-danger" id="update_hp_error"></p>
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
    window.location.reload();
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

    function delete_hp(id) {
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
              url: "/admin/maintenance/horse_power/"+id,
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

      $('#add_hp_form').on('submit', function(e) {
            var self = this;
            e.preventDefault();

            $.ajax({
                url: "/admin/maintenance/horse_power",
                method: "POST",
                context: document.body,
                data: new FormData(this),
                contentType: false,
                global: false,
                cache: false,
                processData: false,
                success: function (data) {
                    // validation message
                    if (data.errors) {
                        if (data.errors.name) {
                            display_errors(data.errors.name,'#hp','#add_hp_error');
                        } else {
                            eliminate_errors('#hp', '#add_hp_error');
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

        $('#update_hp_form').on('submit', function(e) {
            e.preventDefault();
            const id = $('#id').val();

            $.ajax({
                url: "/admin/maintenance/horse_power/"+id,
                method: "POST",
                context: document.body,
                data: new FormData(this),
                contentType: false, // nakalimutan mo hehe
                global: false,
                cache: false,
                processData: false,
                success: function (data){
                    if(data.errors){
                        (data.errors.service_name) ? display_errors(data.errors.hp,'#update_hp','#update_hp_error') : 
                        eliminate_errors('#update_hp', '#update_hp_error');
                    }
                    else {
                      $('#editModal').modal('hide');
                      Swal.fire(
                        data.title,
                        data.message,
                        data.type
                      ).then(() => {
                        const newVal = $('#editModal #update_hp').val();
                        $(`tr#${id}`).find('td#hp').text(newVal);
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

    function show_edit_modal(hp){
        eliminate_errors('#update_hp','#update_hp_error');
        document.getElementById('update_hp_form').reset();

        $('#id').val(hp.id);
        $('#update_hp').val(hp.hp);

        $('#editModal').modal('show');
    }

</script>

@endpush