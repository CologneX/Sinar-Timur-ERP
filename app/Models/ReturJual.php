<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturJual extends Model
{
    public $timestamps = false;
    protected $table = 'RETUR_PENJUALAN';
    protected $fillable = [
        'ID_PELANGGAN', 'ID_BARANG', 'JUMLAH', 'TANGGAL', 'STATUS_DELETE'
    ];
}
