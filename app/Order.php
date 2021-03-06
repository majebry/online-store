<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }
}
