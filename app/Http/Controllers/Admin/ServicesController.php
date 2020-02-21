<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ServiceRequest;
use App\Models\UnitType;
use App\Models\UserTechnician;
use Carbon\Carbon;
use DateTime;

class ServicesController extends Controller
{
    //

    public function index() 
    {

      $technicians = UserTechnician::where('availability_status', 1)->get()->toArray();

      $service_requests = ServiceRequest::with([
        'client', 'property', 'technicians', 'timeslot', 'remarks'
      ])->get()->toArray();

      // echo "<pre>";
      // print_r($service_requests);
      // die();

      return view('admin.admin_service')->with([
        'service_requests' => $service_requests,
        'technicians' => $technicians
      ]);
    }

    public function get_service_request($id) {
      $service_request = ServiceRequest::with([
        'client', 'client.user', 'property', 'technicians', 'timeslot', 'remarks',
        'service_type', 'appliances.unit', 'appliances.brand', 'workdone',
        'location', 'payment_mode'
      ])->find($id)->toArray();
      // echo "<pre>";
      // print_r($service_request);

      foreach($service_request['appliances'] as &$appliance) {
        $appliance['brand'] = Brand::find($appliance['pivot']['brand_id'])->toArray();
        $appliance['unit'] = UnitType::find($appliance['pivot']['unit_id'])->toArray();
      }

      return view('admin.admin_service_details')->with([
        'service_request' => $service_request
      ]);
    }

    public function complete_service_request(Request $request) {
      $service_request_id = $request->get('service_request_id');
      try {
        $service_request = ServiceRequest::findOrFail($service_request_id);
        $service_request->status = 'completed';
        $service_request->completed_at = Carbon::now();
        $service_request->save();
        return [
          'type' => 'success',
          'title' => 'Success',
          'message' => "Successfully finished service request",
        ];
      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    public function confirm_payment(Request $request) {
      $sr_id = $request->input('service_request_id');

      try {
        $service_request = ServiceRequest::findOrFail($sr_id);
        $service_request->is_paid = 1;
        $service_request->validated_at = Carbon::now();
        $service_request->save();

        return response()->json([
          'type' => 'success',
          'title' => 'Success',
          'message'   => 'Receipt Payment has been successfully confirmed',
        ]);

      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    public function assign_technician(Request $request) {
      $input = $request->all();

      try {
        $service_request = ServiceRequest::findOrFail($input['service-request-id']);
        $service_request->status = 'pending';
        $service_request->save();

        $service_request->technicians()->attach([
          $input['technician-id-1'],
          $input['technician-id-2'],
        ]);

        return [
            'type' => 'success',
            'title' => 'Success',
            'message' => "Successfully assigned technicians",
        ];
      } catch(\Exception $e) {
          return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }
}