<?php

namespace App\Http\Controllers\Admin\Maintenance;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appliance;
use App\Models\HorsePower;
use App\Models\HorsePowerFee;
use Illuminate\Support\Facades\Validator;

class HorsePowerFeeController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $horse_power_fees = HorsePowerFee::with([
        'appliance', 'horse_power'
      ])->get();
      
      $appliances = Appliance::all();
      $horse_power = HorsePower::all();

      return view('admin.maintenance.horse-power-fees')->with([
          'horse_power' => $horse_power,
          'appliances' => $appliances,
          'horse_power_fees' => $horse_power_fees
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
        'fee' => 'required|numeric',
        'appliance_id' => 'required|numeric',
        'hp_id' => 'required|numeric',
      ]);
  
      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
      } else {
        try {
          $horse_power_fee = HorsePowerFee::create([
            'fee' => $request['fee'],
            'appliance_id' => $request['appliance_id'],
            'hp_id' => $request['hp_id']
          ]);
  
          return [
            'type' => 'success',
            'title' => 'Success',
            'message' => "Horse Power Fee information added successfully",
            'service_fee' => $horse_power_fee
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
        'fee' => 'required|numeric'
      ]);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
      } else {
        try {
          HorsePowerFee::find($id)->update([
            'fee' => $request['fee']
          ]);

          return ['type' => 'success', 'title' => 'Success message', 'message' => "Horse Power Fee updated successfully"];
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
      HorsePowerFee::findOrFail($id)->delete();
      return response()->json(['message' => 'Deleted!']);
    }
}
