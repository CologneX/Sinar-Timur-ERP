<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected  $primaryKey = 'ID_PEL';

    public $timestamps = false;
    protected $table = 'PELANGGAN';
    protected $fillable = [
        'NAMA_PEL', 'ALAMAT', 'NOTELP'
    ];
}

