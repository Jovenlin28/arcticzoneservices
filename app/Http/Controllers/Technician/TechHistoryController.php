<?php

namespace App\Http\Controllers\Technician;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\UnitType;
use App\Models\UserTechnician;
use Illuminate\Database\Eloquent\Builder;

class TechHistoryController extends Controller
{

    public function index() 
    {
        $tech = UserTechnician::with([
            'service_requests' => function($query) {
                $query->where('status', '=', 'completed');
            },
            'service_requests.client',
            'service_requests.service_type',
            'service_requests.property',
            'service_requests.location',
            'service_requests.timeslot',
            'service_requests.appliances',
            'service_requests.workdone'
        ])->find(1)->toArray();

        foreach($tech['service_requests'] as &$service_request) {
            foreach($service_request['appliances'] as &$appliance) {
                $appliance['brand'] = Brand::find($appliance['pivot']['brand_id'])->toArray();
                $appliance['unit'] = UnitType::find($appliance['pivot']['unit_id'])->toArray();
            }
        }

        // echo "<pre>";
        // print_r($tech);
        // die();

        return view('tech.tech_history')->with('completed_services', $tech['service_requests']);
    }
    
}