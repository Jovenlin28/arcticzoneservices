<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\UserClient;
use App\Models\UserTechnician;
use Carbon\Carbon;
use PDF;

class ReportsController extends Controller
{
    //

    public function index() 
    {
      $technicians = UserTechnician::all();
      return view('admin.admin_reports', compact('technicians'));
    }

    public function generate_client_billing_report(Request $request) {
      $client_id = $request->query('client_id');
      $sr_id = $request->query('sr_id');
  
      $client = UserClient::with([
        'service_requests' => function($query) use($sr_id) {
          return $query->where('id', '=', $sr_id);
        },
        'service_requests.payment_mode',
        'service_requests.location',
        'service_requests.service_type',
        'service_requests.property',
        'service_requests.payment_mode',
        'service_requests.appliances.service_fees',
      ])->find($client_id)->toArray();
  
      $client['total_amount'] = 0;
      foreach($client['service_requests'][0]['appliances'] as $appliance) {
          $found = array_filter($appliance['service_fees'], function($service_fee) use($client, $appliance){
          return $service_fee['appliance_id'] === $appliance['id'] && 
          $service_fee['service_id'] === $client['service_requests'][0]['service_type_id'];
        });
        if (count($found) > 0) {
          $client['total_amount'] += array_values($found)[0]['fee'];
        } 
      }
      
      // echo "<pre>";
      // print_r($client);
      // die();
  
      $pdf = PDF::loadView('reports.client-bill-details', compact([
        'client'
      ]));
      return $pdf->stream();
    }

    public function generate_technician_service_jobs_report(Request $request) {
      $date_from = $request->query('date_from');
      $date_to = $request->query('date_to');
      $tech_id = $request->query('technician_id');

      $technician = UserTechnician::with([
        'tech_info',
        'service_requests.service_type',
        'service_requests.client',
        'service_requests.remarks',
      ])->whereBetween('created_at', [
        $date_from, $date_to
      ])->find($tech_id)->toArray();

      // echo "<pre>";
      // print_r($technician);
      // die();

      $pdf = PDF::loadView('reports.technician-service-jobs', compact([
        'technician', 'date_from', 'date_to'
      ]));
      return $pdf->stream();
    }

    public function generate_service_requests_status_report(Request $request) {
      $date_from = $request->query('date_from');
      $date_to = $request->query('date_to');

      $service_requests = ServiceRequest::with([
        'client', 'property', 'timeslot', 'service_type', 'technicians.tech_info'
      ])->
      whereBetween('created_at', [
        $date_from, $date_to
      ])->get()->toArray();

      
      $status_group = [
        'new' => 0,
        'pending' => 0,
        'completed' => 0,
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
            $status_group['pending'] += 1;
          }
          
        } else if ($sr['status'] === 'completed') {
          $status_group['completed'] += 1;
        } else {
          $status_group['cancelled'] += 1;
        }
      }

      // echo "<pre>";
      // print_r($service_requests);
      // die();

      $pdf = PDF::loadView('reports.service-requests-status', compact([
        'service_requests', 'status_group', 'date_from', 'date_to'
      ]));
      return $pdf->stream();
    }

    public function generate_service_requests_report(Request $request) {
      $date_from = $request->query('date_from');
      $date_to = $request->query('date_to');
      $service_requests = ServiceRequest::with([
        'client', 'workdone', 'appliances.service_fees'
      ])->
      whereBetween('created_at', [
        $date_from, $date_to
      ])->get()->toArray();

      foreach($service_requests as &$sr) {
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

      $pdf = PDF::loadView('reports.service-requests', compact([
        'service_requests', 'date_from', 'date_to'
      ]));
      return $pdf->stream();
    }
} 