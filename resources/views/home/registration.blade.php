@extends('layouts.home-master')

@section('content')


    <!--  ======================= Start Header Area ============================== -->
    <header class="header_area">
        <div class="main-menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.html"><img src="{{ asset('home/img/arctic-zone-logo.png')}}" alt="logo" height="48" width="130"></a>
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
                            <input required 
                            name="firstname"
                            type="text"  
                            id="firstname" 
                            placeholder="First Name">
                        </div>

                        <div class="col-md-6">
                            <input required 
                            name="lastname"
                            type="text" 
                            id="lastname" 
                            placeholder="Last Name">
                        </div>
                    </div>

                    <input required 
                    name="contact_number"
                    type="text"  
                    id="contact-number" 
                    placeholder="Contact Number">

                    <input required 
                    name="email"
                    type="email" 
                    id="email" 
                    placeholder="Email Address">
         
                    <input required 
                    name="password"
                    type="password"  
                    id="password" 
                    placeholder="Password">
                    <small class="text-muted">Password must be at least 6 characters long</small>      

                    <input required 
                    name="confirm-password"
                    type="password" 
                    id="confirm-password" 
                    placeholder="Re-type Password">
                    <small id="not-match-password" class="text-danger">
                        Confirm Password does not match
                    </small>
                    
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
                $('#not-match-password').hide();
                evt.preventDefault();
                const password = $('input#password').val();
                confirmPassword = $('input#confirm-password').val();
                if (password !== confirmPassword) {
                    $('#not-match-password').fadeIn(500);
                    return;
                }
                register($(this).serialize());
            });
        });


        function register(data) {
            $.ajax({
                url: ' {{ url("registration/verify") }} ',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: data,
                success: function(res) {
                    window.location = '{{ url("unverified-email") }}';
                },

                error: function(err) {
                    console.log(err)
                }
            });
        }
    </script>

@endsection


   