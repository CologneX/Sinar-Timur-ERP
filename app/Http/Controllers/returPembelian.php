<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class returPembelian extends Controller
{
    public function showRetur()
    {
        return view('returPembelian');
    }
}
