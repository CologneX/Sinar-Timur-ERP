<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class transJual extends Controller
{
    public function showTransaksi()
    {
        return view('transPenjualan');
    }
}
