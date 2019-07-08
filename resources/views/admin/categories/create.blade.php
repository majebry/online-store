@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Add new Category</h3>
    </div>
    <div class="card-body">
        <form action="{{ url('admin/categories') }}" method="post">
            @csrf

            <div class="form-group">
                <input type="text" name="category_name" class="form-control">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection
