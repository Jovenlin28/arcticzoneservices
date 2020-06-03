<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Arctic Zone Thermo Solutions Inc. </title>

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">


  <!--  Bootstrap css file  -->
  <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css')}}">

  <!--  font awesome icons  -->
  <link rel="stylesheet" href="{{ asset('home/css/all.min.css')}}">

  <!-- Sweet Alert-->
	<link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

  <!--  Magnific Popup css file  -->
  <link rel="stylesheet" href="{{ asset('home/vendor/Magnific-Popup/dist/magnific-popup.css')}}">


  <!--  Owl-carousel css file  -->
  <link rel="stylesheet" href="{{ asset('home/vendor/owl-carousel/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{ asset('home/vendor/owl-carousel/css/owl.theme.default.min.css')}}">

  <link rel="stylesheet" href="{{ asset('home/css/jquery-ui.css')}}">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <link href="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css')}}" rel="stylesheet"
        type="text/css" />

  <link href="{{ asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

  <!--  custom css file  -->
  <link rel="stylesheet" href="{{ asset('home/css/style.css')}}">

  <!--  custom css file  -->
  <link rel="stylesheet" href="{{ asset('multiform/css/style.css')}}">

  <!--  Responsive css file  -->
  <link rel="stylesheet" href="{{ asset('home/css/responsive.css')}}">

  <script src="{{asset('home/js/jquery.3.4.1.js')}}"></script>
  <script src="{{asset('home/js/jquery-ui.js')}}"></script>

</head>

<body>



  @yield('content')




  <footer class="footer">
    <div class="container">

      <div class="row">
        <div class="col-md-6" class="first-half">
          <img src="{{ asset('home/img/arctic-zone-logo-white.png')}}" alt="logo" height="55" width="155">
          <p>Arctic Zone Thermo Solutions Inc. is a growing company that serves aircondition appliances. We provide a
            sophisticated platform which enables users to easily book a professional technician at any time and from
            anywhere.</p>
        </div>

        <div class="col-md-6">
          <div class="row">
            <div class="col-md-4"><b>Company</b><br><br>
              <a href="">About Us</a><br>
              <a href="">Services</a><br>
              <a href="">Pricing</a>
            </div>
            <div class="col-md-4"><b>Get Help</b><br><br>
              <a href="">Contact Us</a><br>
              <a href="">FAQ</a>

            </div>
            <div class="col-md-4"><b>Sign In As</b><br><br>
              <a href="/tech/auth/login">Technician</a>
              <a href="/admin/auth/login">Administration</a>
            </div>
          </div>
        </div>


        <p class="float-left mt-5">© 2020 Arctic Zone Thermo Solutions Inc. - All Rights Reserved &nbsp;&nbsp;&nbsp;<a
            href="">Privacy</a> | <a href="">Terms</a>
        </p>

      </div>


    </div>



  </footer>



  </main>

  <!--  Jquery js file  -->
  <script type="text/javascript" src="{{ asset('multiform/js/app.js')}}"></script>

  <!-- Sweet Alerts js -->
	<script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

	<!-- Sweet alert init js-->
  <script src="{{ asset ('assets/js/pages/sweet-alerts.init.js') }}"></script>
  
  <!--  Bootstrap js file  --->
  <script src="{{ asset('home/js/bootstrap.min.js')}}"></script>

  <!--  isotope js library  -->
  <script src="{{ asset('home/vendor/isotope/isotope.min.js')}}"></script>

  <!--  Magnific popup script file  -->
  <script src="{{ asset('home/vendor/Magnific-Popup/dist/jquery.magnific-popup.min.js')}}"></script>

  <script src="{{ asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

  <!--  Owl-carousel js file  -->
  <script src="{{ asset('home/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

  <!--  custom js file  -->
  <script src="{{ asset('home/js/main.js')}}"></script>



  @stack('scripts')



</body>

</html>