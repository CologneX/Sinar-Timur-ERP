<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\transJual;
use Livewire\WithPagination;

class TabelTransjual extends Component
{
    public $caritransjual = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-transjual', [
            'transjual' => transJual::where('ID_TRANSJUAL', 'like', '%' . $this->caritransjual . '%')->where('STATUS_DELETE', '0')->orderBy('ID_TRANSJUAL')->paginate(5)
            // orWhere('ID_PEL', 'like', '%' . $this->caritransjual . '%')
        ]);
    }
}
