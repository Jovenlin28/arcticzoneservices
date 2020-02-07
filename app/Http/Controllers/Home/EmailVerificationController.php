<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailVerificationController extends Controller
{

    public function index() 
    {
        if (session()->has('email-verification')) {
            return view('home.unverified-email');
        }
        return redirect('/');
    }

    public function verify_code(Request $request) {
        $code = $request->get('code');
        $codeFromSession = session()->get('email-verification')['code'];
        if ($code == $codeFromSession) {
            echo true;
            session()->flush();
        } 

        echo false;
    }
    
}