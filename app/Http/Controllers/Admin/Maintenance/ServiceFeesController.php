<?php

namespace App\Http\Controllers\Admin\Maintenance;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appliance;
use App\Models\ServiceFee;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Validator;

class ServiceFeesController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service_fees = ServiceFee::with([
            'appliance', 'service_type'
        ])->get();
        
        $appliances = Appliance::all();
        $service_types = ServiceType::all();

        return view('admin.maintenance.service_fee')->with([
            'service_fees' => $service_fees,
            'appliances' => $appliances,
            'service_types' => $service_types
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'service_fee' => 'required|numeric',
        'service_type_id' => 'required|numeric',
        'appliance_id' => 'required|numeric',
      ]);
  
      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
      } else {
        try {
          $service_fee = ServiceFee::create([
            'fee' => $request['service_fee'],
            'service_id' => $request['service_type_id'],
            'appliance_id' => $request['appliance_id']
          ]);
  
          return [
            'type' => 'success',
            'title' => 'Success',
            'message' => "Service Fee information added successfully",
            'service_fee' => $service_fee
          ];
        } catch (\Exception $e) {
          return ['type' => 'error', 'title' => 'Error', 'message' => $e->getMessage()];
        }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [
        'service_fee' => 'required|numeric'
      ]);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
      } else {
        try {
          ServiceFee::find($id)->update([
            'fee' => $request['service_fee']
          ]);

          return ['type' => 'success', 'title' => 'Success message', 'message' => "Service Fee updated successfully"];
        } catch (\Exception $e) {
          return ['type' => 'error', 'title' => 'Error message', 'message' => $e->getMessage()];
        }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      ServiceFee::findOrFail($id)->delete();
      return response()->json(['message' => 'Deleted!']);
    }
}
