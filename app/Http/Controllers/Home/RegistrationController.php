<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserClient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{

    public function index() 
    {
        return view('home.registration');
    }

    public function register(Request $request) {
      $input = $request->all();
      $validator = $this->initializeValidation($input);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()));
      }
        
      try {
        if (!User::where('email', $input['email'])->exists()) {
          $userClient = UserClient::create([
              'firstname' => $input['firstname'],
              'lastname' => $input['lastname'],
              'contact_number' => $input['contact_number'],
          ]);

          $userClient->user()->create([
              'email' => $input['email'],
              'password' => Hash::make($input['password'])
          ]);

          $this->send_email($input['email']); 
          
          return [
            'type' => 'success',
            'title' => 'Success',
            'message' => "You have been successfully registered"
          ];
        }
      } catch (\Exception $e) {
        return ['type' => 'error', 'title' => 'Error','message' => $e->getMessage()];
      } 
    }

    private function initializeValidation($input) {
      return Validator::make($input, [
        'email' => 'required|email|unique:users',
        'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
        'password_confirmation' => 'min:6',
        'contact_number' => 'required|numeric|digits:11',
        'firstname' => 'required|string',
        'lastname' => 'required|string',
      ]);
    }

    private function send_email($email) {

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= "From: sofiabalastavalerio@gmail.com" . "\r\n";

        $four_digit_random = rand(1000,9999); 
        // the message
        $msg = "Thanks for signing up. Here is your verification code: " . $four_digit_random;

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        if (mail($email,"Sign up verification code",$msg, $headers)) {
            session(
                ['email-verification' => ['code' => $four_digit_random, 'email' => $email]]
            );
        }

    }
    
}