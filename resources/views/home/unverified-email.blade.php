@extends('layouts.home-master')

@section('content')

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
                    <li class="nav-item">
                        <a class="nav-link" href="/client/auth/login">Log In</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

    <main class="site-main">
        <div class="message">
            <div class="container">
               

                <h2>Please verify your email address</h2>
                <p class="text-center">Before you can start your transaction in Arctic Zone, we need you to verify your email address.
                    An email containing  4-digit code was sent to 
                    {{ session()->get('email-verification')['email'] }}</b>.
                </p>
                <br>
                <form>
                    <div>
                        <input required type="text" 
                        class="form-control text-center" 
                        name="verification" id="verification" 
                        placeholder="E N T E R   Y O U R   C O D E" required>
                        <button type="submit" class="btn button primary-button btn-block mr-4 mt-2 text-uppercase">VERIFY NOW </button>
                    </div>
                    <br>
                    <p id="error-msg" class="error-msg small text-danger">
                        Verification code is not matched with the one you received in your email. Please try again
                    </p>
                </form>
            </div>
        </div>
    </main>

    <script type="text/javascript">

        $(document).ready(function(){
            $("form").submit(function(evt){
                evt.preventDefault();
                $("p#error-msg").hide();
                const code = $("input#verification").val();
                verify(code);
            });
        })
        function verify(code) {
            $.ajax({
                url: ' {{ url("verify-code") }} ',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'POST',
                data: {code},
                success: function(res) {
                    if (!+res) {
                        $("p#error-msg").fadeIn(500);
                        return;
                    }
                    window.location = '{{ url("client/auth/login") }}';
                },

                error: function(err) {
                    console.log(err)
                }
            });
        }
    </script>
    
@endsection