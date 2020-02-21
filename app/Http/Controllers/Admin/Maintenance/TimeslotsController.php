<?php

namespace App\Http\Controllers\Admin\Maintenance;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceTimeslot;
use DateTime;
use Illuminate\Support\Facades\Validator;

class TimeslotsController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeslots = ServiceTimeslot::all();
        return view('admin.maintenance.timeslots')->with('timeslots', $timeslots);
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
      $input = $request->all();
      $validator = Validator::make($input, [
        'start_time' => 'required|date_format:h:iA',
        'end_time' => 'required|date_format:h:iA,'
      ]);
  
      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
      } else {
        try {
          $timeslot = ServiceTimeslot::create([
            'start' => DateTime::createFromFormat( 'h:iA', $input['start_time'])->format('H:i:s'),
            'end' => DateTime::createFromFormat( 'h:iA', $input['end_time'])->format('H:i:s')
          ]);
  
          return [
            'type' => 'success',
            'title' => 'Success',
            'message' => "Service Timeslot information added successfully",
            'timeslot' => $timeslot
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
      $input = $request->all();
      $validator = Validator::make($input, [
        'start_time' => 'required|date_format:h:iA',
        'end_time' => 'required|date_format:h:iA,'
      ]);
  
      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
      } else {
        try {
          $timeslot = ServiceTimeslot::findOrFail($input['timeslot_id'])->update([
            'start' => DateTime::createFromFormat( 'h:iA', $input['start_time'])->format('H:i:s'),
            'end' => DateTime::createFromFormat( 'h:iA', $input['end_time'])->format('H:i:s')
          ]);
  
          return [
            'type' => 'success',
            'title' => 'Success',
            'message' => "Service Timeslot information updated successfully",
            'timeslot' => $timeslot
          ];
        } catch (\Exception $e) {
          return ['type' => 'error', 'title' => 'Error', 'message' => $e->getMessage()];
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
      ServiceTimeslot::findOrFail($id)->delete();

      return response()->json(['message' => 'Deleted!']);
    }
}
