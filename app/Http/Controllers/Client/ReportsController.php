<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\UserClient;
use App\Models\UserTechnician;
use Carbon\Carbon;
use PDF;

class ReportsController extends Controller
{
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
}
    //