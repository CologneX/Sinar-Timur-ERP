<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReturBeli;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelReturBeli extends Component
{
    public $KUANTITAS_RETURBELI, $ID_TRANSBELI, $ID_BARANG;
    public $carireturbeli = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.tabel-retur-beli', [
            'returbeli' => ReturBeli::where('ID_RETURBELI', 'like', '%' . $this->carireturbeli . '%')->where('STATUS_DELETE', '0')->orWhere('ID_TRANSBELI', 'like', '%' . $this->carireturbeli . '%')->orderBy('ID_RETURBELI')->paginate(10),
            'transaksi'=> DB::table('TRANSAKSI_PEMBELIAN')->get(),
            'barang' => DB::table('BARANG')->get(),

        ]);
    }
    public function simpanData()
    {
        // dd($this->ID_BARANG, $this->ID_TRANSBELI, $this->KUANTITAS_RETURBELI);
        //validate data before insert
        $this->validate([
            'KUANTITAS_RETURBELI' => 'required|numeric|min:1|max:'. DB::table('DETAIL_PEMBELIAN')->where('ID_TRANSBELI', $this->ID_TRANSBELI)->where('ID_BARANG', $this->ID_BARANG)->value('KUANTITAS_BELI'),
            'ID_TRANSBELI' => 'required',
            'ID_BARANG' => 'required',
        ]);


        DB::table('RETUR_PEMBELIAN')->insert(['KUANTITAS_RETURBELI' => $this->KUANTITAS_RETURBELI, 'ID_TRANSBELI' => $this->ID_TRANSBELI, 'ID_BARANG_RETURNBELI' => $this->ID_BARANG]);
        redirect()->to('/returanPembelian')->with('message', 'Retur Pembelian Berhasil!');


    }
}
