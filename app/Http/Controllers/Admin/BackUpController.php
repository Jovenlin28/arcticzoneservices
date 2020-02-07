<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class  BackUpController extends Controller
{
    //

    public function index() 
    {
        return view('admin.admin_backup');
    }
}