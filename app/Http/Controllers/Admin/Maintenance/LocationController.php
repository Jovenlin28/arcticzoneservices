<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    private $locaTion;

    public function __construct(Location $locaTion)
    {
        $this->locaTion = $locaTion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::all();

        return view('admin.maintenance.location')->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintenance.location');
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
            'name' => 'required|string|unique:locations,name,'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                $loc = Location::create(['name' => $request['name']]);

                return [
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => "Location information updated successfully",
                    'loc' => $loc
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
        return $this->locaTion->get_locations($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locations = Location::find($id);

        return view('admin.maintenance.location')->with('locations', $locations);
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
            'location_name' => 'required|string|unique:locations,name,'.$id.',id'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                Location::find($id)->update([
                    'name' => $request['location_name']
                ]);

                return ['type' => 'success', 'title' => 'Success message','message' => "Location information updated successfully"];
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
        Location::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted!']);
    }
}
