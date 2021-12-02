<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $table = 'vendor';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name', 
        'email', 
        'alamat',
        'telepon',
        'kode_vendor',
    ];
}
