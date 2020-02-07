<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceDetailsController extends Controller
{
    //

    public function index() 
    {
        return view('admin.admin_service_details');
    }
}