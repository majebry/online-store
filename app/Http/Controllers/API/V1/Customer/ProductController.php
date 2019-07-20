<?php

namespace App\Http\Controllers\API\V1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category');

        // order by
        if (request()->order_by_method) {
            $products->orderBy('id', request()->order_by_method);
        }

        // filter by name
        if (request()->name) {
            $products->where('name', 'LIKE', '%' . request()->name . '%');
        }

        // between price
        if (request()->price_greater_than) {
            $products->where('price', '>=', request()->price_greater_than);
        }

        if (request()->price_lower_than) {
            $products->where('price', '<=', request()->price_lower_than);
        }

        // filter between date
        if (request()->date_before) {
            $products->whereDate('created_at', '<', request()->date_before);
        }

        if (request()->date_after) {
            $products->whereDate('created_at', '>', request()->date_);
        }

        // filter by category
        if (request()->category) {
            $products->whereHas('category');
        }

        if (request()->category_name) {
            $products->whereHas('category', function ($q) {
                $q->where('name', request()->category_name);
            });
        }

        // $products->whereDoesntHave('category');

        return response()->json($products->paginate());
    }
}
