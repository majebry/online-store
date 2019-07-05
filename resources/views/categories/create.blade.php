@extends('layouts.master')

@section('content')
<form action="{{ url('categories') }}" method="post">
    @csrf

    <input type="text" name="category_name">

    <input type="submit">
</form>
@endsection
