<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;

class ControllerDashboard extends Component
{
    public $ID_BARANG, $NAMA_BARANG, $HARGA, $STOK;
    public $cariBarang = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.controller-dashboard', [
            'barang' => Barang::where('NAMA_BARANG', 'like', '%' . $this->cariBarang . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10)

        ]);
    }
}
