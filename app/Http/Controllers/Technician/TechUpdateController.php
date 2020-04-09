<?php

namespace App\Http\Controllers\Technician;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTechnician;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TechUpdateController extends Controller
{

    public function index() 
    {
      $user = Auth::guard('technician')->user();
      return view('tech.tech_update')->with([
        'user' => $user
      ]);
    }

    public function upload_photo(Request $request) {
      $input = $request->all();
      $validator = Validator::make($input, [
        'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
      ]);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()));
      }

      try {
        $image = $request->file('file');
        $new_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $new_name);

        $tech_id = Auth::guard('technician')->user()->id;
        $tech = UserTechnician::findOrFail($tech_id);
        $tech->profile_image = $new_name;
        $tech->save();

        return response()->json([
          'type' => 'success',
          'title' => 'Success',
          'message'   => 'Image has been successfully uploaded',
          'uploaded_image' => '<img src="/uploads/'.$new_name.'" class="rounded-circle avatar-lg img-thumbnail"/>',
          'class_name'  => 'alert-success'
        ]);

      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    public function update(Request $request) {
      $input = $request->all();

      $validator = $this->initializeValidation($input);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()));
      }
        
      try {
        $tech = UserTechnician::find($input['user_id']);
        $tech->password = Hash::make($input['password']);
        $tech->username = $input['username'];
        $tech->updated_at = now();
        $tech->tech_info->firstname = $input['firstname'];
        $tech->tech_info->lastname = $input['lastname'];
        $tech->tech_info->contact_number = $input['contact_number'];
        $tech->tech_info->address = $input['address'];
        $tech->push();

        return [
          'type' => 'success',
          'title' => 'Success',
          'message' => "Profile has been successfully updated"
        ];
      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      }
    }

    private function initializeValidation($input) {
      return Validator::make($input, [
        'password' => 'min:3|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:3',
        'contact_number' => 'required|numeric|digits:11',
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'address' => 'required|string',
        'username' => 'required|string',
      ]);
    }
    
}