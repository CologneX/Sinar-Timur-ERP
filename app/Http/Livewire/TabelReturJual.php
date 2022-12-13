<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReturJual;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelReturJual extends Component
{
    public $KUANTITAS_RETURJUAL, $ID_TRANSJUAL, $ID_BARANG;
    public $carireturjual = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-retur-jual', [
            'returJual' => ReturJual::where('ID_RETURJUAL', 'like', '%' . $this->carireturjual . '%')->where('STATUS_DELETE', '0')->orWhere('ID_TRANSJUAL', 'like', '%' . $this->carireturjual . '%')->orderBy('ID_RETURJUAL')->paginate(10),
            'transaksi' => DB::table('TRANSAKSI_PENJUALAN')->get(),
            'barang' => DB::table('BARANG')->get(),
        ]);
    }
    public function simpanData()
    {
        // $this->validate([
        //     'KUANTITAS_RETURJUAL' => 'required|min:1|max:'. DB::table('TRANSJUAL_BARANG')->where('ID_TRANSJUAL', $this->ID_TRANSJUAL)->where('ID_BARANG', $this->ID_BARANG)->
        //     'ID_TRANSJUAL' => 'required',
        //     'ID_BARANG' => 'required',
        // ]);


        DB::table('RETUR_PENJUALAN')->insert(['KUANTITAS_RETURJUAL' => $this->KUANTITAS_RETURJUAL, 'ID_TRANSJUAL' => $this->ID_TRANSJUAL, 'ID_BARANG_RETURJUAL' => $this->ID_BARANG]);
        redirect()->to('/returanPenjualan')->with('message', 'Retur Penjualan Berhasil!');
    }
}
