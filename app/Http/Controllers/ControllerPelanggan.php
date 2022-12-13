<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Supplier;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Routing\Controller;

class ControllerPelanggan extends Controller
{

    public function showPelanggan()
    {

        return view('pelanggan');
    }

    // public function simpanPelanggan(HttpRequest $request)
    // {

    //     $pelangganInsert = $request->validate([
    //         'NAMA_PEL' => 'required',
    //         'ALAMAT' => 'required',
    //         'NOTELP' => 'required',
    //     ]);
    //     Pelanggan::create($pelangganInsert);
    //     return redirect('/pelanggan')->with('message', 'Pelanggan berhasil ditambahkan');
    // }

}
