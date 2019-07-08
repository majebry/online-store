@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('admin/categories/' . $category->id) }}" method="post">
            @csrf
            {{ method_field('PATCH') }}

            <div class="form-group">
                <input type="text" name="category_name" class="form-control" value="{{ $category->name }}">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection

