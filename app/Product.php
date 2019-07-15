<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Product extends Model
{
    use Rateable;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
