<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\PropertyType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PropertyTypeController extends Controller
{
    private $propertyType;

    public function __construct(PropertyType $propertyType)
    {
        $this->propertyType = $propertyType;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $property_types = PropertyType::all();

        return view('admin.maintenance.property-types')->with('property_types', $property_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintenance.property-types');
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
            'name' => 'required|string|unique:property_types,name,'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                $property = PropertyType::create(['name' => $request['name']]);

                return [
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => "Property Type information updated successfully",
                    'property' => $property
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
        return $this->propertyType->get_property_types($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property_types = PropertyType::find($id);

        return view('admin.maintenance.property-types')->with('property_types', $property_types);
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
            'property_name' => 'required|string|unique:property_types,name,'.$id.',id'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                PropertyType::find($id)->update([
                    'name' => $request['property_name']
                ]);

                return ['type' => 'success', 'title' => 'Success message','message' => "Property Type information updated successfully"];
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
        PropertyType::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted!']);
    }
}
