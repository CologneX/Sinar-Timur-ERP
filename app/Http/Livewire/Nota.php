<?php

namespace App\Http\Livewire;

use App\Models\Notaa;
use Livewire\Component;
use App\Models\Pelanggan;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Nota extends Component
{
    public $ID_PEL;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reloadNota' => '$refresh'];

    public function render()
    {
        return view('livewire.nota', [
            'nota'=> Notaa::where('ID_TRANSJUAL', DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'))->where('STATUS_DELETE', '0')->get(),
            'Pelanggan'=>Pelanggan::where('STATUS_DEL', '0')->orderBy('NAMA_PEL')->get(),
        ]);

    }

    public function hapusBarang(string $ID)
    {
        $getID = DB::table('BARANG')->select('ID_BARANG')->where('URUT_BARANG', $ID)->value('ID_BARANG');
        DB::table('DETAIL_TRANSAKSI')->where('ID_BARANG', $getID)->delete();
        $this->emit('reloadNota');
    }
    public function Update()
    {
        DB::table('TRANSAKSI_PENJUALAN')->where('ID_TRANSJUAL', DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'))->update(['ID_PEL' => $this->ID_PEL]);
    }
}
