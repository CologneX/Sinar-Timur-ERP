<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReturJual;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TabelReturJual extends Component
{
    public $KUANTITAS_RETURJUAL, $ID_BARANG;
    protected $max;
    public $carireturjual = '';
    public $ID_TRANSJUAL = '';
    use WithPagination;
    protected $messages = [
        'KUANTITAS_RETURJUAL.required' => 'Kuantitas Retur Jual tidak boleh kosong',
        'KUANTITAS_RETURJUAL.numeric' => 'Kuantitas Retur Jual harus berupa angka',
        'KUANTITAS_RETURJUAL.max' => 'Kuantitas Retur Jual harus dibawah :max',
        'KUANTITAS_RETURJUAL.min' => 'Kuantitas Retur Jual harus dibawah :min',
        'ID_TRANSJUAL.required' => 'ID Transaksi Penjualan tidak boleh kosong',
        'ID_BARANG.required' => 'ID Barang tidak boleh kosong',
    ];
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        // if(!empty($this->ID_TRANSJUAL)){
        //     $this->barangBeli = DB::table('DETAIL_TRANSAKSI')->where('ID_TRANSJUAL', 'TJ221213001')->get();
        // }
        // else{
        //     $this->barangBeli = DB::table('DETAIL_TRANSAKSI')->where('ID_TRANSJUAL', $this->ID_TRANSJUAL)->get();

        // }

        return view('livewire.tabel-retur-jual', [
            'returJual' => ReturJual::where('ID_RETURJUAL', 'like', '%' . $this->carireturjual . '%')->where('STATUS_DELETE', '0')->orWhere('ID_TRANSJUAL', 'like', '%' . $this->carireturjual . '%')->orderBy('ID_RETURJUAL')->paginate(10),
            'transaksi' => DB::table('TRANSAKSI_PENJUALAN')->get(),
            'barangBeli' => DB::table('DETAIL_TRANSAKSI')->get(),

        ]);
    }
    public function resetInput()
    {
        $this->KUANTITAS_RETURJUAL = '';
    }
    public function simpanData()
    {
        $this->max = DB::table('DETAIL_TRANSAKSI')->where('ID_TRANSJUAL', $this->ID_TRANSJUAL)->where('ID_BARANG', $this->ID_BARANG)->value('KUANTITAS_JUAL');
        $this->validate([
            'KUANTITAS_RETURJUAL' => 'required|numeric|min:1|max:' . $this->max,
            'ID_TRANSJUAL' => 'required',
            'ID_BARANG' => 'required',
        ]);
        DB::table('RETUR_PENJUALAN')->insert(['KUANTITAS_RETURJUAL' => $this->KUANTITAS_RETURJUAL, 'ID_TRANSJUAL' => $this->ID_TRANSJUAL, 'ID_BARANG_RETURJUAL' => $this->ID_BARANG]);
        session()->flash('message', 'Retur dengan ID Penjualan ' . $this->ID_TRANSJUAL . ' berhasil ditambahkan');
        $this->resetInput();
    }
    public function pilihBarang()
    {
    }
}
