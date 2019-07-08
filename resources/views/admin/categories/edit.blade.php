@extends('admin.layouts.app')

@section('content')
<form action="{{ url('admin/categories/' . $category->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <input type="text" name="category_name" value="{{ $category->name }}">

    <input type="submit">
</form>
@endsection
