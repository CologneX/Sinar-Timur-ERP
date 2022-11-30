<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transBeli extends Controller
{
    public function showTransaksi()
    {
        return view('transPembelian');
    }
}
