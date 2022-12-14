<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ControllerBarang extends Controller
{
    public function showBarang()
    {
        return view('barang');
}
}
