<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use App\Models\Dashboard;
use Livewire\Component;
use Livewire\WithPagination;

class ControllerDashboard extends Component
{
    public $ID_BARANG, $NAMA_BARANG, $HARGA, $STOK;
    public $caribarang = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.controller-dashboard', [
            'barang' => Dashboard::where('NAMA_BARANG', 'like', '%' . $this->caribarang . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10)

        ]);
    }
}
