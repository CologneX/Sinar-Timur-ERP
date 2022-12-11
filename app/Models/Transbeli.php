<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transBeli extends Model
{
    public $timestamp = false;
    public $incrementing = false;
    protected $table = 'TRANSAKSI_PEMBELIAN';
    protected $fillable = [];
}
