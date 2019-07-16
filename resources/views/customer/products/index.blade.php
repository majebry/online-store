{{-- Loading a parent layout view --}}
@extends('layouts.master')

{{-- Embedding a code inside specific section defined in the parent layout view --}}
@section('content')

<div class="row">
    @foreach($products as $product)
        <div class="col-xl-3 col-lg-6">
            <div class="card mb-4">

            <img src="{{ asset($product->image ) }}" alt="" class="card-img-top">

                <div class="card-body">
                <h3 class="card-title">{{ $product->name }}</h3>
                    <p class="card-text text-muted">{{ $product->description }}</p>
                    <h2>
                    <span class="card-text badge badge-success badge-lg">{{ $product->price }}</span>
                    </h2>
                </div>

                <div class="card-footer text-warning">
                    <div class="span text-muted text-sm">{{ $product->category->name }}</div>

                    <input class="rating" data-id="{{ $product->id }}" value="{{ $product->averageRating }}">

                </div>
            </div>
          </div>
    @endforeach
</div>


        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>

        <script src="{{ asset("js/simple-rating.js") }}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('.rating').rating();
            });
        </script>
@endsection
