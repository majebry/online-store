@extends('admin.layouts.app')

@section('content')

<a href="{{  url('admin/categories/create') }}" class="btn btn-primary">Add new Category</a>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    @foreach ($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>
                <a href="{{ url('admin/categories/' . $category->id . '/edit') }}" class="btn btn-warning">Edit</a>

                <a href="" class="btn btn-danger">Delete</a>

            </td>
        </tr>
    @endforeach
</table>

@endsection
