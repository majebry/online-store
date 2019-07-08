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
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                </div>

                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" class="form-control">
                        @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name}}</option>
                        @endforeach
                    </select>
                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control">
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control"></textarea>
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                </div>

                <div class="form-group">
                    <input type="submit" value="Create" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>

@endsection
