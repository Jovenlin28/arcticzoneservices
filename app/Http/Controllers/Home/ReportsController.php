<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\UserTechnician;
use PDF;

class ReportsController extends Controller
{
    public function index() 
    {
        
    }

    public function client_billing_details() {
      $pdf = PDF::loadView('reports.client-bill-details');
      return $pdf->stream();
    }
}