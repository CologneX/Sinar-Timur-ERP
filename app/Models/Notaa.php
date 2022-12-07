<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notaa extends Model
{
    public $timestamp = false;
    public $incrementing = false;
    protected $table = 'DETAIL_TRANSAKSI';
    protected $fillable = ['ID_BARANG', 'KUANTITAS_JUAL'];
}

