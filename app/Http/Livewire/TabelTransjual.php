<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\transJual;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelTransjual extends Component
{

    public $tabel = [];
    public $caritransjual = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-transjual', [
            'transjual' => transJual::where('ID_TRANSJUAL', 'like', '%' . $this->caritransjual . '%')->where('STATUS_DELETE', '0')->orderBy('ID_TRANSJUAL')->paginate(5),
            'tabel'=>$this->tabel,

        ]);
    }
    public function detailTransjual($urut)
    {
        $id = DB::table('TRANSAKSI_PENJUALAN')->where('URUT_TRANSJUAL', $urut)->value('ID_TRANSJUAL');

        $tabel = DB::table('DETAIL_TRANSAKSI')->where('ID_TRANSJUAL', $id)->get();
        $this->tabel = $tabel;



    }
}
