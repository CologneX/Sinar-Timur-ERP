<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerNota extends Controller
{
    public function showNota()
    {
        return view('nota');
    }

}

