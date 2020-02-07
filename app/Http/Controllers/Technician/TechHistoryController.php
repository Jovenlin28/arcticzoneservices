<?php

namespace App\Http\Controllers\Technician;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechHistoryController extends Controller
{

    public function index() 
    {
        return view('tech.tech_history');
    }
    
}