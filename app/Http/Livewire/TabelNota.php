<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelNota extends Component
{
    public $caribarangnota = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reloadNota' => '$refresh'];
    public function render()
    {
        return view('livewire.tabel-nota', [
            'barang' => Barang::where('NAMA_BARANG', 'like', '%' . $this->caribarangnota . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10),

        ]);
    }
    public function pilihBarang(int $ID)
    {
        $getID = DB::table('BARANG')->select('ID_BARANG')->where('URUT_BARANG', $ID)->value('ID_BARANG');
        DB::insert('insert into DETAIL_TRANSAKSI (ID_TRANSJUAL, ID_BARANG, KUANTITAS_JUAL) values (?,?,?)', [DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'), $getID, 1]);
        $this->emit('reloadNota');

        // return redirect('/nota')->with('message', 'Transaksi berhasil!');



    }
    public function nextTransaksi()
    {
        DB::insert('insert into TRANSAKSI_PENJUALAN (ID_PEL, TOTAL_TRANSJUAL, TOTAL_ITEMJUAL) VALUES (?, ?,?)', ['P0001', 0, 0]);
        return redirect('/nota')->with('message', 'Transaksi berhasil!');
    }
}
