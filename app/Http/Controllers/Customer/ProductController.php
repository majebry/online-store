<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use willvincent\Rateable\Rating;
use App\Customer;

class ProductController extends Controller
{
    public function index()
    {
        // Let the model get us all products from the database
        $products = Product::all();

        // Append retrieved products to a view, and return that view as a response
        return view('customer.products.index')->with('products', $products);
    }

    public function rate($id)
    {
        if (auth('customer')->check()) {
            $rating = new Rating;
            $rating->rating = request()->rating;
            $rating->customer_id = auth('customer')->id();
            return Product::find($id)->ratings()->save($rating);
        }

        return '';
    }
}
