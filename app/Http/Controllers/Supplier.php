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
    public function simpanSupplier(Request $request)
    {


        $supplierInsert = $request->validate([
            'NAMA_SUP' => 'required',
            'ALAMAT_SUP' => 'required',
        ]);
        ModelsSupplier::create($supplierInsert);
        return redirect('/supplier')->with('message', 'Supplier berhasil ditambahkan');
    }
}
