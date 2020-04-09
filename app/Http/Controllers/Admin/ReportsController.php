<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HorsePowerFee;
use App\Models\ServiceRequest;
use App\Models\ServiceType;
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
      $service_types = ServiceType::all();
      return view('admin.admin_reports', compact([
        'technicians', 'service_types'
      ]));
    }

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

    public function generate_technician_service_jobs_report(Request $request) {
      $date_from = $request->query('date_from');
      $date_to = $request->query('date_to');
      $tech_id = $request->query('technician_id');

      $technician = UserTechnician::with([
        'tech_info',
        'service_requests' => function($query) use($date_from, $date_to) {
          return $query->whereBetween('created_at', [
            $date_from, $date_to
          ]);
        },
        'service_requests.client',
        'service_requests.remarks',
        'service_requests.appliances',
      ])->find($tech_id)->toArray();

      $this->set_service_type($technician['service_requests']);

      // echo "<pre>";
      // print_r($technician);
      // die();

      $pdf = PDF::loadView('reports.technician-service-jobs', compact([
        'technician', 'date_from', 'date_to'
      ]));
      return $pdf->stream();
    }

    public function generate_service_requests_by_type_report(Request $request) {
      $date_from = $request->query('date_from');
      $date_to = $request->query('date_to');
      $service_type_id = $request->query('service_type_id');
      $service_type = $request->query('service_type');

      $service_requests = ServiceRequest::with([
        'client', 'property', 'timeslot', 'technicians.tech_info'
      ])->
      whereBetween('created_at', [
        $date_from, $date_to
      ])->get()->toArray();

      // echo "<pre>";
      // print_r($service_requests);
      // die();

      $pdf = PDF::loadView('reports.service-requests-by-type', compact([
        'service_requests', 'date_from', 'date_to', 'service_type'
      ]));
      return $pdf->stream();
    }

    public function generate_service_requests_payment_status_report(Request $request) {
      $date_from = $request->query('date_from');
      $date_to = $request->query('date_to');
      $is_paid = $request->query('is_paid');
      $payment_status = ucfirst($request->query('payment_status'));

      $service_requests = ServiceRequest::where('is_paid', $is_paid)->with([
        'client', 'property', 'timeslot', 'technicians.tech_info', 'appliances'
      ])->
      whereBetween('created_at', [
        $date_from, $date_to
      ])->get()->toArray();

      $this->set_service_type($service_requests);

      // echo "<pre>";
      // print_r($service_requests);
      // die();

      $pdf = PDF::loadView('reports.service-requests-payment-status', compact([
        'service_requests', 'date_from', 'date_to', 'payment_status'
      ]));
      return $pdf->stream();
    }

    public function generate_service_requests_status_report(Request $request) {
      $date_from = $request->query('date_from');
      $date_to = $request->query('date_to');

      $service_requests = ServiceRequest::with([
        'client', 'property', 'timeslot', 'technicians.tech_info', 'appliances'
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

        foreach($sr['appliances'] as &$appliance) {
          $appliance['service_type'] = ServiceType::find($appliance['pivot']['service_type_id'])->toArray();
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
            $service_fee['service_id'] === $appliance['pivot']['service_type_id'];
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

    private function set_service_type(&$service_requests) {
      foreach($service_requests as &$sr) {
        foreach($sr['appliances'] as &$appliance) {
          $appliance['service_type'] = ServiceType::find($appliance['pivot']['service_type_id'])->toArray();
        }
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