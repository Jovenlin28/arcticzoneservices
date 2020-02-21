<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTechnician;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TechMngController extends Controller
{

    public function index() 
    {
        $technicians = UserTechnician::with('tech_info')->get()->toArray();
        return view('admin.admin_techmng')->with([
          'technicians' => $technicians
        ]);
    }

    public function add_technician(Request $request) {
      $input = $request->all();
      $validator = $this->initializeValidation($input);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()));
      }

      try {
        $tech = UserTechnician::create([
          'username' => $input['username'],
          'password' => Hash::make($input['password']),
          'availability_status' => 1
        ]);

        $tech->tech_info()->create([
          'firstname' => $input['firstname'],
          'lastname' => $input['lastname'],
          'address' => $input['address'],
          'contact_number' => $input['contact_number']
        ]);

        return [
          'type' => 'success',
          'title' => 'Success',
          'message' => "Technician has been added successfully"
        ];

      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    public function update_availability_status(Request $request) {
      $availability_status = $request->get('availability_status');
      $tech_id = $request->get('tech_id');

      try {
        $tech = UserTechnician::findOrFail($tech_id);
        $tech->availability_status = $availability_status;
        $tech->save();

        return [
          'type' => 'success',
          'title' => 'Success',
          'message' => "Availability Status has been successfully updated"
        ];
      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    private function initializeValidation($input) {
      return Validator::make($input, [
        'username' => 'required|string|unique:users_tech',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6',
        'contact_number' => 'required|numeric|digits:11',
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'address' => 'required|string',
      ]);
    }
}