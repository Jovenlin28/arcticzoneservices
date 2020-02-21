<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\ServiceRequest;
use App\Models\UserTechnician;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function index() 
    {
      $service_requests = ServiceRequest::with([
        'client', 'property', 'timeslot', 'location', 'appliances.service_fees',
        'service_type', 'technicians.tech_info'
      ])->get()->toArray();

      $locations = Location::withCount([
        'service_requests'
      ])->get()->toArray();

      $technicians = UserTechnician::with('tech_info')->withCount([
        'service_requests'
      ])->get()->toArray();

      $status_group = [
        'new' => 0,
        'assigned' => 0,
        'closed' => 0,
        'cancelled' => 0,
        'on_going' => 0
      ];

      foreach($service_requests as &$sr) {
        if ($sr['status'] === 'new') {
          $status_group['new'] += 1;
        } else if ($sr['status'] === 'pending') {
          if (Carbon::now()->gte(Carbon::parse($sr['service_date']))) {
            $status_group['on_going'] += 1;
          } else {
            $status_group['assigned'] += 1;
          }
          
        } else if ($sr['status'] === 'completed') {
          $status_group['cloed'] += 1;
        } else {
          $status_group['cancelled'] += 1;
        }
        $this->set_service_request_total_amount($sr);
      }

      // echo "<pre>";
      // print_r($service_requests);
      // die();

      return view('admin.admin_dashboard', compact([
        'service_requests', 'status_group', 'locations', 'technicians'
      ]));
    }

    private function set_service_request_total_amount(&$sr) {
      $sr['total_amount'] = 0;
      foreach($sr['appliances'] as $appliance) {
          $found = array_filter($appliance['service_fees'], function($service_fee) use($sr, $appliance){
          return $service_fee['appliance_id'] === $appliance['id'] && 
          $service_fee['service_id'] === $sr['service_type_id'];
        });
        if (count($found) > 0) {
          $sr['total_amount'] += array_values($found)[0]['fee'];
        } 
      }
    }
}