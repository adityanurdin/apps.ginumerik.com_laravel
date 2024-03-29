<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $guarded = [];
    
    /**
     * Many to many relationship
     */
    public function orders()
    {
        return $this->belongsToMany('App\Models\Order', 'barang_order');
    }

    public function KartuAlat()
    {
        return $this->hasOne('App\Models\KartuAlat', 'barang_id');
    }

}
