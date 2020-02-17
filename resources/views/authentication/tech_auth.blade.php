<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Arctic Zone | Technician</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />


  <link href="{{ asset ('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">


  <!-- Pre-loader -->
  <div id="preloader">
    <div id="status">
      <div class="spinner">Loading...</div>
    </div>
  </div>
  <!-- End Preloader-->

  <div class="account-pages mt-5 mb-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
          <div class="card"
            style="box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.1), 0 1px 1px 0 rgba(0, 0, 0, 0); border-radius: 1px;">

            <div class="card-body p-4">

              <div class="text-center w-75 m-auto">

                <a href="index.html">
                  <span><img src="{{ asset ('assets/images/arctic-zone-logo.png') }}" width="160" height="55"></span>
                </a>

                <p class="text-muted mb-2 mt-2">Enter your username and password to access your account.</p>

              </div>

              <h5 class="auth-title">TECHNICIAN - Sign In</h5>


              <form method="POST" action="{{action('UsersController@tech_login_verify')}}">
                {{ csrf_field() }}
                <div class="form-group mb-3">
                  <label for="username">Username</label>
                  <input class="form-control" 
                    name="username"
                    type="text" 
                    id="username" 
                    required="" 
                    placeholder="Enter your username">
                </div>

                <div class="form-group mb-3">
                  <label for="password">Password</label>
                  <input class="form-control" 
                    name="password"
                    type="password" 
                    required 
                    id="password"
                    placeholder="Enter your password">
                </div>

                <div class="form-group mb-0 text-center">
                  <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                </div>
              </form>

              <div class="row mt-3">
                <div class="col-12 text-center">
                  <p><a href="/tech/forgot_password" class="text-muted ml-1">Forgot your password?</a></p>
                </div>
              </div>

              <div class="row mt-3">
                @include('shared.validation-errors')
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <footer class="footer footer-alt">
      <a href="/">Arctic Zone Thermo Solutions Inc.</a> | Technician Account
    </footer>


    <script src="{{ asset ('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset ('assets/js/app.min.js') }}"></script>

</body>

</html>