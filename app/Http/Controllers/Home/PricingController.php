<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\ServiceType;

class PricingController extends Controller
{

    private $serviceType;

    public function __construct(ServiceType $serviceType)
    {
        $this->serviceType = $serviceType;
    }

    public function index() 
    {
        $service_types = $this->serviceType::all();
        return view('home.pricing')->with('service_types', $service_types);
    }
    
}