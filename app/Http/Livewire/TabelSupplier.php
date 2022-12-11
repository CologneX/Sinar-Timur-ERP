<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelSupplier extends Component
{
    public $ID_SUP, $NAMA_SUP, $ALAMAT_SUP, $URUT_SUPPLIER;
    public $cariSupplier = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-supplier', [
            'supplier' => DB::table('SUPPLIER')->where('STATUS_DELETE','0')->Where('NAMA_SUP', 'like', '%' . $this->cariSupplier . '%')->orderBy('ID_SUP')->paginate(10)
        ]);
    }
    public function resetInput()
    {
        $this->ID_SUP = '';
        $this->NAMA_SUP = '';
        $this->ALAMAT_SUP = '';
    }
    public function editSupplier(int $URUT_SUPPLIER)
    {
        $supplieredit = Supplier::find($URUT_SUPPLIER);
        if ($supplieredit) {
            $this->ID_SUP = $supplieredit->ID_SUP;
            $this->NAMA_SUP = $supplieredit->NAMA_SUP;
            $this->ALAMAT_SUP = $supplieredit->ALAMAT_SUP;
        } else {
            return redirect()->to('/supplier');
        }
    }
    public function clearModal()
    {
        $this->resetInput();
    }
    public function updateSupplier()
    {
        Supplier::where('ID_SUP', $this->ID_SUP)->update([
            'NAMA_SUP' => $this->NAMA_SUP,
            'ALAMAT_SUP' => $this->ALAMAT_SUP,
        ]);
        return redirect('/supplier')->with('message', 'Supplier berhasil diedit');
    }
    public function deleteSupplier()
    {
        Supplier::where('ID_SUP', $this->ID_SUP)->update([
            'STATUS_DELETE' => 1
        ]);

        return redirect('/supplier')->with('message', 'Supplier berhasil dihapus');
    }
}
