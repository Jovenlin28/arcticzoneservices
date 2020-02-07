<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{
    /**
     * Administration Authentication
     */

     private $userClient;

     public function __construct(UserClient $userClient)
     {
         $this->userClient = $userClient;
     }

    public function admin_login()
    {
    	return view('authentication.admin_auth');
    }

    public function admin_forgot_password()
    {
        return view('authentication.admin_forgot');   
    }



    /**
     * Technician Authentication
     */


    public function tech_login()
    {
        return view('authentication.tech_auth');
    }

    public function tech_forgot_password()
    {
        return view('authentication.tech_forgot');
    }


    /**
      * Client Authentication
      */

    public function client_login_verify() {

        if (Auth::attempt(Input::only('email', 'password'))) {
            return redirect('client/home');
        } else {
            echo 'failed';
        }
    }

    public function client_logout() {
        Auth::logout();
        return redirect('client/auth/login');
    }

    public function client_login()
    {
        return view('authentication.client_auth');
    }

    public function client_forgot_password()
    {
        return view('authentication.client_forgot');
    }


}
