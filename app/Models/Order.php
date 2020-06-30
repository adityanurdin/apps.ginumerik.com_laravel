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
}
