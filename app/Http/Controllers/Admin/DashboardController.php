<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\ServiceRequest;
use App\Models\UserTechnician;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function index() 
    {

      $service_requests = ServiceRequest::all()->toArray();
      $technicians = UserTechnician::all()->toArray(); 
      
      $count_group = [
        'properties' => DB::table('property_types')->count(),
        'locations' => DB::table('locations')->count(),
        'service_types' => DB::table('service_types')->count(),
        'appliances' => DB::table('appliances')->count(),
        'units' => DB::table('units')->count(),
        'service_requests' => count($service_requests),
        'technicians' => count($technicians)
      ];

      $tech_group_by = [
        'available' => 0,
        'unavailable' => 0
      ];

      foreach($technicians as $tech) {
        if ($tech['availability_status'] === 1) {
          $tech_group_by['available'] += 1;
        } else {
          $tech_group_by['unavailable'] += 1;
        }
      }
      
      $status_group = [
        'new' => 0,
        'assigned' => 0,
        'closed' => 0,
        'cancelled' => 0,
        'on_going' => 0,
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
          $status_group['closed'] += 1;
        } else {
          $status_group['cancelled'] += 1;
        }
      }

      // echo "<pre>";
      // print_r($technicians);
      // die();

      return view('admin.admin_dashboard', compact([
        'status_group', 
        'count_group', 
        'tech_group_by'
      ]));
    }

    public function TechAvailabilityStatistic() {
      $technicians = UserTechnician::all()->toArray();
      $tech_group_by = [
        'available' => 0,
        'unavailable' => 0
      ];

      foreach($technicians as $tech) {
        if ($tech['availability_status'] === 1) {
          $tech_group_by['available'] += 1;
        } else {
          $tech_group_by['unavailable'] += 1;
        }
      }

      return $tech_group_by;
    }

    public function ServiceRequestStatusStatistic() {
      $service_requests = ServiceRequest::whereBetween(
        'created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
      )->get()->toArray();

      $status_group = [
        'new' => 0,
        'assigned' => 0,
        'closed' => 0,
        'cancelled' => 0,
        'on_going' => 0,
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
          $status_group['closed'] += 1;
        } else {
          $status_group['cancelled'] += 1;
        }
      }

      return $status_group;
    }
}