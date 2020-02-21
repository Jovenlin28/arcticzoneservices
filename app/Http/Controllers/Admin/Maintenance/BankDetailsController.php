<?php

namespace App\Http\Controllers\Admin\Maintenance;

use App\Models\BankDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class BankDetailsController extends Controller
{
  private $banKdetails;

  public function __construct(BankDetails $banKdetails)
  {
    $this->banKdetails = $banKdetails;
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $bank_details = BankDetails::all();

    return view('admin.maintenance.bank_details')->with('bank_details', $bank_details);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.maintenance.bank_details');
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
      'name' => 'required|string|unique:bank_details,name,',
      'number' => 'required|string:bank_details,number'
    ]);

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
    } else {
      try {


        $bank = BankDetails::create([
          'name' => $request['name'],
          'number' => $request['number']
        ]);


        return [
          'type' => 'success',
          'title' => 'Success',
          'message' => "Bank account information added successfully",
          'bank' => $bank
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
    return $this->banKdetails->get_bank_details($id);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $bank_details = BankDetails::find($id);

    return view('admin.maintenance.bank_details')->with('bank_details', $bank_details);
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
      'account_name' => 'required|string|unique:bank_details,name,' . $id . ',id',
      'account_number' => 'required|string:bank_details,number,' . $id . ',id'
    ]);

    if ($validator->fails()) {
      return response()->json(array('errors' => $validator->getMessageBag()->toarray()));
    } else {
      try {
        BankDetails::find($id)->update([
          'name' => $request['account_name'],
          'number' => $request['account_number']
        ]);

        return ['type' => 'success', 'title' => 'Success message', 'message' => "Bank account information updated successfully"];
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
    BankDetails::findOrFail($id)->delete();

    return response()->json(['message' => 'Deleted!']);
  }
}
