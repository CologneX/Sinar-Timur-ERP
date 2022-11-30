<?php

namespace App\Http\Livewire;

use App\Models\ReturBeli;
use Livewire\Component;
use Livewire\WithPagination;

class TabelReturBeli extends Component
{
    public $carireturbeli = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-retur-beli', [
            'returbeli' => ReturBeli::where('ID_RETURBELI', 'like', '%' . $this->carireturbeli . '%')->where('STATUS_DELETE', '0')->orWhere('ID_TRANSBELI', 'like', '%' . $this->carireturbeli . '%')->orderBy('ID_RETURBELI')->paginate(5)

        ]);
    }
}
