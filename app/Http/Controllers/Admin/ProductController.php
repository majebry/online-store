<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use \App\Product;
use Storage;
use App\Http\Controllers\Controller;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        // Let the model get us all products from the database
        $products = Product::latest()->get();

        // Append retrieved products to a view, and return that view as a response
        return view('admin.products.index')->with('products', $products);
    }

    public function create()
    {
        // Getting categories from database
        $categories = Category::all();

        // Return view contains a form that let's the user add product details and submit
        return view('admin.products.create')->with('categories', $categories);
    }

    public function store()
    {
        request()->validate([
            'name'  =>  'required|min:3',
            'category_id'   =>  'required|integer|exists:categories,id',
            'price' =>  'required|integer',
            'image' =>  'required|image',
        ]);

        // "request()->name" you can think of it as "$_POST['name']"

        // Instantiate a new product (object) from the Model Class "Product"
        $new_product = new Product;

        // Upload the image and return the path to a var
        $image_path = request()->file('image')->store('images', 'public');

        // Specifying the new product object properties, according to the data received from the POST request
        $new_product->name = request()->name;
        $new_product->price = request()->price;
        $new_product->image = $image_path; // For now we are storing an empty value for the image
        $new_product->description = request()->description;


        // Saving our new product to the database
        // $new_product->save();

        $category_id = request()->category_id;

        Category::find($category_id)->products()->save($new_product);

        // Redirecting to the products home page
        return redirect('admin/products');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $categories = Category::all();

        return view('admin/products/edit')->with('categories', $categories)->with('product', $product);
    }

    public function update($id)
    {
        request()->validate([
            'name'  =>  'required',
            'image' =>  'image',
            'price' =>  'required',
            'description'   =>  'required'
        ]);

        $product = Product::find($id);

        $product->name = request()->name;
        $product->price = request()->price;
        $product->description = request()->description;
        $product->category_id = request()->category_id;

        if (request()->image) {
            // delete the old image
            Storage::disk('public')->delete($product->image);

            // upload the new image
            $image_path = request()->file('image')->store('images', 'public');

            $product->image = $image_path;
        }

        $product->save();

        return redirect('admin/products');
    }

    public function destroy($id)
    {
        // Getting a specific product object using the "Product" Model Class static method "find()",
        // which get the desired product by its ID
        $product = Product::find($id);

        // Execute delete query for that specific product
        $product->delete();

        // Redirecting to the products home page
        return redirect('admin/products');
    }
}
