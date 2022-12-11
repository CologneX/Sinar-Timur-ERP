<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use App\Models\Pelanggan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelNota extends Component
{
    public $ID_BARANG, $KUANTITAS_JUAL, $ID_PEL;
    public $caribarangnota = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    // protected $listeners = ['refreshComponent' => '$refresh'];

    public function render()
    {
        return view('livewire.tabel-nota', [
            'barang' => DB::table('BARANG')->where('NAMA_BARANG', 'like', '%' . $this->caribarangnota . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10),
            'Pelanggan' => DB::table('PELANGGAN')->where('STATUS_DEL', '0')->orderBy('NAMA_PEL')->get(),
            'nota' => DB::table('DETAIL_TRANSAKSI')->where('ID_TRANSJUAL', DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'))->where('STATUS_DELETE', '0')->get(),
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
            'KUANTITAS_JUAL' => 'required|numeric|min:1|max:' . $this->STOK,
        ]);
        DB::table('DETAIL_TRANSAKSI')->insert(['ID_TRANSJUAL' => DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'), 'ID_BARANG' => $this->ID_BARANG, 'KUANTITAS_JUAL' => $this->KUANTITAS_JUAL]);
        // $this->emit('refreshComponent');

    }
    public function nextTransaksi()
    {
        DB::table('TRANSAKSI_PENJUALAN')->insert(['ID_PEL' => 'P0001', 'TOTAL_TRANSJUAL' => 0, 'TOTAL_ITEMJUAL' => 0]);
        return redirect('/nota')->with('message', 'Transaksi berhasil!');
    }
    public function hapusBarang(string $ID)
    {
        $getID = DB::table('BARANG')->select('ID_BARANG')->where('URUT_BARANG', $ID)->value('ID_BARANG');
        DB::table('DETAIL_TRANSAKSI')->where('ID_BARANG', $getID)->delete();
        // $this->emit('refreshComponent');
    }
    public function Update()
    {
        DB::table('TRANSAKSI_PENJUALAN')->where('ID_TRANSJUAL', DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'))->update(['ID_PEL' => $this->ID_PEL]);
    }
}
