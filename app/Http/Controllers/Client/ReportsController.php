<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HorsePowerFee;
use App\Models\ServiceRequest;
use App\Models\UserClient;
use App\Models\UserTechnician;
use App\Models\Brand;
use app\Models\ServiceType;
use App\Models\UnitType;
use Carbon\Carbon;
use PDF;

class ReportsController extends Controller
{
  public function generate_client_billing_report(Request $request) {
    $client_id = $request->query('client_id');
    $sr_id = $request->query('sr_id');

    $horse_power_fees = HorsePowerFee::all();

    $service_request = ServiceRequest::with([
      'payment_mode',
      'location',
      'service_type',
      'property',
      'payment_mode',
      'appliances.service_fees',
      'remarks.horse_power.appliance', 'remarks.horse_power.horse_power',
    ])->find($sr_id)->toArray();

    $client = UserClient::find($client_id)->toArray();

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

    $pdf = PDF::loadView('reports.client-bill-details', compact([
      'client', 'service_request'
    ]));
    return $pdf->stream();
  }

  private function set_service_request_total_amount(&$sr, $total_additional_payment) {
    $sr['total_amount'] = 0;
    foreach($sr['appliances'] as &$appliance) {
        $appliance['service_type'] = ServiceType::find($appliance['pivot']['service_type_id'])->toArray();
        $appliance['brand'] = Brand::find($appliance['pivot']['brand_id'])->toArray();
        $appliance['unit'] = UnitType::find($appliance['pivot']['unit_id'])->toArray();
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
    //