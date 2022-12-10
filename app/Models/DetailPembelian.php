<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    // protected  $primaryKey = 'ID_TRANSBELI';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'DETAIL_PEMBELIAN';
    protected $fillable = [
        'ID_BARANG', 'KUANTITAS_BELI'
    ];
}
