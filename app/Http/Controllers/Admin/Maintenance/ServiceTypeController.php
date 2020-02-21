<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\Models\ServiceType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ServiceTypeController extends Controller
{
  private $serviceType;

  public function __construct(ServiceType $serviceType)
  {
    $this->serviceType = $serviceType;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $service_types = ServiceType::all();

    return view('admin.maintenance.service-types')->with('service_types', $service_types);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.maintenance.service-types');
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
      'name' => 'required|string|unique:service_types,name,'
    ]);

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
    } else {
      try {
        $service = ServiceType::create(['name' => $request['name']]);

        return [
          'type' => 'success',
          'title' => 'Success',
          'message' => "Service Type information updated successfully",
          'service' => $service
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
    return ServiceType::findOrFail($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $service_types = ServiceType::find($id);

    return view('admin.maintenance.service-types')->with('service_types', $service_types);
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
      'service_name' => 'required|string|unique:service_types,name,' . $id . ',id'
    ]);

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
    } else {
      try {
        ServiceType::find($id)->update([
          'name' => $request['service_name']
        ]);

        return ['type' => 'success', 'title' => 'Success message', 'message' => "Service Type information updated successfully"];
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
    ServiceType::findOrFail($id)->delete();

    return response()->json(['message' => 'Deleted!']);
  }
}
