@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
                    <li class="breadcrumb-item active">Bank Account Details</li>
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
                <h4 class="header-title">Bank Account Details</h4>
                <p class="text-muted font-13 mb-4"></p>

                <table id="basic-datatable" class="table dt-responsive">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Account Name</th>
                            <th>Account Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($bank_details as $bank)
                        <tr id="{{$bank->id}}">
                            <td>{{$bank->id}}</td>
                            <td>{{$bank->name}}</td>
                            <td>{{$bank->number}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm"
                                    onclick="show_edit_modal({{$bank->id}})"><i class="la la-pencil"></i></button>

                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="delete_bank({{$bank->id}})"><i class="la la-trash"></i></button>
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
                <h4 class="header-title">Add Aircondition Unit Type</h4>
                <p class="text-muted">New aircondition unit type for new service requests</p>

                <form id="addbank_form">
                    @csrf
                    <div class="form-group">
                        <label>Account Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" placeholder="Enter account name" class="form-control" required>
                        <p class="text-danger mt-1" id="account_name_error"></p>
                    </div>
                    <div class="form-group">
                        <label>Account Number<span class="text-danger">*</span></label>
                        <input type="text" name="number" id="number" placeholder="Enter account number" class="form-control" required>
                        <p class="text-danger mt-1" id="account_number_error"></p>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>

    <!--Edit Modal Content-->
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Bank Account Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                @csrf
                <form id="bank_form">
                    @method('patch')

                    <div class="modal-body">
                        <input type="text" name="id" id="id" hidden>
                        <div class="form-group">
                            <label>Account Name</label>
                            <input type="text" class="form-control" name="account_name" id="account_name">
                            <p class="text-danger" id="account_name_error"></p>
                        </div>
                        <div class="form-group">
                            <label>Account Number</label>
                            <input type="text" class="form-control" name="account_number" id="account_number">
                            <p class="text-danger" id="account_number_error"></p>
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
                // children[1] = 'SERVICE NAME' column
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

    function delete_bank(id) {
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
                    url: "/admin/maintenance/bank_account_details/"+id,
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
        $('#bank_form').on('submit', function(e) {
            e.preventDefault();
            var id = $('#id').val();

            $.ajax({
                url: "/admin/maintenance/bank_account_details/"+id,
                method: "POST",
                context: document.body,
                data: new FormData(this),
                contentType: false, // nakalimutan mo hehe
                global: false,
                cache: false,
                processData: false,
                success: function (data){
                    if(data.errors){
                        (data.errors.account_name.account_number) ? display_errors(data.errors.account_name.account_number,'#account_name', '#account_number', '#account_name_error', '#account_number_error') : 
                        eliminate_errors('#account_name', '#account_number', '#account_name_error', '#account_number_error');
                    }
                    else{
                        $('#editModal').modal('hide');
                        Swal.fire(
                        data.title,
                        data.message,
                        data.type
                        ) // sweetalert rep.

                        // change value nung row..?
                        updateRow(id, $('#account_name', '#account_number').val())
                    }
                },
                error: function(data){
                    alert('errror!!!');
                    alert(data);
                }
            });
        });
    });

    function show_edit_modal(id){
        eliminate_errors('#account_name', '#account_number','#account_name_error', '#account_number_error');
        document.getElementById('bank_form').reset();

        $.ajax({
            url: "/admin/maintenance/bank_account_details/"+id,
            method: "GET",
            context: document.body,
            global: false,
            cache: false,
            processData: false,
            success: function (data){
                $('#id').val(data[0].id);
                $('#account_name').val(data[0].name);
                $('#account_number').val(data[0].number);
            },
            error: function(data){

            }
        });

        $('#editModal').modal('show');
    }

    $(document).ready(function(){
        $('#addbank_form').on('submit', function(e) {
            var self = this;
            e.preventDefault();

            $.ajax({
                url: "/admin/maintenance/bank_account_details",
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
                        if (data.errors.name.number) {
                            display_errors(data.errors.name.number,'#name', '#number','#account_name_error', '#account_number_error');
                           
                        } 
                        else {
                            eliminate_errors('#name', '#number', '#account_name_error', '#account_number_error');
                           
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
