<?php

namespace App\Http\Controllers\Admin\Maintenance;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HorsePower;
use Illuminate\Support\Facades\Validator;

class HorsePowerController extends Controller
{


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $horse_power = HorsePower::all();
    return view('admin.maintenance.horse-power')->with([
      'horse_power' => $horse_power
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
      'hp' => 'required|numeric'
    ]);

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
    } else {
      try {
        $hp = HorsePower::create([
          'hp' => $request['hp'],
        ]);
        return [
          'type' => 'success',
          'title' => 'Success',
          'message' => "Horse Power information added successfully",
          'hp' => $hp
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
      'hp' => 'required|numeric'
    ]);

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
    } else {
      try {
        HorsePower::find($id)->update([
          'hp' => $request['hp'],
        ]);

        return ['type' => 'success', 'title' => 'Success message', 'message' => "Horse Power information updated successfully"];
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
    HorsePower::findOrFail($id)->delete();
    return response()->json(['message' => 'Deleted!']);
  }
}
