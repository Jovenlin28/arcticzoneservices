<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserClient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

    public function admin_logout() {
      Auth::guard('admin')->logout();
      return redirect('admin/auth/login');
    }

    public function admin_login_verify(Request $request) {
      $input = $request->all();
      Validator::make($input, [
        'username' => 'bail|required',
        'password' => 'required|min:3'
      ])->validate();

      if (Auth::guard('admin')->attempt(Input::only('username', 'password'))) {
          return redirect()->intended();
      } else {
          return Redirect::back()->withErrors(['Invalid Username or Password']);
      }
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

    public function tech_login_verify(Request $request) {
      $input = $request->all();
      Validator::make($input, [
        'username' => 'bail|required',
        'password' => 'required|min:3'
      ])->validate();

      if (Auth::guard('technician')->attempt(Input::only('username', 'password'))) {
          return redirect()->intended();
      } else {
          return Redirect::back()->withErrors(['Invalid Username or Password']);
      }
    }

    public function tech_logout() {
      Auth::guard('technician')->logout();
      return redirect('tech/auth/login');
    }


    /**
      * Client Authentication
      */

    public function client_login_verify(Request $request) {
        $input = $request->all();
        Validator::make($input, [
          'email' => 'bail|required|email',
          'password' => 'required|min:3'
        ])->validate();

        if (Auth::attempt(Input::only('email', 'password'))) {
            return redirect()->intended('service-request');
        } else {
            return Redirect::back()->withErrors(['Invalid Username or Password']);
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
