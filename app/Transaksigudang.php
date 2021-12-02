<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksigudang extends Model
{
    protected $table = 'transaksi_gudang';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'transaksi', 
        'gudang_id', 
        'invoice_id', 
        'tanggal', 
        'qty', 
        'sts', 
    ];

    function gudang(){
        return $this->belongsTo('App\Gudang','gudang_id','id');
    }
}
