<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceFee;
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
        $service_types = ServiceType::with([
            'service_fees.appliance'
        ])->get();
        return view('home.pricing')->with('service_types', $service_types);
    }

    public function get_service_fees() {
      return ServiceFee::all();
    }
    
}