<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ServiceRequest;
use App\Models\ServiceTimeslot;
use App\Models\UnitType;
use App\Models\UserClient;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{

    public function index() 
    {

        $user_client_id = Auth::user()->client->id;

        $client = UserClient::with(
            'service_requests.location',
            'service_requests.service_type',
            'service_requests.property',
            'service_requests.timeslot',
            'service_requests.payment_mode',
            'service_requests.appliances',
            'service_requests.technicians'
        )->find($user_client_id)->toArray();

        // echo "<pre>";
        // print_r($client);
        // die();

        $timeslots = ServiceTimeslot::all();

       
        foreach($client['service_requests'] as &$service_request) {
            foreach($service_request['appliances'] as &$appliance) {
                $appliance['brand'] = Brand::find($appliance['pivot']['brand_id'])->toArray();
                $appliance['unit'] = UnitType::find($appliance['pivot']['unit_id'])->toArray();
            }
        }

        $client = $this->groupByRequestStatus($client);


        return view('client.client_dashboard')->with([
            'client' => $client,
            'timeslots' => $timeslots
        ]);
    }

    private function groupByRequestStatus($client) {
        $client['service_requests_category'] = [
            'new' => [], 'pending' => [], 'completed' => [], 'cancelled' => []
        ];

        foreach($client['service_requests'] as $request) {
            if ($request['status'] === 'new') {
                array_push($client['service_requests_category']['new'], $request);
            }

            if ($request['status'] === 'pending') {
                array_push($client['service_requests_category']['pending'], $request);
            }

            if ($request['status'] === 'completed') {
                array_push($client['service_requests_category']['completed'], $request);
            }

            if ($request['status'] === 'cancelled') {
                array_push($client['service_requests_category']['cancelled'], $request);
            }
        }

        return $client;
    }
    
}