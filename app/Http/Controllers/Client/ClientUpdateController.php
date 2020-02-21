<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ClientUpdateController extends Controller
{

    public function index() 
    {
        $user = Auth::user();
        return view('client.client_update')->with(['user' => $user]);
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

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $user->avatar = $new_name;
        $user->save();

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
        $user = User::find($input['user_id']);
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->updated_at = now();
        $user->client->firstname = $input['firstname'];
        $user->client->lastname = $input['lastname'];
        $user->client->contact_number = $input['contact_number'];
        $user->client->address = $input['address'];
        $user->client->updated_at = now();
        $user->push();

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
      $current_email = Auth::user()->email;
      return Validator::make($input, [
        'email' => $input['email'] === $current_email ? '' : 'required|email|unique:users',
        'password' => 'min:3|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:3',
        'contact_number' => 'required|numeric|digits:11',
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'address' => 'required|string',
      ]);
    }
    
}