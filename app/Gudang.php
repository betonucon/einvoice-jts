<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    protected $table = 'gudang';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name', 
        'kode', 
    ];
}
