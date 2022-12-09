<?php

namespace App\Http\Livewire;

use App\Models\Notaa;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Nota extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reloadNota' => '$refresh'];

    public function render()
    {
        return view('livewire.nota', [
            'nota'=> Notaa::where('ID_TRANSJUAL', DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'))->where('STATUS_DELETE', '0')->get()
        ]);

    }

    public function hapusBarang(string $ID)
    {
        $getID = DB::table('BARANG')->select('ID_BARANG')->where('URUT_BARANG', $ID)->value('ID_BARANG');
        DB::table('DETAIL_TRANSAKSI')->where('ID_BARANG', $getID)->delete();
        $this->emit('reloadNota');
    }
}
