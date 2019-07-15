<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Rateable;
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
