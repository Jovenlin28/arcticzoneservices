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

        <select name="service-type">
          <option class="text-muted">Choose service type here</option>
          @foreach ($service_types as $service_type)
          <option value="{{ $service_type->id }}">
            {{$service_type->name}}
          </option>
          @endforeach
        </select>



        <button id="get-service-fee" type="button" class="btn btn-lg btn-primary">Get Prices</button>

      </form>


      <hr width="70">


      <div class="pricing-info">
        <div class="includes mt-5">
          <h3>Services</h3>
          <br><br>
        </div>


        <div class="text-center">

          @foreach ($service_types as $service_type)
          <div data-service-type-id="{{ $service_type->id }}" class="service-type">
            <h3> {{ $service_type->name }}</h3>
            <div class="row mt-4">
              @foreach ($service_type->service_fees as $service)
              <div class="col-md-4">
                <img width="100" height="100" class="appliance-img"
                  src="{{ url('/uploads/appliances/' . $service->appliance->image) }}">
                <p class="mt-2 ">₱ {{ number_format($service->fee, 2) }} <i>per unit</i></p>
              </div>
              @endforeach
            </div>
            <hr>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>


  @endsection

  @push('scripts')

  <script>
    $(document).ready(function(){
			$('button#get-service-fee').on('click', function(){
				const serviceTypeId = $('select[name="service-type"] option:checked').val();
				const $serviceTypes = $('div.service-type');
				$serviceTypes.show();
				$serviceTypes.filter(function(index){
					return $(this).attr('data-service-type-id') != serviceTypeId;
				}).hide();
			});
		});
  </script>

  @endpush