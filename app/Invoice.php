<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoice';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'name', 
        'kode_customer', 
        'invoice', 
        'tanggal',
        'file',
        'nilai',
        'create',
        'sts',
        'role_id',
        'bulan',
        'tahun',
        'nomor',
        'kategori',
    ];

    function status(){
        return $this->belongsTo('App\Statusinvoice','sts','id');
    }

    function getcustomer(){
        return $this->belongsTo('App\Customer','kode_customer','kode_customer');
    }
}
