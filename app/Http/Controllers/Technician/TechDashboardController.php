<?php

namespace App\Http\Controllers\Technician;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechDashboardController extends Controller
{

    public function index() 
    {
        return view('tech.tech_dashboard');
    }
    
}