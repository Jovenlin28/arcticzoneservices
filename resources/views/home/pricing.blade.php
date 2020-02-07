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
                    <li class="nav-item active">
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

<!--  ======================= End Header Area ============================== -->

<!--  ======================= Start Main Area ================================ -->
<main class="site-main">
    <div class="pricing">
        <div class="container">
               <h2 class="text-center">Services Pricing</h2>

            <form class="text-center">

                <select>
                    <option class="text-muted">Choose service type here</option>
                    @foreach ($service_types as $service_type) 
                        <option>{{$service_type->name}}</option>
                    @endforeach                 
                </select>
  


                <button class="btn btn-lg btn-primary">Get Prices</button>
            
            </form>


            <hr width="70">


            <div class="pricing-info">
                <div class="includes mt-5">
                    <h5>Services Includes</h5>
                    <p><i class="glyphicon glyphicon-ok"></i>SAMPLE NUMBER 1</p>
                </div>


                <div class="text-center">

                <div class="row mt-4">

                    <div class="col-md-4">
                        <img src="./img/acimages/window.png">
                        <p class="mt-2 ">₱ 2,000.00 <i>per unit</i></p>
                    </div>

                    <div class="col-md-4 tex">
                        <img src="./img/acimages/split.png">
                        <p class="mt-2 ">₱ 2,000.00 <i>per unit</i></p>
                    </div>

                    <div class="col-md-4">
                        <img src="./img/acimages/tower.png">
                        <p class="mt-2">₱ 2,000.00 <i>per unit</i></p>
                    </div>

                </div>


                <div class="row mt-3">

                    <div class="col-md-4">
                        <img src="./img/acimages/window.png">
                        <p class="mt-2 ">₱ 2,000.00 <i>per unit</i></p>
                    </div>

                    <div class="col-md-4 tex">
                        <img src="./img/acimages/split.png">
                        <p class="mt-2 ">₱ 2,000.00 <i>per unit</i></p>
                    </div>

                    <div class="col-md-4">
                        <img src="./img/acimages/tower.png">
                        <p class="mt-2">₱ 2,000.00 <i>per unit</i></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>





@endsection