<?php

namespace App\Http\Controllers\API\V1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function store()
    {
        // auth('customer')->user()->cart()->items()->save($item);
    }
}
