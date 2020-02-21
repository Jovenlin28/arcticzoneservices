<?php

namespace App\Http\Controllers\Admin\Maintenance;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appliance;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ApplianceTypeController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appliances = Appliance::all();
        return view('admin.maintenance.appliance_type')->with([
            'appliances' => $appliances
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      echo 'test';
      
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
        'name' => 'required',
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
      ]);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()));
      }

      try {
        $image = $request->file('file');
        $new_name = time() . '-' . $input['name'] . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/appliances'), $new_name);

        $user = Appliance::create([
          'name' => $input['name'],
          'image' => $new_name
        ]);

        return response()->json([
          'type' => 'success',
          'title' => 'Success',
          'message'   => 'Appliance Type has been successfully added',
        ]);

      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
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
        'name' => 'required',
        'file' => $request->hasFile('file') ? 'image|mimes:jpeg,png,jpg,gif|max:2048' : ''
      ]);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()));
      }

      try {
        if ($request->hasFile('file')) {
          $image = $request->file('file');
          $new_name = time() . '-' . $input['name'] . '.' . $image->getClientOriginalExtension();
          $image->move(public_path('uploads/appliances'), $new_name);

          Appliance::find($id)->update([
            'name' => $input['name'],
            'image' => $new_name
          ]);
        } else {
          Appliance::find($id)->update([
            'name' => $input['name']
          ]);
        }  

        return response()->json([
          'type' => 'success',
          'title' => 'Success',
          'message'   => 'Appliance Type has been successfully updated',
        ]);

      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
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
      Appliance::findOrFail($id)->delete();

      return response()->json(['message' => 'Deleted!']);
    }
}
