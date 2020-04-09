@extends('layouts.tech-master')



@section('content')


<div class="content">

  <!-- Start Content-->
  <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
      <div class="col-12">
        <div class="page-title-box">
          <h4 class="page-title">Account Settings</h4>
        </div>
      </div>
    </div>
    <!-- end page title -->


    <div class="row">
      <div class="col-lg-4 col-xl-4">
        <div class="card-box text-center">
          <form method="post" id="upload-photo" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="photo-preview">
              <img src="{{ $user->profile_image === null ? 
              asset('assets/images/default.png') : 
              url('/uploads' . '/' . $user->profile_image) }}" id="photo-preview"
                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
            </div>
            <div class="upload">
              <label for="avatar">Update Photo</label>
              <input type="file" id="avatar" name="file" accept="image/png, image/jpeg">
            </div>
          </form>

          <h4 class="mb-0">
            {{ $user->tech_info->firstname . ' ' . $user->tech_info->lastname }}
          </h4>
          <p class="text-muted">Client</p>

          <div class="text-left mt-3">

            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong>
              <span id="fullname" class="ml-2">
                {{ $user->tech_info->firstname . ' ' . $user->tech_info->lastname }}
              </span>
            </p>

            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong>
              <span id="contact-number" class="ml-2">
                {{ $user->tech_info->contact_number }}
              </span>
            </p>

            <p class="text-muted mb-1 font-13"><strong>Address :</strong>
              <span id="address" class="ml-2">
                {{ $user->tech_info->address }}
              </span>
            </p>
          </div>


        </div> <!-- end card-box -->


      </div> <!-- end col-->

      <div class="col-lg-8 col-xl-8">
        <div class="card-box">
          <div class="tab-pane" id="settings">
            <form id="update-user">
              <input type="hidden" name="user_id" value="{{ $user->id }}">
              <input type="hidden" name="_method" value="PUT">
              <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Info
              </h5>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input required type="text" name="firstname" value="{{$user->tech_info->firstname}}"
                      class="form-control" id="firstname" placeholder="Enter first name">
                    <p class="text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input required type="text" name="lastname" value="{{$user->tech_info->lastname}}"
                      class="form-control" id="lastname" placeholder="Enter last name">
                    <p class="text-danger"></p>
                  </div>
                </div> <!-- end col -->
              </div> <!-- end row -->

              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input required type="text" name="address" value="{{$user->tech_info->address}}"
                      class="form-control" id="address" placeholder="Enter address"></textarea>
                    <p class="text-danger"></p>
                  </div>
                </div> <!-- end col -->
              </div> <!-- end row -->

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input required type="text" name="contact_number" value="{{$user->tech_info->contact_number}}"
                      class="form-control" id="contact" placeholder="Enter Contact Number">
                    <p class="text-danger"></p>
                  </div>
                </div> <!-- end col -->

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input required type="text" name="username" value="{{$user->username}}"
                      class="form-control" id="username" placeholder="Enter Username">
                    <p class="text-danger"></p>
                  </div>
                </div> <!-- end col -->
              </div> <!-- end row -->

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input required type="password" name="password" class="form-control" id="password"
                      placeholder="Enter Password">
                    <p class="text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="confirm-password">Confirm Password</label>
                    <input required type="password" name="password_confirmation" class="form-control"
                      id="confirm-password" placeholder="Enters password">
                    <p class="text-danger"></p>
                  </div>
                </div> <!-- end col -->
              </div> <!-- end row -->



              <div class="text-left">
                <button type="submit" class="btn btn-success"><i class="mdi mdi-content-save"></i> Save</button>
              </div>
            </form>
          </div>
          <!-- end settings content-->

        </div> <!-- end tab-content -->
      </div> <!-- end card-box-->

    </div> <!-- end col -->
  </div>
  <!-- end row-->
</div>
</main>

<script type="text/javascript">
  $(document).ready(function(){
    $('form#update-user').submit(function(evt){
      evt.preventDefault();
      updateUser($(this));
    });

    $('input#avatar').on('change', function(evt){
      $.ajax({
        url:"{{ url('tech/upload_photo') }}",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method:"POST",
        data: new FormData($('form#upload-photo')[0]),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function(res) {
          if (res.errors) {
            Swal.fire(
              'Error uploading files:',
              res.errors.file[0],
              'error'
            )
          } else {
            Swal.fire(
              res.title,
              res.message,
              res.type
            ).then(() => {
              $('.photo-preview').html(res.uploaded_image);
            });
          }
          
        },

        error: function(err) {
          console.log(err);
        }
      });
    });
  });

  function transformData(data) {
    return data.reduce((acc, item) => {
        acc[item.name] = item.value;
        return acc;
    }, {})
  }

  function renderNewData(user) {
    $("span#fullname").text(user.firstname + ' ' + user.lastname);
    $("span#email").text(user.email);
    $("span#address").text(user.address);
    $("span#contact-number").text(user.contact);
  }


  function updateUser(form) {
    $('.is-invalid').removeClass('is-invalid');
    $('p.text-danger').text('');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: ' {{ url("tech/update") }} ',
      type: 'PUT',
      data: form.serialize(),
      success: function(res) {
        if (res.errors) {
          for (const key in res.errors) {
            $(`[name=${key}]`).addClass('is-invalid');
            $(`[name=${key}]`).next().text(res.errors[key][0]);
          }
        } else {
          const userInfoObject = transformData(form.serializeArray());
          Swal.fire(
            res.title,
            res.message,
            res.type
          ).then(() => {
            renderNewData(userInfoObject);
          });
        }
      },

      error: function(err) {
        console.log(err);
      }
    })
  }
</script>




@endsection