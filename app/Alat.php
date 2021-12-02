<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name', 
        'nopol', 
        'sts',
    ];
}
