<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    protected $appends = ['total_bayar_ppn'];

    /**
     * Many to many relationship
     */
    public function barangs()
    {
        return $this->belongsToMany('App\Models\Barang');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function finance()
    {
        return $this->belongsTo('App\Models\Finance', 'id', 'order_id');
    }

    public function serahterima()   
    {
        return $this->hasOne('App\SerahTerima', 'id_order', 'id');
    }

    public function tod()
    {
        return $this->hasMany('App\TransferOfDoc');
    }

    public function getTotalBayarPpnAttribute()
    {

        $lag = $this->attributes['LAG'];
        return $lag;
    }

    protected $hidden = [
        'perjanjian_kerja',
    ];
}
