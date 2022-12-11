<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\transBeli;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelTransbeli extends Component
{
    public $tabel = [];
    public $caritransbeli = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-transbeli', [
            'transbeli' => transBeli::where('ID_TRANSBELI', 'like', '%' . $this->caritransbeli . '%')->where('STATUS_DELETE', '0')->orderBy('ID_TRANSBELI')->paginate(10)

        ]);
    }
    public function detailTransbeli($URUT_TRANSBELI)
    {
        $id = DB::table('TRANSAKSI_PEMBELIAN')->where('URUT_TRANSBELI', $URUT_TRANSBELI)->value('ID_TRANSBELI');

        $this->tabel = DB::table('DETAIL_PEMBELIAN')->where('ID_TRANSBELI', $id)->get();
    }
}
