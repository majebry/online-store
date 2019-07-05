<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store()
    {
        $category = new Category;
        $category->name = request()->category_name; // request()->category_name ===> $_POST['category_name']
        $category->save();

        return redirect('categories');
    }

}
