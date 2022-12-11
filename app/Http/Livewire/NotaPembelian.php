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
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {

        return view('livewire.nota-pembelian', [
            'barang' => DB::table('BARANG')->where('NAMA_BARANG', 'like', '%' . $this->caribarangnotaBeli . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10),
            'notaBarang' => DetailPembelian::where('ID_TRANSBELI', DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI'))->where('STATUS_DELETE', '0')->get(),
            'Supplier' => Supplier::where('STATUS_DELETE', '0')->get(),
        ]);
    }
    public function cariID($URUT_BARANG)
    {
        // $barang = DB::table('BARANG')->where('URUT_BARANG', $URUT_BARANG)->value('ID_BARANG');
        $barang = Barang::find($URUT_BARANG);

        // $this->ID_BARANG = $barang;

        if ($barang) {
            $this->ID_BARANG = $barang->ID_BARANG;
            $this->NAMA_BARANG = $barang->NAMA_BARANG;
            $this->STOK = $barang->STOK;
        }
    }
    public function pilihBarang()
    {

        $this->validate([
            'KUANTITAS_BELI' => 'required|numeric|min:1|',
        ]);
        DB::table('DETAIL_PEMBELIAN')->insert(['ID_TRANSBELI' => DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI'), 'ID_BARANG' => $this->ID_BARANG, 'KUANTITAS_BELI' => $this->KUANTITAS_BELI]);
        // DB::insert('insert into DETAIL_TRANSAKSI (ID_TRANSJUAL, ID_BARANG, KUANTITAS_JUAL) values (?,?,?)', [DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'), $this->ID_BARANG, $this->KUANTITAS_JUAL]);
        // $this->emit('reloadNota');
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
        DB::table('TRANSAKSI_PEMBELIAN')->insert(['ID_SUP' => 'S0001', 'TOTAL_TRANSBELI' => 0, 'TOTAL_ITEMBELI' => 0]);
        // DB::insert('insert into TRANSAKSI_PENJUALAN (ID_PEL, TOTAL_TRANSJUAL, TOTAL_ITEMJUAL) VALUES (?, ?,?)', [$pelanggan, 0, 0]);
        // return redirect('/pembelian')->with('message', 'Transaksi berhasil!');
    }
    public function Update()
    {
        DB::table('TRANSAKSI_PEMBELIAN')->where('ID_TRANSBELI', DB::table('TRANSAKSI_PEMBELIAN')->max('ID_TRANSBELI'))->update(['ID_SUP' => $this->ID_SUP]);
    }

}
