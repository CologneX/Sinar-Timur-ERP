<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturBeli extends Model
{
    public $timestamps = false;
    protected $table = 'RETUR_PEMBELIAN';
    protected $fillable = [
        'ID_SUPPLIER', 'ID_BARANG', 'JUMLAH', 'TANGGAL', 'STATUS_DELETE'
    ];
}
