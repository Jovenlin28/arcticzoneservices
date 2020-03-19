<?php

namespace App\Http\Controllers\Technician;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appliance;
use App\Models\Brand;
use App\Models\HorsePower;
use App\Models\ServiceType;
use App\Models\UnitType;
use App\Models\UserTechnician;
use App\Models\Workdone;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TechDashboardController extends Controller
{

  public function index()
  {
    $tech_id = Auth::guard('technician')->user()->id;
    $tech = UserTechnician::with([
      'service_requests.client',
      'service_requests.property',
      'service_requests.location',
      'service_requests.timeslot',
      'service_requests.appliances',
      'service_requests.workdone',
      'service_requests.remarks',
      'service_requests.client_contact_person'
    ])->find($tech_id)->toArray();

    $appliances = Appliance::all()->toArray();
    $horse_power = HorsePower::all()->toArray();
    $workdone = Workdone::all()->toArray();

    $sr_status_group = [
      'pending' => [],
      'on_going' => [],
      'completed' => []
    ];

    foreach ($tech['service_requests'] as &$service_request) {
      foreach ($service_request['appliances'] as &$appliance) {
        $appliance['brand'] = Brand::find($appliance['pivot']['brand_id'])->toArray();
        $appliance['unit'] = UnitType::find($appliance['pivot']['unit_id'])->toArray();
        $appliance['service_type'] = ServiceType::find($appliance['pivot']['service_type_id'])->toArray();
      }
      if ($service_request['status'] === 'pending') {
        if (Carbon::now()->gte(Carbon::parse($service_request['service_date']))) {
          array_push($sr_status_group['on_going'], $service_request);
        } else {
          array_push($sr_status_group['pending'], $service_request);
        }
      } 

      if ($service_request['status'] === 'completed' && count($service_request['remarks']) === 2) {
        array_push($sr_status_group['completed'], $service_request);
      }
    }


    // echo "<pre>";
    // print_r($tech);
    // die();

    return view('tech.tech_dashboard')->with([
      'sr_status_group' => $sr_status_group,
      'workdone' => $workdone,
      'tech_id' => $tech_id,
      'appliances' => $appliances,
      'horse_power' => $horse_power
    ]);
  }
}
