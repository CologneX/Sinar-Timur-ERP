<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use App\Models\DetailPembelian;
use Illuminate\Support\Facades\DB;


class NotaPembelian extends Component
{
    public $ID_BARANG, $KUANTITAS_BELI, $ID_SUP;
    public $caribarangnotaBeli = '';
    public $supplier = [];
    public $count;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshComponent' => 'render'];
    //custom validation message
    
    protected $messages = [
        'KUANTITAS_BELI.required' => 'Kuantitas tidak boleh kosong',
        'KUANTITAS_BELI.numeric' => 'Kuantitas harus berupa angka',
        'KUANTITAS_BELI.min' => 'Kuantitas Beli minimal 1',
        'ID_SUP.required' => 'Pilih Supplier terlebih dahulu',
        'count.min' => 'Pilih barang terlebih dahulu',
    ];


    public function render()
    {
        return view('livewire.nota-pembelian', [
            'barang' => DB::table('BARANG')->where('NAMA_BARANG', 'like', '%' . $this->caribarangnotaBeli . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10),
            'notaBarang' => DetailPembelian::where('ID_TRANSBELI', DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI'))->where('STATUS_DELETE', '0')->get(),
            $this->supplier = Supplier::where('STATUS_DELETE', '0')->get(),
        ]);
    }
    public function cariID($URUT_BARANG)
    {
        $barang = Barang::find($URUT_BARANG);
        if ($barang) {
            $this->ID_BARANG = $barang->ID_BARANG;
            $this->NAMA_BARANG = $barang->NAMA_BARANG;
            $this->STOK = $barang->STOK;
        }
    }
    public function pilihBarang()
    {
        $this->validate([
            'KUANTITAS_BELI' => 'required|numeric|min:1',
        ]);
        DB::table('DETAIL_PEMBELIAN')->insert(['ID_TRANSBELI' => DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI'), 'ID_BARANG' => $this->ID_BARANG, 'KUANTITAS_BELI' => $this->KUANTITAS_BELI]);
        $this->emit('refreshComponent');
    }
    public function hapusBarang(string $ID)
    {
        $getID = DB::table('BARANG')->select('ID_BARANG')->where('URUT_BARANG', $ID)->value('ID_BARANG');
        DB::table('DETAIL_PEMBELIAN')->where('ID_BARANG', $getID)->delete();
        $this->emit('refreshComponent');
    }
    public function nextTransaksi()
    {
        $this->count = DB::table('DETAIL_PEMBELIAN')->where('ID_TRANSBELI', DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI'))->count();
        $this->validate([
            'ID_SUP' => 'required',
        ]);
        if ($this->count > 1) {
            DB::table('TRANSAKSI_PEMBELIAN')->where('ID_TRANSBELI', DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI'))->update(['ID_SUP' => $this->ID_SUP]);
            DB::table('TRANSAKSI_PEMBELIAN')->insert(['ID_SUP' => 'S0001', 'TOTAL_TRANSBELI' => 0, 'TOTAL_ITEMBELI' => 0]);
            session()->flash('message', 'Transaksi ' . DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI') . ' Berhasil');
            $this->KUANTITAS_BELI = '';
            $this->emit('refreshComponent');
        }

    }
}
