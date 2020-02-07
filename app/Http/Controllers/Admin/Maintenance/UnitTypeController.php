<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\UnitType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UnitTypeController extends Controller
{
    private $unitType;

    public function __construct(UnitType $unitType)
    {
        $this->unitType = $unitType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = UnitType::all();

        return view('admin.maintenance.unit-types')->with('units', $units);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintenance.unit-types');
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
            'name' => 'required|string|unique:units,name,',
            'fee' => 'required|string:units,fee'
            
            
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {


                $unitsS = UnitType::create([
                    'name' => $request['name'],
                    'fee' => $request['fee']
                ]);

           
                return [
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => "Unit Type information updated successfully",
                    'unitsS' => $unitsS
                ];
            } catch (\Exception $e) {
                return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
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
        return $this->unitType->get_units($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $units = UnitType::find($id);

        return view('admin.maintenance.unit-types')->with('units', $units);
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
            'unit_name' => 'required|string|unique:units,name,'.$id.',id',
            'unit_fee' => 'required|string:units,fee,'.$id.',id'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                UnitType::find($id)->update([
                    'name' => $request['unit_name'],
                    'fee' => $request['unit_fee']
                ]);

                return ['type' => 'success', 'title' => 'Success message','message' => "Unit Type information updated successfully"];
            } catch (\Exception $e) {
                return ['type' => 'error', 'title' => 'Error message','message' => $e->getMessage()];
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
        UnitType::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted!']);
    }
}
