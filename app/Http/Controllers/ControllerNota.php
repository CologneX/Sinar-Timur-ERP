<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerNota extends Controller
{
    public function showNota()
    {
        return view('nota');
    }

}

