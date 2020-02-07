<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    private $bRand;

    public function __construct(Brand $bRand)
    {
        $this->bRand = $bRand;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();

        return view('admin.maintenance.brand')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.maintenance.brand');
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
            'name' => 'required|string|unique:brands,name,'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                $bra = Brand::create(['name' => $request['name']]);

                return [
                    'type' => 'success',
                    'title' => 'Success',
                    'message' => "Brand information updated successfully",
                    'bra' => $bra
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
        return $this->bRand->get_brands($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brands = Brand::find($id);

        return view('admin.maintenance.brand')->with('brands', $brands);
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
            'brand_name' => 'required|string|unique:brands,name,'.$id.',id'
        ]);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
        } else {
            try {
                Brand::find($id)->update([
                    'name' => $request['brand_name']
                ]);

                return ['type' => 'success', 'title' => 'Success message','message' => "Brand information updated successfully"];
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
        Brand::findOrFail($id)->delete();

        return response()->json(['message' => 'Deleted!']);
    }
}
