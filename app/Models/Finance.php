<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dit;

class Finance extends Model
{
    protected $guarded = [];
    protected $appends = ['total_bayar_ppn'];

    public function getTotalBayarPpnAttribute()
    {
        $PPn = $this->attributes['total_bayar'] * 0.1;
        return $this->attributes['total_bayar'] + $PPn;
    }

    public function HistoryPembayaran()
    {
        return $this->hasMany('App\Models\HistoryPembayaran');
    }
}
