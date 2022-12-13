<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelPelanggan extends Component
{
    public $ID_PEL, $NAMA_PEL, $ALAMAT, $NOTELP, $URUT_PELANGGAN;
    public $cariPelanggan = '';
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        return view('livewire.tabel-pelanggan', [
            'pelanggan' => DB::table('PELANGGAN')->where('STATUS_DEL', '0')->where('NAMA_PEL', 'like', '%' . $this->cariPelanggan . '%')->orderBy('ID_PEL')->paginate(10)
        ]);
    }
    public function tambahPelanggan()
    {
        $this->validate([
            'NAMA_PEL' => 'required',
            'ALAMAT' => 'required',
            'NOTELP' => 'required',
        ]);
        DB::table('PELANGGAN')->insert([
            'NAMA_PEL' => $this->NAMA_PEL,
            'ALAMAT' => $this->ALAMAT,
            'NOTELP' => $this->NOTELP,
        ]);
        $this->resetInput();
        session()->flash('message', 'Pelanggan berhasil ditambahkan.');
    }
    public function resetInput()
    {
        $this->ID_PEL = '';
        $this->NAMA_PEL = '';
        $this->ALAMAT = '';
        $this->NOTELP = '';
    }
    public function editPelanggan(int $URUT_PELANGGAN)
    {
        $pelangganedit = DB::table('PELANGGAN')->where('URUT_PELANGGAN', $URUT_PELANGGAN)->first();
        if ($pelangganedit) {
            $this->ID_PEL = $pelangganedit->ID_PEL;
            $this->NAMA_PEL = $pelangganedit->NAMA_PEL;
            $this->ALAMAT = $pelangganedit->ALAMAT;
            $this->NOTELP = $pelangganedit->NOTELP;
        } else {
            return redirect()->to('/pelanggan');
        }
    }
    public function updatePelanggan()
    {
        DB::table('PELANGGAN')->where('ID_PEL', $this->ID_PEL)->update([
            'NAMA_PEL' => $this->NAMA_PEL,
            'ALAMAT' => $this->ALAMAT,
            'NOTELP' => $this->NOTELP,
        ]);
        $this->resetInput();
        session()->flash('message', 'Pelanggan berhasil diupdate.');
    }
    public function deletePelanggan()
    {
        DB::table('PELANGGAN')->where('ID_PEL', $this->ID_PEL)->update([
            'STATUS_DEL' => 1
        ]);

        session()->flash('message', 'Pelanggan berhasil dihapus.');
    }
}
