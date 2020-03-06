<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Arctic Zone | Technician</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/datatables/buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/datatables/select.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
    type="text/css" />
  <link href="{{ asset('assets/libs/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

  <script src="{{asset('home/js/jquery.3.4.1.js')}}"></script>

</head>

<body class="left-side-menu-light">


  <div id="wrapper">
    <div class="navbar-custom">
      <ul class="list-unstyled topnav-menu float-right mb-0">
        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle  waves-effect" href="/tech/service-history" role="button">
            <i class="fe-layers noti-icon"></i>
          </a>
        </li>


        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <img src="{{ asset('assets/images/default.png')}}" alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
              {{ Auth::guard('technician')->user()->username }} <i class="mdi mdi-chevron-down"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">


            <a href="/tech/account-settings" class="dropdown-item notify-item">
              <i class="fe-user"></i>
              <span>My Account</span>
            </a>


            <a href="{{ action('UsersController@tech_logout') }}" class="dropdown-item notify-item">
              <i class="fe-log-out"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>


      <div class="logo-box" style="background-color: white;">
        <a href="/tech/home" class="logo text-center">
          <span class="logo-lg">
            <img src="{{ asset('assets/images/arctic-zone-logo.png')}}" alt="" height="53" width="150">
          </span>
        </a>
      </div>
    </div>


    <div class="content">
      <div class="container">

        @yield('content')

      </div>
    </div>





    <!-- Scripts -->
    <script src="{{ asset('assets/js/vendor.min.js')}}"></script>
    <script src="{{ asset ('assets/libs/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>
    <script src="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/form-pickers.init.js')}}"></script>
    <script src="{{ asset('assets/js/pages/dashboard-2.init.js')}}"></script>
    <script src="{{ asset('assets/js/app.min.js')}}"></script>
</body>
</html>