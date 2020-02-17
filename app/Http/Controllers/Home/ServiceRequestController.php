<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appliance;
use App\Models\Brand;
use App\Models\Location;
use App\Models\PaymentMode;
use App\Models\PropertyType;
use App\Models\Remarks;
use App\Models\ServiceRequest;
use App\Models\ServiceTimeslot;
use App\Models\ServiceType;
use App\Models\UnitType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $payment_modes = PaymentMode::all();

        // echo "<pre>";
        // print_r($service_types->service_fees->toArray());
        
        return view('home.service-request')->with([
            'locations' => $locations,
            'property_types' => $property_types,
            'service_types' => $service_types,
            'brands' => $brands,
            'units' => $units,
            'appliances' => $appliances,
            'timeslots' => $timeslots,
            'payment_modes' => $payment_modes
        ]);
    }

    public function reschedule_service_request(Request $request) {
        $input = $request->all();

        try {
            $service_request = ServiceRequest::findOrFail($input['service_request_id']);
            $service_request->timeslot_id = $input['timeslot_id'];
            $service_request->service_date = date('Y-m-d', strtotime($input['service_date']));
            $service_request->save();

            return [
                'type' => 'success',
                'title' => 'Success',
                'message' => "Successfully rescheduled service request",
            ];
        } catch(\Exception $e) {
            return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
        }
    }

    public function finish_service_request(Request $request) {
        $input = $request->all();

        try {
            $remarks = new Remarks([
              'name' => $input['remarks'],
              'technician_id' => Auth::guard('technician')->user()->id
            ]);
            $service_request = ServiceRequest::findOrFail($input['service_request_id']);
            $service_request->remarks()->save($remarks);

            $service_request->workdone()->attach($input['workdone_id']);

            return [
                'type' => 'success',
                'title' => 'Success',
                'message' => "Service Job finished successfully",
            ];
        } catch(\Exception $e) {
            return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
        }
        
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
            'special_instruction' => $input['special_instruction'],
            'payment_mode_id' => $input['payment_mode_id'],
            'is_paid' => 0,
            'service_date' => date('Y-m-d', strtotime($input['service_date']))
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