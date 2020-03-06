<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;

class ServiceHistoryController extends Controller
{
    //

    public function index() 
    {
      $service_requests = ServiceRequest::with([
        'client', 'client_contact_person', 'property', 'timeslot', 'location', 'appliances.service_fees',
        'service_type', 'technicians.tech_info'
      ])->where('status', '=', 'completed')->get()->toArray();

      // echo "<pre>";
      // print_r($service_requests);
      // die();

      return view('admin.admin_service_history', compact([
        'service_requests'
      ]));
    }
}