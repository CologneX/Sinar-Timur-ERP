<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pelanggan;
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
            'pelanggan' => DB::table('PELANGGAN')->where('STATUS_DEL', '0')->where('NAMA_PEL', 'like','%'.$this->cariPelanggan.'%')->orderBy('ID_PEL')->paginate(10)
        ]);
    }
    public function resetInput()
    {
        $this->ID_PEL = '';
        $this->NAMA_PEL = '';
        $this->ALAMAT = '';
        $this->NOTELP = '';
    }
    public function tambahPelanggan()
    {
        $this->validate([
            'NAMA_PEL' => 'required',
            'ALAMAT' => 'required',
            'NOTELP' => 'required',
        ]);
        Pelanggan::create([
            'NAMA_PEL' => $this->NAMA_PEL,
            'ALAMAT' => $this->ALAMAT,
            'NOTELP' => $this->NOTELP,
        ]);
        $this->resetInput();
        session()->flash('message', 'Pelanggan berhasil ditambahkan');
    }

    public function editPelanggan(int $URUT_PELANGGAN)
    {
        $pelangganedit= DB::table('PELANGGAN')->find($URUT_PELANGGAN);
        if($pelangganedit){
            $this->ID_PEL = $pelangganedit->ID_PEL;
            $this->NAMA_PEL = $pelangganedit->NAMA_PEL;
            $this->ALAMAT = $pelangganedit->ALAMAT;
            $this->NOTELP = $pelangganedit->NOTELP;
        }else{
            return redirect()->to('/pelanggan');
        }
    }
    public function clearModal()
    {
        $this->resetInput();
    }
    public function updatePelanggan()
    {
        DB::table('PELANGGAN')->where('ID_PEL', $this->ID_PEL)->update([
            'NAMA_PEL' => $this->NAMA_PEL,
            'ALAMAT' => $this->ALAMAT,
            'NOTELP' => $this->NOTELP,
        ]);
        return redirect('/pelanggan')->with('message', 'Pelanggan berhasil diedit');
    }
    public function deletePelanggan(){
        DB::table('PELANGGAN')->where('ID_PEL', $this->ID_PEL)->update([
            'STATUS_DEL' => 1
        ]);

        return redirect('/pelanggan')->with('message', 'Pelanggan berhasil dihapus');
    }
}
