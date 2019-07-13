<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function items()
    {
        return $this->hasMany('App\CartItem');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
