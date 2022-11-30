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

    public function simpanBarang(Request $request)
    {
        $barangInsert = $request->validate([
            'NAMA_BARANG' => 'required',
            'HARGA' => 'required',
            'STOK' => 'required',
            'SATUAN' => 'required',
            'LOKASI' => 'required'
        ]);
        Barang::create($barangInsert);
        return redirect('/')->with('message', 'Barang berhasil ditambahkan');
    }
}
