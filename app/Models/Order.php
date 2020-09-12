<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

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
}
