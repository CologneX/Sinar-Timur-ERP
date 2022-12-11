<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected  $primaryKey = 'URUT_PELANGGAN';
    public $incrementing = false;

    public $timestamps = false;
    protected $table = 'PELANGGAN';
    protected $fillable = [
        'NAMA_PEL', 'ALAMAT', 'NOTELP'
    ];
}
