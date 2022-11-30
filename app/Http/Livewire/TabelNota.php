<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelNota extends Component
{
    public $cariBarangNota = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {

        return view('livewire.tabel-nota', [
            'barangNota' => Barang::where('NAMA_BARANG', 'like', '%' . $this->cariBarangNota . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10),
            'maxID' => DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL')+1,
        ]);
    }
    public function masukkanBarang(){

    }
}
