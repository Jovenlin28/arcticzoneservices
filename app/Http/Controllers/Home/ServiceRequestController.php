<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\PropertyType;
use App\Models\ServiceType;

class ServiceRequestController extends Controller
{

    public function index() 
    {
        $locations = Location::all();
        $property_types = PropertyType::all();
        $service_types = ServiceType::all();
        return view('home.service-request');
    }
    
}