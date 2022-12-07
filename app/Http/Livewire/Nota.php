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

    public function render()
    {
        return view('livewire.nota', [
            'nota'=> Notaa::where('ID_TRANSJUAL', DB::table('TRANSAKSI_PENJUALAN')->max('ID_TRANSJUAL'))->where('STATUS_DELETE', '0')->paginate(5)
        ]);

    }
    public function nextTransaksi()
    {
        DB::insert('insert into TRANSAKSI_PENJUALAN (ID_PEL, TOTAL_TRANSJUAL, TOTAL_ITEMJUAL) VALUES (?, ?,?)', ['P0001', 0, 0]);
    }
}
