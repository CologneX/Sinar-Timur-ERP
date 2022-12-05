<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{

    protected  $primaryKey = 'URUT_BARANG';
    public $incrementing = false;

    public $timestamps = false;
    protected $table = 'BARANG';

}
