@extends('layouts.master')

@section('content')
<form action="{{ url('categories/' . $category->id) }}" method="post">
    @csrf
    {{ method_field('PATCH') }}
    <input type="text" name="category_name" value="{{ $category->name }}">

    <input type="submit">
</form>
@endsection
