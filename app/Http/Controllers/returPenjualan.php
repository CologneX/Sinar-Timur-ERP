<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class returPenjualan extends Controller
{
    public function showRetur()
    {
        return view('returPenjualan');
    }
}
