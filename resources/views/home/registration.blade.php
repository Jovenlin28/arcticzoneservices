@extends('layouts.home-master')

@section('content')


<!--  ======================= Start Header Area ============================== -->
<header class="header_area">
  <div class="main-menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="index.html"><img src="{{ asset('home/img/arctic-zone-logo.png')}}" alt="logo"
          height="48" width="130"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mr-auto"></div>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/">Our Services <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/pricing">Pricing <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/registration">Sign Up</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/client/auth/login">Log In</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</header>
<!--  ======================= End Header Area ============================== -->

<!--  ======================= Start Main Area ================================ -->
<main class="site-main">
  <div class="login-form">
    <div class="container">

      <h4>Sign up here to start your account</h4>

      <p>To enjoy our services make an account first.</p>

      <form id="register" role="form">
        <div class="row">
          <div class="col-md-6">
            <input required name="firstname" type="text" id="firstname" placeholder="First Name">
            <p class="text-danger"></p>
          </div>

          <div class="col-md-6">
            <input required name="lastname" type="text" id="lastname" placeholder="Last Name">
            <p class="text-danger"></p>
          </div>
        </div>

        <input required name="contact_number" type="text" id="contact-number" placeholder="Contact Number">
        <p class="text-danger"></p>

        <input required name="email" type="email" id="email" placeholder="Email Address">
        <p class="text-danger"></p>

        <input required name="password" type="password" id="password" placeholder="Password">
        <small class="text-muted">Must be 8 characters long.</small>
        <p class="text-danger"></p>
        

        <input required name="password_confirmation" type="password" id="confirm-password"
          placeholder="Re-type Password">
        <p class="text-danger"></p>

        <small class="mb-0 text-muted">By clicking Sign Up, you agree to our Terms and Conditions.</small>

        <br><br>

        <button type="submit" class="btn button primary-button btn-block mr-4 text-uppercase">Sign Up</button>

        
        
        <br>

        <p>Already have an account? <a href="/client/auth/login">Sign In</a></p>
      </form>
    </div>
  </div>
</main>

<script type="text/javascript">
  $(document).ready(function() {
            $('form#register').submit(function(evt) {
                evt.preventDefault();
                register($(this).serialize());
            });
        });


        function register(data) {
          $('.is-invalid').removeClass('is-invalid');
          $('p.text-danger').text('');
          $.ajax({
            url: ' {{ url("registration/verify") }} ',
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
                Swal.fire(
                  res.title,
                  res.message,
                  res.type
                ).then(() => {
                  window.location = '{{ url("unverified-email") }}';
                })
              }
            },

            error: function(err) {
                console.log(err)
            }
          });
        }
</script>

@endsection