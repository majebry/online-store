<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use \App\Category;
use \App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        // Getting all categories from database
        $categories = Category::all();

        // Returning a view while sending categories data to it
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        // returning a view contains a form that let's the user submit new category
        return view('admin.categories.create');
    }

    public function store()
    {
        // Creating a new category in the database based on the data submitted from the form
        $category = new Category;
        $category->name = request()->category_name; // request()->category_name ===> $_POST['category_name']
        $category->save();

        // Redirecting to the categories list page
        return redirect('admin/categories');
    }

    public function edit($id)
    {
        // returning a view contains a form that let's the user edit a specific category
        // based on the id givin in the URI
        return view('admin.categories.edit')->with('category', Category::find($id));
    }

    public function update($id)
    {
        // Updating a specific category based on the new data submitted from the form
        $category = Category::find($id);
        $category->name = request()->category_name; // request()->category_name ===> $_POST['category_name']
        $category->save();

        // Redirecting to the categories list page
        return redirect('admin/categories');
    }
}
