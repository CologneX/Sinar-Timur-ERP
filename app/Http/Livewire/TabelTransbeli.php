<?php

namespace App\Http\Livewire;

use App\Models\transBeli;
use Livewire\Component;
use Livewire\WithPagination;

class TabelTransbeli extends Component
{
    public $caritransbeli = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-transbeli', [
            'transbeli' => transBeli::where('ID_TRANSBELI', 'like', '%' . $this->caritransbeli . '%')->where('STATUS_DELETE', '0')->orderBy('ID_TRANSBELI')->paginate(5)

        ]);
    }
}
