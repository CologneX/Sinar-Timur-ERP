<?php

namespace App\Http\Livewire;

use App\Models\ReturJual;
use Livewire\Component;
use Livewire\WithPagination;

class TabelReturJual extends Component
{
    public $carireturjual = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-retur-jual',[
            'returJual' => ReturJual::where('ID_RETURJUAL', 'like', '%' . $this->carireturjual . '%')->where('STATUS_DELETE', '0')->orWhere('ID_TRANSJUAL', 'like', '%' . $this->carireturjual . '%')->orderBy('ID_RETURJUAL')->paginate(5)

        ]);

    }
}
