<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksialat extends Model
{
    protected $table = 'transaksi_alat';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'invoice_id', 
        'tanggal', 
        'alat_id', 
        'sts', 
    ];

    function alat(){
        return $this->belongsTo('App\Alat','alat_id','id');
    }
}
