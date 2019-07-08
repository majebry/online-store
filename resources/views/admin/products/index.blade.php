@extends('admin.layouts.app')

@section('content')
<a href="{{ url('admin/products/create') }}" class="btn btn-primary">Create new Product</a>

<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Image</th>
        <th>Categoy</th>
        <th>Actions</th>
    </tr>
    @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->price }}</td>
        <td><img height="200" src="{{ asset($product->image ) }}"></td>
            <td>{{ $product->category ? $product->category->name : '' }}</td>
            <td>
                <a href="{{ url('admin/products/' . $product->id . '/edit') }}" class="btn btn-warning">Edit</a>
                <a href="{{ url('admin/products/' . $product->id) }}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
    @endforeach
</table>
@endsection
