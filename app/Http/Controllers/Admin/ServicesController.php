<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\HorsePowerFee;
use App\Models\ServiceRequest;
use App\Models\ServiceType;
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
        'client', 'property', 'technicians.tech_info', 'timeslot', 'remarks', 
        'client_contact_person'
      ])->get()->toArray();

      return view('admin.admin_service')->with([
        'service_requests' => $service_requests,
        'technicians' => $technicians
      ]);
    }

    public function get_service_request($id) {
      $service_request = ServiceRequest::with([
        'client', 'client.user', 'property', 'technicians.tech_info', 'timeslot', 
        'remarks.horse_power.appliance', 'remarks.horse_power.horse_power',
        'appliances.unit', 'appliances.brand', 'appliances.service_fees',
        'workdone', 'location', 'payment_mode', 'client_contact_person'
      ])->find($id)->toArray();

      $horse_power_fees = HorsePowerFee::all();
      

      foreach($service_request['appliances'] as &$appliance) {
        $appliance['brand'] = Brand::find($appliance['pivot']['brand_id'])->toArray();
        $appliance['unit'] = UnitType::find($appliance['pivot']['unit_id'])->toArray();
        $appliance['service_type'] = ServiceType::find($appliance['pivot']['service_type_id'])->toArray();
      }

      $horse_power = [];

      foreach($service_request['remarks'] as $remarks) {
        $horse_power = array_merge($horse_power, $remarks['horse_power']);
      }

      $total_additional_payment = 0;

      foreach($horse_power as &$hp) {
        foreach($horse_power_fees as $hp_fees) {
          if ($hp['horse_power_id'] === $hp_fees['hp_id']
          && $hp['appliance_id'] === $hp_fees['appliance_id']) {
            $hp['fee'] = $hp_fees['fee'];
            $total_additional_payment += $hp['fee'];
            break;
          }
        } 
      }

      $this->set_service_request_total_amount($service_request, $total_additional_payment);

      $service_request['additional_payment'] = $horse_power;

      // echo "<pre>";
      // print_r($service_request);
      // die();

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

    public function decline_payment(Request $request) {
      $sr_id = $request->input('service_request_id');

      try {
        $service_request = ServiceRequest::findOrFail($sr_id);
        $service_request->receipt_payment_file = null;
        $service_request->save();

        return response()->json([
          'type' => 'success',
          'title' => 'Success',
          'message'   => 'Receipt Payment has been successfully cancelled',
        ]);

      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    public function assign_technician(Request $request) {
      $input = $request->all();

      try {

        $available_technicians = UserTechnician::with('tech_info')->where('availability_status', '=', 1)
        ->skip(0)->take(2)->get()->toArray();

        // echo "<pre>";
        // print_r($available_technicians);
        // die();

        if (count($available_technicians) !== 2) {
          return [
            'type' => 'error', 
            'title' => 'Error',
            'message' => 'Two technician should be available'
          ];
        }
        
        $service_request = ServiceRequest::findOrFail($input['service_request_id']);
        $service_request->status = 'pending';
        $service_request->save();

        // $service_request->technicians()->attach([
        //   $input['technician-id-1'],
        //   $input['technician-id-2'],
        // ]);

        return [
            'type' => 'success',
            'title' => 'Success',
            'message' => "Successfully assigned technicians",
            'technicians' => $available_technicians
        ];
      } catch(\Exception $e) {
          return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    private function set_service_request_total_amount(&$sr, $total_additional_payment) {
      $sr['total_amount'] = 0;
      foreach($sr['appliances'] as $appliance) {
          $found = array_filter($appliance['service_fees'], function($service_fee) use($sr, $appliance){
          return $service_fee['appliance_id'] === $appliance['id'] && 
          $service_fee['service_id'] === $appliance['pivot']['service_type_id'];
        });
        if (count($found) > 0) {
          $sr['total_amount'] += array_values($found)[0]['fee'];
        } 
      }
      if ($sr['payment_mode']['name'] === 'Half Payment') {
        $sr['down_payment'] = $sr['total_amount'] / 2;
        $sr['balance'] = ($sr['total_amount'] / 2) + $total_additional_payment;
        $sr['total_amount'] = $sr['total_amount'] + $total_additional_payment;
      } else {
        $sr['down_payment'] = $sr['total_amount'];
        $sr['balance'] = $total_additional_payment;
        $sr['total_amount'] = $sr['total_amount'] + $total_additional_payment;
      }
    }
}