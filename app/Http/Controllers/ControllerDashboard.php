<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerDashboard extends Controller
{
    public function showDashboard()
    {
        return view('dashboard');
    }
}
