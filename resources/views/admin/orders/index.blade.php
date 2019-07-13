@extends('admin.layouts.app')

@section('content')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>Customer Name</td>
            <td>Total</td>
            <td>Created At</td>
            <td>Actions</td>
        </tr>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>{{ $order->items()->sum('price') }}</td>
                <td>{{ $order->created_at }}</td>
                <td>
                    <a href="{{ url('admin/orders/{id}') }}" class="btn btn-info">View Items</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
