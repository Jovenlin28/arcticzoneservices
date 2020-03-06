@extends('layouts.tech-master')


@section('content')

<div class="row mt-5">
  <div class="col-12">
    <div class="page-title-box">
      <h4 class="page-title">My Account</h4>
    </div>
  </div>
</div>




<div class="row">
  <div class="col-lg-4 col-xl-4">
    <div class="card-box text-center">
      <img src="{{ asset('assets/images/default.png')}}" class="rounded-circle avatar-lg img-thumbnail"
        alt="profile-image">

      <h4 class="mb-0">Ximon Bias</h4>
      <p class="text-muted">Technician</p>

      <div class="text-left mt-3">

        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Ximon Bias</span></p>

        <p class="text-muted mb-2 font-13"><strong>Contact Number :</strong><span class="ml-2">09357288473</span></p>

        <p class="text-muted mb-2 font-13"><strong>Email Address :</strong> <span
            class="ml-2 ">marciavalerio@gmail.com</span></p>

        <p class="text-muted mb-1 font-13"><strong>Address :</strong> <span class="ml-2">1720 Dahlia St. Purok 17 Brgy.
            Commonwealth Quezon City</span></p>

      </div>
    </div>
  </div>

  <div class="col-lg-8 col-xl-8">
    <div class="card-box">
      <div class="tab-pane" id="settings">
        <form>
          <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="userbio">Address</label>
                <input type="text" class="form-control" id="useremail" placeholder="Enter email"></textarea>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="useremail">Email Address</label>
                <input type="email" class="form-control" id="useremail" placeholder="Enter email">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Contact Number</label>
                <input type="text" class="form-control" id="userpassword" placeholder="Enter password">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="useremail">Password</label>
                <input type="password" class="form-control" id="useremail" placeholder="Enter email">
                <small>Must be at least 6 characters long.</small>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
              </div>
            </div>
          </div>


          <div class="text-left">
            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                class="mdi mdi-content-save"></i> Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


@endsection