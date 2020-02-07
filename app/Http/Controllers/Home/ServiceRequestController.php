<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appliance;
use App\Models\Brand;
use App\Models\Location;
use App\Models\PropertyType;
use App\Models\ServiceRequest;
use App\Models\ServiceTimeslot;
use App\Models\ServiceType;
use App\Models\UnitType;

class ServiceRequestController extends Controller
{

    public function index() 
    {
        $locations = Location::all();
        $property_types = PropertyType::all();
        $service_types = ServiceType::all();
        $brands = Brand::all();
        $units = UnitType::all();
        $appliances = Appliance::all();
        $timeslots = ServiceTimeslot::all();
        return view('home.service-request')->with([
            'locations' => $locations,
            'property_types' => $property_types,
            'service_types' => $service_types,
            'brands' => $brands,
            'units' => $units,
            'appliances' => $appliances,
            'timeslots' => $timeslots
        ]);
    }
    
    public function create(Request $request) {
        // echo "<pre>";
        // print_r($request->get('data'));

        $input = $request->get('data');

        $service_request = ServiceRequest::create([
            'client_id' => $input['client_id'],
            'service_type_id' =>  $input['service_type_id'],
            'location_id' => $input['location_id'],
            'property_id' => $input['property_type_id'],
            'timeslot_id' => $input['timeslot_id'],
            'service_address' => $input['service_address'],
            'status' => 'new',
            'near_landmark' => $input['near_landmark'],
            'special_instruction' => $input['special_instruction']

        ]);

        $unit_details = [];
        for($i = 0; $i < count($input['appliance_id']); $i++) {
            $unit_details[$input['appliance_id'][$i]] = [
                'brand_id' => $input['brand_id'][$i],
                'unit_id' => $input['unit_id'][$i],
            ];   
        }

        $service_request->appliances()->attach($unit_details);
    }
}