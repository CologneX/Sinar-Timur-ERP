<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReturBeli;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelReturBeli extends Component
{
    public $KUANTITAS_RETURBELI, $ID_TRANSBELI, $ID_BARANG, $max;
    public $carireturbeli = '';
    use WithPagination;
    protected $messages = [
        'KUANTITAS_RETURBELI.required' => 'Kuantitas Retur Beli tidak boleh kosong',
        'KUANTITAS_RETURBELI.numeric' => 'Kuantitas Retur Beli harus berupa angka',
        'KUANTITAS_RETURBELI.max' => 'Kuantitas Retur Beli harus dibawah :max',
        'KUANTITAS_RETURBELI.min' => 'Kuantitas Retur Beli harus dibawah :min',
        'ID_TRANSBELI.required' => 'ID Transaksi Pembelian tidak boleh kosong',
        'ID_BARANG.required' => 'ID Barang tidak boleh kosong',
    ];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.tabel-retur-beli', [
            'returbeli' => ReturBeli::where('ID_RETURBELI', 'like', '%' . $this->carireturbeli . '%')->where('STATUS_DELETE', '0')->orWhere('ID_TRANSBELI', 'like', '%' . $this->carireturbeli . '%')->orderBy('ID_RETURBELI')->paginate(10),
            'transaksi'=> DB::table('TRANSAKSI_PEMBELIAN')->get(),
            'barang' => DB::table('DETAIL_PEMBELIAN')->get(),

        ]);
    }

    public function resetInput()
    {
        $this->KUANTITAS_RETURBELI = '';
    }
    public function simpanData()
    {
        $this->max = DB::table('DETAIL_PEMBELIAN')->where('ID_TRANSBELI', $this->ID_TRANSBELI)->where('ID_BARANG', $this->ID_BARANG)->value('KUANTITAS_BELI');
        $this->validate([
            'KUANTITAS_RETURBELI' => 'required|numeric|min:1|max:' . $this->max,
            'ID_TRANSBELI' => 'required',
            'ID_BARANG' => 'required',
        ]);


        DB::table('RETUR_PEMBELIAN')->insert(['KUANTITAS_RETURBELI' => $this->KUANTITAS_RETURBELI, 'ID_TRANSBELI' => $this->ID_TRANSBELI, 'ID_BARANG_RETURNBELI' => $this->ID_BARANG]);
        session()->flash('message', 'Retur dengan ID Pembelian'.$this->ID_TRANSBELI.'berhasil ditambahkan');
        $this->resetInput();
    }

}
