<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected  $primaryKey = 'ID_BARANG';

    public $timestamps = false;
    protected $table = 'BARANG';
    protected $fillable = [
        'NAMA_BARANG', 'HARGA', 'STOK', 'SATUAN', 'LOKASI'
    ];
}
