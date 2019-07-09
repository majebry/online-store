{{-- Loading a parent layout view --}}
@extends('admin.layouts.app')

{{-- Embedding a code inside specific section defined in the parent layout view --}}
@section('content')



    <div class="card">
        <div class="card-header">
            <h2>Edit Product</h2>
        </div>
        <div class="card-body">
        <form action="{{ url("admin/products/{$product->id}") }}"  enctype="multipart/form-data" method="post">
            @csrf
            {{ method_field('PATCH') }}
                <div class="form-group">
                    <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            @if ($category->id == $product->category_id)
                            selected
                            @endif
                            >
                            {{ $category->name}}
                        </option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control" onchange="document.getElementById('myImage').remove()">
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                    <span>
                        <img src="{{ asset($product->image) }}" height="150" id="myImage">
                    </span>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>

                <div class="form-group">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

    @endsection
