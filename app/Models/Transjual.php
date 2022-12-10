<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transJual extends Model
{
    public $primaryKey = 'URUT_TRANSJUAL';
    public $timestamp = false;
    public $incrementing = false;
    protected $table = 'TRANSAKSI_PENJUALAN';
    protected $fillable = [];

}
