<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    protected $table = 'tagihan';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name', 
        'kode_vendor', 
        'invoice', 
        'tanggal',
        'file',
        'nilai',
        'create',
        'sts',
        'role_id',
        'tagihan',
        'alat_id',
    ];

    function status(){
        return $this->belongsTo('App\Statustagihan','sts','id');
    }
}
