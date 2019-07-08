{{-- Loading a parent layout view --}}
@extends('admin.layouts.app')

{{-- Embedding a code inside specific section defined in the parent layout view --}}
@section('content')

    <div class="card">
        <div class="card-header">
            <h2>Add New Product</h2>
        </div>
        <div class="card-body">
        <form action="{{ url('admin/products') }}"  enctype="multipart/form-data" method="post">
            @csrf
                <label>Name</label>
                <input type="text" name="name" class="form-control">

                <label>Category</label>
                <select name="category_id" class="form-control">
                    @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name}}</option>
                    @endforeach
                </select>

                <label>Price</label>
                <input type="number" name="price" class="form-control">

                <label>Image</label>
                <input type="file" name="image" class="form-control">

                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>

                <input type="submit" value="Create" class="btn btn-primary">
            </form>
        </div>
    </div>

@endsection
