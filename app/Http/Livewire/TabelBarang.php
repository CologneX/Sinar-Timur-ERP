<?php

namespace App\Http\Livewire;

use App\Models\Barang;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBag;

class TabelBarang extends Component
{
    public $ID_BARANG, $NAMA_BARANG, $HARGA, $STOK, $LOKASI, $URUT_BARANG, $SATUAN;
    public $cariBarang = '';

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $messages = [
        'NAMA_BARANG.required' => 'Nama Barang tidak boleh kosong',
        'HARGA.numeric' => 'Harga harus berupa angka',
        'HARGA.min' => 'Harga tidak boleh kurang dari 0',
        'HARGA.required' => 'Harga tidak boleh kosong',
        'STOK.required' => 'Stok tidak boleh kosong',
        'STOK.min' => 'Stok tidak boleh kurang dari 0',
        'STOK.numeric' => 'Stok harus berupa angka',
        'ID_BARANG.required' => 'ID Barang tidak boleh kosong',
        'LOKASI.required' => 'Lokasi tidak boleh kosong',
    ];
    public function render()
    {

        return view('livewire.tabel-barang', [
            'barang' => DB::table('BARANG')->where('NAMA_BARANG', 'like', '%' . $this->cariBarang . '%')->where('STATUS_DELETE', '0')->orderBy('NAMA_BARANG')->paginate(10)
        ]);
    }

    public function simpanBarang()
    {
        $this->validate([
            'NAMA_BARANG' => 'required',
            'HARGA' => 'required|numeric|min:0',
            'STOK' => 'required|min:0|numeric',
            'SATUAN' => 'required',
            'LOKASI' => 'required'
        ]);
        DB::table('BARANG')->insert([
            'NAMA_BARANG' => $this->NAMA_BARANG,
            'HARGA' => $this->HARGA,
            'STOK' => $this->STOK,
            'SATUAN' => $this->SATUAN,
            'LOKASI' => $this->LOKASI
        ]);
        $this->resetInput();
        session()->flash('message', 'Barang sukses di tambahkan!');
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
    public function updateBarang()
    {
        $this->validate([
            'NAMA_BARANG' => 'required',
            'HARGA' => 'required',
            'STOK' => 'required|min:0',
            'LOKASI' => 'required'
        ]);
        Barang::where('ID_BARANG', $this->ID_BARANG)->update([
            'NAMA_BARANG' => $this->NAMA_BARANG,
            'HARGA' => $this->HARGA,
            'STOK' => $this->STOK,
            'LOKASI' => $this->LOKASI,
        ]);
        $this->resetInput();
        session()->flash('message', 'Barang sukses di update!');
    }
    public function deleteBarang()
    {
        Barang::where('ID_BARANG', $this->ID_BARANG)->update([
            'STATUS_DELETE' => 1
        ]);
        $this->resetInput();
        session()->flash('message', 'Barang sukses di hapus!');
    }
}
