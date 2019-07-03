<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Product;

class ProductController extends Controller
{
    public function index()
    {
        // Let the model get us all products from the database
        $products = Product::all();

        // Append retrieved products to a view, and return that view as a response
        return view('products.index')->with('products', $products);
    }

    public function create()
    {
        // Return view contains a form that let's the user add product details and submit
        return view('products.create');
    }

    public function store()
    {
        // "request()->name" you can think of it as "$_POST['name']"

        // Instantiate a new product (object) from the Model Class "Product"
        $new_product = new Product;

        // Specifying the new product object properties, according to the data received from the POST request
        $new_product->name = request()->name;
        $new_product->price = request()->price;
        $new_product->image = ''; // For now we are storing an empty value for the image
        $new_product->description = request()->description;

        // Saving our new product to the database
        $new_product->save();

        // Redirecting to the products home page
        return redirect('products');
    }

    public function destroy($id)
    {
        // Getting a specific product object using the "Product" Model Class static method "find()",
        // which get the desired product by its ID
        $product = Product::find($id);

        // Execute delete query for that specific product
        $product->delete();

        // Redirecting to the products home page
        return redirect('products');
    }
}
