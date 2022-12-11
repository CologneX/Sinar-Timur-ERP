<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelBarang extends Component
{
    public $ID_BARANG, $NAMA_BARANG, $HARGA, $STOK, $LOKASI, $URUT_BARANG;
    public $cariBarang = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {

        return view('livewire.tabel-barang', [
            'barang' => DB::table('BARANG')->where('NAMA_BARANG', 'like', '%' . $this->cariBarang . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10)

        ]);
    }


    public function editBarang(int $URUT_BARANG)
    {

        $barang = Barang::find($URUT_BARANG);
        if ($barang) {
            $this->ID_BARANG = $barang->ID_BARANG;
            $this->NAMA_BARANG = $barang->NAMA_BARANG;
            $this->HARGA = $barang->HARGA;
            $this->STOK = $barang->STOK;
            $this->LOKASI = $barang->LOKASI;
        } else {
            return redirect()->to('/barang');
        }
    }
    public function resetInput()
    {
        $this->ID_BARANG = '';
        $this->NAMA_BARANG = '';
        $this->HARGA = '';
        $this->STOK = '';
        $this->LOKASI = '';
    }
    public function clearModal()
    {
        $this->resetInput();
    }

    public function updateBarang()
    {
        Barang::where('ID_BARANG', $this->ID_BARANG)->update([
            'NAMA_BARANG' => $this->NAMA_BARANG,
            'HARGA' => $this->HARGA,
            'STOK' => $this->STOK,
            'LOKASI' => $this->LOKASI,
        ]);
        return redirect('/barang')->with('message', 'Barang berhasil diedit');
    }
    public function deleteBarang()
    {
        Barang::where('ID_BARANG', $this->ID_BARANG)->update([
            'STATUS_DELETE' => 1
        ]);

        return redirect('/barang')->with('message', 'Barang berhasil dihapus');
    }
}
