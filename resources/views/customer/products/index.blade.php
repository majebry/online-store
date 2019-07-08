{{-- Loading a parent layout view --}}
@extends('layouts.master')

{{-- Embedding a code inside specific section defined in the parent layout view --}}
@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-xl-3 col-lg-6">
            <div class="card mb-4">

                <img src="product_images/casual-mens-outerwear.jpg" alt="" class="card-img-top">

                <div class="card-body">
                <h3 class="card-title">{{ $product->name }}</h3>
                    <p class="card-text text-muted">{{ $product->description }}</p>
                    <h2>
                    <span class="card-text badge badge-success badge-lg">{{ $product->price }}</span>
                    </h2>
                </div>

                <div class="card-footer text-warning">
                    &#9733; &#9733; &#9733; &#9733; &#9734;

                <div class="text-right"><button onclick="document.getElementById('delete-form-{{ $product->id }}').submit()" class="btn btn-danger btn-sm">Delete</button></div>

                <form style="display: none;" id="delete-form-{{ $product->id }}" action="{{ url('products/' . $product->id) }}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit">
                </form>
                </div>
            </div>
          </div>
    @endforeach
</div>

@endsection
