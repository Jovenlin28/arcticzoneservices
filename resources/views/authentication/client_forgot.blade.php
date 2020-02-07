@extends('layouts.home-master')

@section('content')

<!--  ======================= Start Header Area ============================== -->

<header class="header_area">
    <div class="main-menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/"><img src="{{ asset('home/img/arctic-zone-logo.png')}}" alt="logo" height="48" width="130"></a>
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

            <h4>Forgot your Password?</h4>

       
            <form role="form">

                <label>Enter your email address and we will send you a new password.</label>
                <input type="email"  id="exampleInputEmail1" placeholder="ex. juandelacruz@gmail.com">
    
                <button type="button" class="btn button primary-button btn-block mr-4 text-uppercase">Request</button>
            </form> 
        </div>
    </div>
</main>

@endsection

<!--  ======================= End Main Area ================================ -->
