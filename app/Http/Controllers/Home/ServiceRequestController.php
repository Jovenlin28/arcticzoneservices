<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appliance;
use App\Models\Brand;
use App\Models\ClientContactPerson;
use App\Models\Location;
use App\Models\PaymentMode;
use App\Models\PropertyType;
use App\Models\Remarks;
use App\Models\RepairIssue;
use App\Models\ServiceRequest;
use App\Models\ServiceTimeslot;
use App\Models\ServiceType;
use App\Models\UnitType;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    $timeslots = ServiceTimeslot::withCount('service_requests')->get();
    $payment_modes = PaymentMode::all();
    $troubles = RepairIssue::all();

    // echo "<pre>";
    // print_r($timeslots);
    // die();

    return view('home.service-request')->with([
      'locations' => $locations,
      'property_types' => $property_types,
      'service_types' => $service_types,
      'brands' => $brands,
      'units' => $units,
      'appliances' => $appliances,
      'timeslots' => $timeslots,
      'payment_modes' => $payment_modes,
      'troubles' => $troubles
    ]);
  }

  public function reschedule_service_request(Request $request)
  {
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
    } catch (\Exception $e) {
      return ['type' => 'error', 'title' => 'Error', 'message' => $e->getMessage()];
    }
  }

  public function finish_service_request(Request $request)
  {
    $input = $request->get('data');
    $tech_id = Auth::guard('technician')->user()->id;

    try {
      $remarks = new Remarks([
        'workdone_desc' => $input['work_done'],
        'name' => $input['remarks'],
        'technician_id' => $tech_id
      ]);
      $service_request = ServiceRequest::findOrFail($input['service_request_id']);
      $service_request->remarks()->save($remarks);

      $remarks_horse_power = [];
      for ($i = 0; $i < count($input['horse_power_id']); $i++) {
        array_push($remarks_horse_power, [
          'horse_power_id' => $input['horse_power_id'][$i],
          'appliance_id' => $input['appliance_id'][$i]
        ]);
      }

      $remarks->horse_power()->createMany($remarks_horse_power);

      return [  
        'type' => 'success',
        'title' => 'Success',
        'message' => "Remarks has been sent successfully",
      ];
    } catch (\Exception $e) {
      return ['type' => 'error', 'title' => 'Error', 'message' => $e->getMessage()];
    }
  }

  public function create(Request $request)
  {
    // echo "<pre>";
    // print_r($request->get('data'));

    $input = $request->get('data');

    if ($input['is_home_address'] === 'false') {
      $validator = $this->initializeContactPersonValidation($input);
    } else {
      $validator = $this->initializeClientValidation($input);
    }

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()));
    }

    try {
      $service_request = ServiceRequest::create([
        'client_id' => $input['client_id'],
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

      if ($input['is_home_address'] === 'false') {
        $cl_contact_person = ClientContactPerson::create([
          'firstname' => $input['contact_firstname'],
          'lastname' => $input['contact_lastname'],
          'contact_number' => $input['contact_mobile_number'],
          'email' => $input['contact_email'],
          'address' => $input['contact_address'],
        ]);
        $cl_contact_person->service_request()->save($service_request);
      }

      $unit_details = [];
      for ($i = 0; $i < count($input['appliance_id']); $i++) {
        $unit_details[$input['appliance_id'][$i]] = [
          'brand_id' => $input['brand_id'][$i],
          'unit_id' => $input['unit_id'][$i],
          'service_type_id' => $input['service_type_id'][$i],
          'trouble_id' => $input['trouble_id'][$i] === '' ? null : $input['trouble_id'][$i],
          'qty' => 1
        ];
      }

      $service_request->appliances()->attach($unit_details);

      session([
        'voucher' => [
          'service_request_id' => $service_request->id
        ]
      ]);

      return response()->json([
        'type' => 'success',
        'title' => 'Success',
        'message'   => 'Service Request has been successfully created',
      ]);
    } catch (\Exception $e) {
      return ['type' => 'error', 'title' => 'Error', 'message' => $e->getMessage()];
    }
  }

  private function initializeContactPersonValidation($input)
  {
    return Validator::make($input, [
      'contact_email' => 'required|email',
      'contact_mobile_number' => 'required|numeric|digits:11',
      'contact_firstname' => 'required|string',
      'contact_lastname' => 'required|string',
      'contact_address' => 'required|string',
      'service_date' => 'required',
      'timeslot_id' => 'required'
    ]);
  }

  private function initializeClientValidation($input)
  {
    return Validator::make($input, [
      'service_address' => 'required|string',
      'service_date' => 'required',
      'timeslot_id' => 'required'
    ]);
  }
}
