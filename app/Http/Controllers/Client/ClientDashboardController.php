<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use App\Models\UserClient;
use Illuminate\Support\Facades\Auth;

class ClientDashboardController extends Controller
{

    public function index() 
    {

        $user_id = Auth::user()->id;


        $client = UserClient::with(
            'service_requests.location',
            'service_requests.service_type',
            'service_requests.property',
            'service_requests.timeslot',
            'service_requests.appliances.brand',
            'service_requests.appliances.unit'
        )->find($user_id)->toArray();

        $client = $this->groupByRequestStatus($client);

        // echo "<pre>";
        // print_r($client);

        return view('client.client_dashboard')->with('client', $client);
    }

    private function groupByRequestStatus($client) {
        $client['service_requests_category'] = [
            'new' => [], 'pending' => [], 'completed' => [], 'canceled' => []
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

            if ($request['status'] === 'canceled') {
                array_push($client['service_requests_category']['cancelled'], $request);
            }
        }

        return $client;
    }
    
}