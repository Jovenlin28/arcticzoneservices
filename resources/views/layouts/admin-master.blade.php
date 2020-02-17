<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Arctic Zone Thermo Solutions Inc. - Administration Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
  <meta content="Coderthemes" name="author" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- App favicon -->
  <link rel="shortcut icon" href="assets/images/favicon.ico">

  <!-- Sweet Alert-->
  <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

  <!-- Plugin css -->
  <link href="{{ asset('assets/libs/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />

  <!-- third party css -->
  <link href="{{ asset ('/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('/assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet"
    type="text/css" />
  <link href="{{ asset ('/assets/libs/clockpicker/bootstrap-clockpicker.min.css') }}" rel="stylesheet"
    type="text/css" />
  <link href="{{ asset ('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet"
    type="text/css" />
  <link href="{{ asset ('/assets/libs/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('/assets/libs/jquery-vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet"
    type="text/css" />
  <link href="{{ asset ('/assets/libs/custombox/custombox.min.css') }}" rel="stylesheet">
  <!-- third party css end -->

  <!-- App css -->
  <link href="{{ asset ('/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset ('/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('home/css/style.css')}}" rel="stylesheet" type="text/css" />

  <script src="{{asset('home/js/jquery.3.4.1.js')}}"></script>

</head>

<body>
  <!-- Begin page -->
  <div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
      <ul class="list-unstyled topnav-menu float-right mb-0">


        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle  waves-effect" href="/admin/calendar" role="button">
            <i class="fe-calendar noti-icon"></i>
          </a>
        </li>


        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle  waves-effect" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="fe-bell noti-icon"></i>
            <span class="badge badge-danger rounded-circle noti-icon-badge">5</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-lg">

            <!-- item-->
            <div class="dropdown-item noti-title">
              <h5 class="m-0 text-white">
                <span class="float-right">
                  <a href="" class="text-light">
                    <small>Clear All</small>
                  </a>
                </span>Notification
              </h5>
            </div>


            <div class="slimscroll noti-scroll">

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item active">
                <div class="notify-icon">
                  <img src="{{ asset ('/images/users/user-1.jpg') }}" class="img-fluid rounded-circle" alt="" /> </div>
                <p class="notify-details">Cristina Pride</p>
                <p class="text-muted mb-0 user-msg">
                  <small>Hi, How are you? What about our next meeting</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary">
                  <i class="mdi mdi-comment-account-outline"></i>
                </div>
                <p class="notify-details">Caleb Flakelar commented on Admin
                  <small class="text-muted">1 min ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon">
                  <img src="assets/images/users/user-4.jpg" class="img-fluid rounded-circle" alt="" />
                </div>
                <p class="notify-details">Karen Robinson</p>
                <p class="text-muted mb-0 user-msg">
                  <small>Wow ! this admin looks good and awesome design</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-warning">
                  <i class="mdi mdi-account-plus"></i>
                </div>
                <p class="notify-details">New user registered.
                  <small class="text-muted">5 hours ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-info">
                  <i class="mdi mdi-comment-account-outline"></i>
                </div>
                <p class="notify-details">Caleb Flakelar commented on Admin
                  <small class="text-muted">4 days ago</small>
                </p>
              </a>

              <!-- item-->
              <a href="javascript:void(0);" class="dropdown-item notify-item">
                <div class="notify-icon bg-secondary">
                  <i class="mdi mdi-heart"></i>
                </div>
                <p class="notify-details">Carlos Crouch liked
                  <b>Admin</b>
                  <small class="text-muted">13 days ago</small>
                </p>
              </a>
            </div>

            <!-- All-->
            <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
              View all
              <i class="fi-arrow-right"></i>
            </a>



            <!-- item-->
            <div class="dropdown-item noti-title">
              <h5 class="m-0 text-white">
                <span class="float-right">
                  <a href="" class="text-light">
                    <small>Clear All</small>
                  </a>
                </span>
              </h5>
            </div>

          </div>
        </li>





        <li class="dropdown notification-list">
          <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <img src="{{ asset ('assets/images/default.png') }}" alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
              {{ Auth::guard('admin')->user()->username }}
              <i class="mdi mdi-chevron-down"></i>
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right profile-dropdown ">


            <!-- item-->
            <a href="/admin/profile/my_account" class="dropdown-item notify-item">
              <i class="fe-user"></i>
              <span>My Account</span>
            </a>

            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="{{ action('UsersController@admin_logout') }}" class="dropdown-item notify-item">
              <i class="fe-log-out"></i>
              <span>Logout</span>
            </a>

          </div>
        </li>

      </ul>

      <!-- LOGO -->
      <div class="logo-box">
        <a href="index.html" class="logo text-center">
          <span class="logo-lg">
            <img src="{{ asset('assets/images/arctic-zone-logo-home.png')}}" height="70" width="170">
            <!-- <span class="logo-lg-text-light">Xeria</span> -->
          </span>
          <span class="logo-sm">
            <!-- <span class="logo-sm-text-dark">X</span> -->
            <img src="assets/images/logo-sm.png" alt="" height="18">
          </span>
        </a>
      </div>

      <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
          <button class="button-menu-mobile waves-effect">
            <span></span>
            <span></span>
            <span></span>
          </button>
        </li>

        <li class="dropdown d-none d-lg-block">
          <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            Reports
            <i class="mdi mdi-chevron-down"></i>
          </a>
          <div class="dropdown-menu">
            <!-- item-->
            <a href="/admin/generate_reports" class="dropdown-item">
              Generate Reports
            </a>
          </div>
        </li>

        <li class="dropdown d-none d-lg-block">
          <a class="nav-link dropdown-toggle waves-effect" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            Maintenance
            <i class="mdi mdi-chevron-down"></i>
          </a>
          <div class="dropdown-menu">
            <!-- item-->
            <a href="/admin/maintenance/service_types" class="dropdown-item">
              Service Type
            </a>

            <!-- item-->
            <a href="/admin/maintenance/property_types" class="dropdown-item">
              Property Type
            </a>

            <!-- item-->
            <a href="/admin/maintenance/appliance_type" class="dropdown-item">
              Appliance Type
            </a>

            <!-- item-->
            <a href="/admin/maintenance/location" class="dropdown-item">
              Location
            </a>

            <!-- item-->
            <a href="/admin/maintenance/service_fees" class="dropdown-item">
              Service Fees
            </a>

            <!-- item-->
            <a href="/admin/maintenance/mode_of_payment" class="dropdown-item">
              Mode of Payment
            </a>

            <!-- item-->
            <a href="/admin/maintenance/aircondition_brand" class="dropdown-item">
              Aircondition Brand
            </a>

            <!-- item-->
            <a href="/admin/maintenance/aircondition_unit_type" class="dropdown-item">
              Aircondition Unit Type
            </a>

            <!-- item-->
            <a href="/admin/maintenance/repair_issues" class="dropdown-item">
              Repair Issues
            </a>


            <!-- item-->
            <a href="/admin/maintenance/service_timeslots" class="dropdown-item">
              Service Timeslots
            </a>

            <!-- item-->
            <a href="/admin/maintenance/bank_account_details" class="dropdown-item">
              Bank Account Details
            </a>

          </div>
        </li>
      </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

      <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

          <ul class="metismenu" id="side-menu">

            <li class="menu-title">Navigation</li>

            <li>
              <a href="/admin/dashboard">
                <i class="la la-dashboard"></i>

                <span> Dashboard </span>
              </a>

            </li>

            <li>
              <a href="javascript: void(0);">
                <i class="la la-archive"></i>
                <span> Services </span>
                <span class="menu-arrow"></span>
              </a>
              <ul class="nav-second-level" aria-expanded="false">
                <li>
                  <a href="/admin/services">Service Requests</a>
                </li>
                <li>
                  <a href="/admin/services/service_history">Service History</a>
                </li>
              </ul>
            </li>


            <li>
              <a href="/admin/technician_management">
                <i class="la la-male"></i>
                <span> Technician </span>

              </a>

            </li>

            <li>
              <a href="/admin/back_up_and_restore">
                <i class="la la-chain"></i>
                <span> Back Up and Restore </span>

              </a>

            </li>

          </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

      </div>
      <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <div class="content-page">
      <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
          @yield('content')
        </div>
      </div>
    </div>

    <!-- Footer Start -->
    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            2019 &copy; Arctic Zone Thermo Solutions Inc.
          </div>

        </div>
      </div>
    </footer>
    <!-- end Footer -->

  </div>

  <!-- ============================================================== -->
  <!-- End Page content -->
  <!-- ============================================================== -->


  </div>
  <!-- END wrapper -->

  <!-- Vendor js -->
  <script src="{{ asset ('assets/js/vendor.min.js') }}"></script>

  <!-- Third Party js-->
  {{-- <script src="{{ asset ('assets/libs/jquery-knob/jquery.knob.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/peity/jquery.peity.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}

  <script src="{{ asset ('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/buttons.html5.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/buttons.flash.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/buttons.print.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/datatables/dataTables.select.min.js') }}"></script>

  {{-- <script src="{{ asset ('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/pdfmake/vfs_fonts.js') }}"></script> --}}

  <script src="{{ asset ('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset ('assets/libs/daterangepicker/daterangepicker.js') }}"></script>
  <!-- third party js ends -->


  <!-- plugin js -->
  <script src="{{ asset('assets/libs/moment/moment.min.js')}}"></script>
  <script src="{{ asset('assets/libs/jquery-ui/jquery-ui.min.js')}}"></script>
  <script src="{{ asset('assets/libs/fullcalendar/fullcalendar.min.js')}}"></script>

  <!-- Calendar init -->
  <script src="{{ asset('assets/js/pages/calendar.init.js')}}"></script>
  <!-- Plugin js-->
  <script src="{{ asset('assets/libs/parsleyjs/parsley.min.js') }}"></script>

  <!-- Validation init js-->

  <!-- Sweet Alerts js -->
  <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

  <!-- Sweet alert init js-->
  <script src="{{ asset ('assets/js/pages/sweet-alerts.init.js') }}"></script>

  <!-- Datatables init -->
  {{-- <script src="{{ asset ('assets/js/pages/form-pickers.init.js') }}"></script> --}}
  <script src="{{ asset ('assets/js/pages/datatables.init.js') }}"></script>
  {{-- <script src="{{ asset ('assets/js/pages/dashboard-2.init.js') }}"></script> --}}
  <script src="{{ asset ('assets/libs/custombox/custombox.min.js') }}"></script>

  <!-- App js -->
  <script src="{{ asset ('assets/js/app.min.js') }}"></script>

  <script src="{{ asset ('assets/js/my.js')}}"></script>

  <script type="text/javascript">
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
  </script>

  @stack('scripts')
</body>

</html>