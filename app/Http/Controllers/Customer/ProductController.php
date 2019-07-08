<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Let the model get us all products from the database
        $products = Product::all();

        // Append retrieved products to a view, and return that view as a response
        return view('customer.products.index')->with('products', $products);
    }
}
