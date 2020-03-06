@extends('layouts.admin-master')


@section('content')


<div class="row">
  <div class="col-12">
    <div class="page-title-box">
      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Administration</a></li>
          <li class="breadcrumb-item active">Technician Management</li>
        </ol>
      </div>
      <h4 class="page-title">Manage Technician</h4>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">

        <div class="row">
          <div class="col-md-6">
            <h4 class="header-title">Technician</h4>
            <p class="text-muted font-13 mb-2">List of all technicians.</p>
          </div>

          <div class="col-md-6">
            <button class="btn btn-md btn-secondary float-right" data-toggle="modal" data-target="#Addtechnician"><i
                class="fe-plus"></i> Add Technician</button>
          </div>
        </div>

        <table id="basic-datatable" class="table dt-responsive">
          <thead class="thead-light">
            <tr>
              <th>Tech ID</th>
              <th>Name</th>
              <th>Username</th>
              <th>Contact Number</th>
              <th>Availability Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($technicians as $tech)
              <tr id="{{$tech['id']}}">
                <td>TECH{{ $tech['id'] }}</td>
                <td>{{ $tech['tech_info']['firstname'] . ' ' . $tech['tech_info']['lastname'] }}</td>
                <td>{{ $tech['username'] }}</td>
                <td>{{ $tech['tech_info']['contact_number'] }}</td>
                <td id="availability-status">
                  <span class="badge badge-{{ $tech['availability_status'] ? 'warning' : 'success'}} status">
                    {{ $tech['availability_status'] ? 'Unassigned' : 'Assigned'}}
                  </span>
                </td>
                <td>
                  <button class="btn btn-sm btn-info availability-status" 
                    data-availability-status="{{ $tech['availability_status'] }}"
                    data-toggle="modal" 
                    data-target="#changeStatus"><i
                    class="fe-edit"></i></button>
                  <button class="btn btn-sm btn-warning" 
                    data-target="#infoTechnician" 
                    data-toggle="modal"><i
                    class="fe-eye"></i></button>

                </td>
              </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Modal Content -->
<div id="Addtechnician" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="add-technician" role="form">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Add Technician</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
          <p class="text-muted">PERSONAL DETAILS</p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" 
                  name="firstname" 
                  class="form-control" 
                  id="firstname" 
                  placeholder="Enter first name">
                  <p class="text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" 
                  name="lastname" 
                  class="form-control" 
                  id="lastname" 
                  placeholder="Enter last name">
                  <p class="text-danger"></p>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" 
              name="contact_number"
              class="form-control" 
              id="contact_number" 
              placeholder="Enter contact number">
              <p class="text-danger"></p>
          </div>
          <div class="form-group">
            <label for="address">Home Address</label>
            <textarea name="address" 
              id="address" 
              class="form-control" 
              rows="2"></textarea>
              <p class="text-danger"></p>
          </div>
          <div class="form-group">
            <label>Technician Image</label><br>
            <input type="file" id="">
          </div>
          <p class="text-muted mt-4">ACCOUNT DETAILS</p>
          <div class="form-group">
            <label>Username</label>
            <input type="text" 
              name="username"
              class="form-control" 
              id="" 
              placeholder="Enter your username">
              <p class="text-danger"></p>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" 
              name="password"
              class="form-control" 
              id="password" 
              placeholder="Enter your password">
              <p class="text-danger"></p>
          </div>
          <div class="form-group">
            <label for="confirm-password">Re-enter Password</label>
            <input type="password" 
              name="password_confirmation"
              class="form-control" 
              id="confirm-password">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fe-save"></i> Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- End of Modal Content -->

<!-- Modal Content -->
<div id="changeStatus" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Change Availability Status
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">

        <p>Current Status of Technician: 
          <b>
            <span id="current-availability-status"></span>
          </b></p>

        <form>
          <div class="">
            <label>
              <input type="radio" 
                name="availability_status" 
                id="available" 
                value="1" checked>
              Available
            </label>
          </div>
          <div class="">
            <label>
              <input type="radio" 
                name="availability_status" 
                id="unavailable" 
                value="0">
              Not Available
            </label>
          </div>
        </form>


      </div>
      <div class="modal-footer">
        <button id="change-availability-status" type="button" class="btn btn-primary waves-effect waves-light">
          <i class="fe-save"></i> Save</button>
      </div>
    </div>
  </div>
</div>

<!-- End of Modal Content -->

<!-- Modal Content -->
<div id="infoTechnician" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Technician Information
        </h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">

        <div class="row">
          <div class="col-md-6">
            <div class="text-center">
              <img src="{{ asset('assets/images/users/user-7.jpg')}}">
              <br>
              <small class="text-muted">Technician</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="">
              <p class="m-0"><b>Technician ID:</b> <br> 0091 </p>
              <p class="m-0"><b>Technician Name:</b> <br> Jose Riza</p>
              <p class="m-0"><b>Home Address:</b> <br> 1720 Dahlia St. Purok 17 Brgy Commonwealth Quezon City</p>
              <p class="m-0"><b>Contact Number:</b> <br> 09192640851</p>
              <p class="m-0"><b>Email Address:</b> joserizal@gmail.com</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fe-save"></i> Save</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function() {

  let currentTechId;

  $(document).on('click', 'button#change-availability-status', function(){
    const availability_status = $('input[name="availability_status"]:checked').val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: ' {{ url("admin/technician_management/update_availability_status") }} ',
      type: 'PUT',
      data: { availability_status, tech_id: currentTechId },
      success: function(res) {
        Swal.fire(
          res.title,
          res.message,
          res.type
        ).then(() => {
          $('div#changeStatus').modal('hide');
          const $techCol = $(`tr#${currentTechId}`).find('td#availability-status');
          const $button = $(`tr#${currentTechId}`).find('button.availability-status');
          $button.attr('data-availability-status', availability_status);
          if (availability_status == 1) {
            $techCol.html(
              `
              <span class="badge badge-warning">Unassigned</span>
              `
            )
          } else {
            $techCol.html(
              `
              <span class="badge badge-success">Assigned</span>
              `
            )
          }
        });
      },

      error: function(err) {
        console.log(err);
      }
    })
  });

  $(document).on('submit', 'form#add-technician', function(evt) {
    evt.preventDefault();
    addTechnician($(this).serialize());
  });

  $('button.availability-status').on('click', function(){
    currentTechId = $(this).parents('tr').attr('id');
    const status = $(this).attr('data-availability-status');
    let currentStatus;
    if (status == 1) {
      $('input#available').prop('checked', true);
      currentStatus = 'Available';
    } else {
      $('input#unavailable').prop('checked', true);
      currentStatus = 'Not Available'
    }
    $('span#current-availability-status').text(currentStatus);
  });

  function addTechnician(data) {
    $('.is-invalid').removeClass('is-invalid');
    $('p.text-danger').text('');
    $.ajax({
        url: ' {{ url("admin/tech_management/add_technician") }} ',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: data,
        success: function(res) {
          if (res.errors) {
            for (const key in res.errors) {
              $(`[name=${key}]`).addClass('is-invalid');
              $(`[name=${key}]`).next().text(res.errors[key][0]);
            }
          } else {
            $('#Addtechnician').modal('hide');
            Swal.fire(
              res.title,
              res.message,
              res.type
            )
          }
        },

        error: function(err) {
            console.log(err, 'error');
        }
    });
  }
});
</script>

<!-- End of Modal Content -->


@endsection