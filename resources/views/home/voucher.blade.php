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



    <main class="site-main">
    	<div class="voucher">
    		<h2>Service Request Successfully Sent!</h2>
    		<p>Please use the voucher to pay your initial payment. You may download your customer voucher <a href="">here</a>.</p>

    	</div>
    </main>