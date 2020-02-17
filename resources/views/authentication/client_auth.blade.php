@extends('layouts.home-master')


@section('content')

<!--  ======================= Start Header Area ============================== -->
<header class="header_area">
  <div class="main-menu">
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="/"><img src="{{ asset('home/img/arctic-zone-logo.png')}}" alt="logo" height="48"
          width="130"></a>
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
          <li class="nav-item">
            <a class="nav-link" href="/registration">Sign Up</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="/login">Log In</a>
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

      <h4>Sign in to start your session</h4>

      <p>To keep connected with us please login with your personal info.</p>


      <form method="POST" action="{{action('UsersController@client_login_verify')}}" role="form">

        {{ csrf_field() }}

        <input name="email" type="email" id="exampleInputEmail1" placeholder="Email Address">
        <input name="password" type="password" id="exampleInputPassword1" placeholder="Password">

        <p><a href="/client/forgot_password" class="float-right"> Forgot my password?</a></p>
        <br>

        <button type="submit" class="btn button primary-button btn-block mr-4 text-uppercase">Sign In</button>
        <br>

        <p>Don't have an account? <a href="/registration">Sign Up</a></p>

        @include('shared.validation-errors')
      </form>
    </div>
  </div>
</main>


@endsection

<!--  ======================= End Main Area ================================ -->