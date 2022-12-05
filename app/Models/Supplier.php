<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected  $primaryKey = 'URUT_SUPPLIER';
    public $incrementing = false;
    public $timestamps = false;

    protected $table = 'SUPPLIER';
    protected $fillable = [
        'NAMA_SUP', 'ALAMAT_SUP'
    ];
}
