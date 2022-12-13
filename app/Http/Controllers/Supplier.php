<?php

namespace App\Http\Controllers;

use App\Models\Supplier as ModelsSupplier;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class Supplier extends Controller
{
    public function showSupplier()
    {

        return view('Supplier');
    }
}
