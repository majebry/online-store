@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ $order->customer->name }}</h4>
        </div>

        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                </tr>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->price }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

        <div class="card-footer">
            <p class="text-muted">{{ $order->created_at->diffForHumans() }}</p>
        </div>
    </div>
@endsection
