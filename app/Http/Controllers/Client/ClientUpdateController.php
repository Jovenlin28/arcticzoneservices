<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientUpdateController extends Controller
{
    private $user;

    // public function __construct(User $user) {
    //     $this->user = $user;
    // }

    public function index() 
    {
        $user = Auth::user();
        return view('client.client_update')->with(['user' => $user]);
    }

    public function update(Request $request) {
        $input = $request->all();
        $user = User::find($input['user_id']);
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        $user->updated_at = now();
        $user->client->firstname = $input['firstname'];
        $user->client->lastname = $input['lastname'];
        $user->client->contact_number = $input['contact'];
        $user->client->address = $input['address'];
        $user->client->updated_at = now();
        $user->push();
    }
    
}