<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pembelian extends Controller
{
    public function showPembelian()
    {
        return view('pembelian');
    }
}
