<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ReturJual;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class TabelReturJual extends Component
{
    public $KUANTITAS_RETURJUAL, $ID_BARANG;
    protected $max;
    public $carireturjual = '';
    public $ID_TRANSJUAL;
    use WithPagination;
    protected $messages = [
        'KUANTITAS_RETURJUAL.required' => 'Kuantitas Retur Jual tidak boleh kosong',
        'KUANTITAS_RETURJUAL.numeric' => 'Kuantitas Retur Jual harus berupa angka',
        'KUANTITAS_RETURJUAL.max' => 'Kuantitas Retur Jual harus dibawah :max',
        'KUANTITAS_RETURJUAL.min' => 'Kuantitas Retur Jual harus diatas :min',
        'ID_TRANSJUAL.required' => 'ID Transaksi Penjualan tidak boleh kosong',
        'ID_BARANG.required' => 'ID Barang tidak boleh kosong',
        'ID_BARANG.in' => 'ID Barang tidak ada dalam penjualan',
    ];
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
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
            'ID_BARANG' => 'required|' . Rule::in(DB::table('DETAIL_TRANSAKSI')->where('ID_TRANSJUAL', $this->ID_TRANSJUAL)->pluck('ID_BARANG')->toArray()),
        ]);
        DB::table('RETUR_PENJUALAN')->insert(['KUANTITAS_RETURJUAL' => $this->KUANTITAS_RETURJUAL, 'ID_TRANSJUAL' => $this->ID_TRANSJUAL, 'ID_BARANG_RETURJUAL' => $this->ID_BARANG]);
        session()->flash('message', 'Retur dengan ID Penjualan ' . $this->ID_TRANSJUAL . ' berhasil ditambahkan');
        $this->resetInput();
    }
}
