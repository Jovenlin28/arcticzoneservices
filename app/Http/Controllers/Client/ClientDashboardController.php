<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ServiceRequest;
use App\Models\ServiceTimeslot;
use App\Models\ServiceType;
use App\Models\UnitType;
use App\Models\UserClient;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
                $appliance['service_type'] = ServiceType::find($appliance['pivot']['service_type_id'])->toArray();
            }
        }

        $client = $this->groupByRequestStatus($client);


        return view('client.client_dashboard')->with([
            'client' => $client,
            'timeslots' => $timeslots
        ]);
    }

    public function cancel_service_request(Request $request) {
      try {
        $sr_id = $request->input('service_request_id');
        $service_request = ServiceRequest::findOrFail($sr_id);
        $service_request->status = 'cancelled';
        $service_request->canceled_at = Carbon::now();
        $service_request->save();

        return response()->json([
          'type' => 'success',
          'title' => 'Success',
          'message'   => 'Service Request has been successfully cancelled',
        ]);
      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    public function attach_receipt_payment(Request $request) {
      $input = $request->all();
      $validator = Validator::make($input, [
        'file' => 'required|image|mimes:jpeg,png,jpg|max:2048'
      ]);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()));
      }

      try {
        $image = $request->file('file');
        $new_name = time() . '-' . $image->getClientOriginalName();
        $image->move(public_path('uploads/receipt_payments'), $new_name);

        $service_request = ServiceRequest::findOrFail($input['service_request_id']);
        $service_request->receipt_payment_file = $new_name;
        $service_request->payment_submitted_date = Carbon::now();
        $service_request->save();

        return response()->json([
          'type' => 'success',
          'title' => 'Success',
          'message'   => 'Receipt Payment has been successfully uploaded',
        ]);

      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
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