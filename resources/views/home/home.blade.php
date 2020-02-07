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
                        <li class="nav-item active">
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
    <!--  ======================= End Header Area ============================== -->

    <!--  ======================= Start Main Area ================================ -->
    <main class="site-main">
        <section class="site-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 site-title">
                         
                        <h2 class="title-text">AC Appliances, Redefined.</h2>
                        <h4 class="title-text">Our team offers best aircondition appliances services.</h4>
                        <br>
                        <div class="site-buttons">  
                            <div class="d-flex flex-row flex-wrap">
                                <a href="/service-request"><button type="button" class="btn button btn-lg primary-button mr-4 title-text text-uppercase">Request a Service Now</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <br>

        <section class="about-area">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12">
                        <div class="about-title">
                            <h1 class="title-h2">We Stand Behind Our Work</h1>
                        </div>
                    </div>
                </div>
            </div>

            <br>

             <div class="container services-list">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services">
                                <div class="sevices-img text-center py-4">
                                    <img src="{{ asset('home/img/icon/2.png')}}" alt="Services-1" height="100">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title text-uppercase">Get in touch</h5>
                                    <p class="card-text text-secondary">
                                      Connect with us through our website. We will ask you a few personal details about you to make an account and to get connected with you. 
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services">
                                <div class="sevices-img text-center py-4">
                                    <img src="{{ asset('home/img/icon/3.png')}}" alt="Services-2" height="100">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title text-uppercase">Request a Service</h5>
                                    <p class="card-text text-secondary">
                                       Submit your service request directly from our website. We ask you a few questions and details about your request and we take care of the rest.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="services">
                                <div class="sevices-img text-center py-4">
                                    <img src="{{ asset('home/img/icon/1.png')}}" alt="Services-3" height="100">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title text-uppercase">Pay and Enjoy</h5>
                                    <p class="card-text text-secondary">
                                Follow the payment given instructions and the rest must be pay directly to our technician after the job  is complete and enjoy our hassle-free service.
                                    </p>
                                </div>
                            </div>
                        </div>
                       
                    </div>

            

        </section>




                <!--  ======================= Project Area =============================  -->

        <section class="project-area">
            <div class="container">
                <div class="project-title pb-5">
                    <h1 class="title-h2 text-center">Our Services</h1>
                </div>

           
                <div class="row grid">
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item latest">
                        <div class="our-project">
                            <div class="img">
                                <a class="test-popup-link" href="./img/portfolio/cleaning.jpg">
                                    <img src="{{ asset('home/img/portfolio/clean.jpg')}}" alt="portfolio-1" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">AC Cleaning</h4>
                                <p><a href="#">See more details</a></p>
                               
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-12 element-item latest">
                        <div class="our-project">
                            <div class="img">
                                <a class="test-popup-link" href="./img/portfolio/installation.jpg">
                                    <img src="{{ asset('home/img/portfolio/install.jpg')}}" alt="portfolio-1" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">AC Installation</h4>
                                    <p><a href="#">See more details</a></p>
                               
                               
                            </div>
                        </div>
                    </div>
                   
                   
                    <div class="col-lg-4 col-md-6 col-sm-12 element-item popular">
                        <div class="our-project">
                            <div class="img">
                                <a class="test-popup-link" href="./img/portfolio/repair.jpeg">
                                    <img src="{{ asset('home/img/portfolio/rep.jpg')}}" alt="portfolio-3" class="img-fluid">
                                </a>
                            </div>
                            <div class="title py-4">
                                <h4 class="text-uppercase">AC Repair</h4>
                                    <p><a href="#">See more details</a></p>
                               
                             
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </section>

        <!--  ======================= End Project Area =============================  -->


@endsection


