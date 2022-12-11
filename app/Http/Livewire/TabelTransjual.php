<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelTransjual extends Component
{
    public $tabel=[];
    public $caritransjual = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-transjual', [
            'transjual' => DB::table('TRANSAKSI_PENJUALAN')->where('ID_TRANSJUAL', 'like', '%' . $this->caritransjual . '%')->where('STATUS_DELETE', '0')->orderBy('ID_TRANSJUAL')->paginate(10),
        ]);
    }
    public function detailTransjual($URUT_TRANSJUAL)
    {
        $id = DB::table('TRANSAKSI_PENJUALAN')->where('URUT_TRANSJUAL',$URUT_TRANSJUAL)->value('ID_TRANSJUAL');
        $this->tabel = DB::table('DETAIL_TRANSAKSI')->where('ID_TRANSJUAL',$id )->get();
    }
}
