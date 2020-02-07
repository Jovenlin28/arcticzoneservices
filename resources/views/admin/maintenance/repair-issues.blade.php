@extends('layouts.admin-master')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Maintenance</a></li>
                    <li class="breadcrumb-item active">Repair Issues</li>
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
                <h4 class="header-title">Repair Issues</h4>
                <p class="text-muted font-13 mb-4"></p>

                <table id="basic-datatable" class="table dt-responsive">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Issue Desc</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($repair_issues as $issue)
                        <tr id="{{$issue->id}}">
                            <td>{{$issue->id}}</td>
                            <td>{{$issue->name}}</td>
                            <td>{{$issue->created_at}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm"
                                    onclick="show_edit_modal({{$issue->id}})"><i class="la la-pencil"></i></button>

                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="delete_issues({{$issue->id}})"><i class="la la-trash"></i></button>
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
                <h4 class="header-title">Add Service Type</h4>
                <p class="text-muted">Service type for new service requests</p>

                <form id="addissue_form">
                    @csrf
                    <div class="form-group">
                        <label>Repair Issue Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="3" id="name" name="name" placeholder="Enter Description" required></textarea>
                        <p class="text-danger mt-1" id="issue_name_error"></p>
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
                    <h4 class="modal-title" id="myModalLabel">Edit Repair Issue Description</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>

                @csrf
                <form id="issue_form">
                    @method('patch')

                    <div class="modal-body">
                        <input type="text" name="id" id="id" hidden>
                        <div class="form-group">
                            <label>Repair Issue Description</label>
                            <textarea class="form-control" rows="3" name="issue_name" id="issue_name"></textarea>
                            <p class="text-danger" id="issue_name_error"></p>
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
                // children[1] = 'ISSUE DESCRIPTION' column
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

    function delete_issues(id) {
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
                    url: "/admin/maintenance/repair_issues/"+id,
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
        $('#issue_form').on('submit', function(e) {
            e.preventDefault();
            var id = $('#id').val();

            $.ajax({
                url: "/admin/maintenance/repair_issues/"+id,
                method: "POST",
                context: document.body,
                data: new FormData(this),
                contentType: false, // nakalimutan mo hehe
                global: false,
                cache: false,
                processData: false,
                success: function (data){
                    if(data.errors){
                        (data.errors.issue_name) ? display_errors(data.errors.issue_name,'#issue_name','#issue_name_error') : eliminate_errors('#issue_name', '#issue_name_error');
                    }
                    else{
                        $('#editModal').modal('hide');
                        Swal.fire(
                        data.title,
                        data.message,
                        data.type
                        ) // sweetalert rep.

                        // change value nung row..?
                        updateRow(id, $('#issue_name').val())
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
        eliminate_errors('#issue_name','#issue_name_error');
        document.getElementById('issue_form').reset();

        $.ajax({
            url: "/admin/maintenance/repair_issues/"+id,
            method: "GET",
            context: document.body,
            global: false,
            cache: false,
            processData: false,
            success: function (data){
                $('#id').val(data[0].id);
                $('#issue_name').val(data[0].name);
            },
            error: function(data){

            }
        });

        $('#editModal').modal('show');
    }

    $(document).ready(function(){
        $('#addissue_form').on('submit', function(e) {
            var self = this;
            e.preventDefault();

            $.ajax({
                url: "/admin/maintenance/repair_issues",
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
                            display_errors(data.errors.name,'#name','#issue_name_error');
                        } else {
                            eliminate_errors('#name', '#issue_name_error');
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
