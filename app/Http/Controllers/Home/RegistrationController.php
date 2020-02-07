<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserClient;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function index() 
    {
        return view('home.registration');
    }

    public function register(Request $request) {
        $input = $request->all();

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

           
        } 

        
    }

    private function send_email($email) {

        $four_digit_random = rand(1000,9999); 
        // the message
        $msg = "Thanks for signing up. Here is your verification code: " . $four_digit_random;

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        if (mail($email,"Sign up verification code",$msg)) {
            session(
                ['email-verification' => ['code' => $four_digit_random, 'email' => $email]]
            );
        }

    }
    
}