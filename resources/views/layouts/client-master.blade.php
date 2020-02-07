<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <title>Arctic Zone | Client</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
            <meta content="Coderthemes" name="author" />
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!-- App favicon -->
            <link rel="shortcut icon" href="assets/images/favicon.ico">

         
            <link href="{{ asset('assets/libs/datatables/dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/libs/datatables/responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/libs/daterangepicker/daterangepicker.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('home/css/style.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
            <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

            <script src="{{asset('home/js/jquery.3.4.1.js')}}"></script>

        </head>

        <body class="left-side-menu-light">

         
            <div id="wrapper">
                <div class="navbar-custom">
                    <ul class="list-unstyled topnav-menu float-right mb-0">

                        <li class="dropdown notification-list">
                            <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('assets/images/default.png')}}" alt="user-image" class="rounded-circle">
                                <span class="pro-user-name ml-1">
                                    {{ Auth::user()->client->firstname . ' ' . Auth::user()->client->lastname }} 
                                    <i class="mdi mdi-chevron-down"></i> 
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                <a href="logout" class="dropdown-item notify-item">
                                    <i class="fe-log-out"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>

            
                <div class="logo-box">
                    <a href="index.html" class="logo text-center">
                        <span class="logo-lg">
                            <img src="{{ asset('assets/images/arctic-zone-logo-home.png')}}" alt="" height="53" width="150">
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
                    </ul>
                </div>
           

                <!-- ========== Left Sidebar Start ========== -->
                <div class="left-side-menu">
                    <div class="slimscroll-menu">
                        <div id="sidebar-menu">
                            <ul class="metismenu" id="side-menu">
                                <li class="menu-title">Navigation</li>

                                <li>
                                    <a href="/client/home">
                                        <i class="la la-dashboard"></i>
                                        <span> My Requests </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="/client/account_settings">
                                        <i class="fe-settings noti-icon"></i>
                                        <span> Account Settings </span>
                                    </a>
                                </li>
                            </ul>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            


                @yield('content')



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


        <!-- Scripts -->
        <script src="{{ asset('assets/js/vendor.min.js')}}"></script>
        <script src="{{ asset('assets/libs/jquery-knob/jquery.knob.min.js')}}"></script>
        <script src="{{ asset('assets/libs/peity/jquery.peity.min.js')}}"></script>
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.bootstrap4.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('assets/libs/datatables/responsive.bootstrap4.min.js')}}"></script>
        <script src="{{ asset('assets/libs/moment/moment.min.js')}}"></script>
        <script src="{{ asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
        <script src="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{ asset('assets/libs/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{ asset('assets/js/pages/form-pickers.init.js')}}"></script>
        <script src="{{ asset('assets/js/pages/dashboard-2.init.js')}}"></script>
        <script src="{{ asset('assets/js/app.min.js')}}"></script>
</html>