@extends('admin.layouts.app')

@section('content')
<a href="{{ url('admin/products/create') }}" class="btn btn-primary mb-4">Create new Product</a>

@if ($products->count())
<table class="table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Categoy</th>
            <th>Created At</th>
            <th>Actions</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category ? $product->category->name : '' }}</td>
                <td>{{ $product->created_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ url("admin/products/{$product->id}/edit") }}" class="btn btn-warning">Edit</a>

                    <form action="{{ url("admin/products/{$product->id}") }}" method="post" style="display:inline;">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $products->links() }}
@else
<div class="alert alert-warning">No Data!</div>
@endif

@endsection
