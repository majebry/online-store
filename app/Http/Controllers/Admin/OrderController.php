<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index')->with('orders', Order::all());
    }

    /**
     * show order details
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $order = Order::find($id);

        return view('admin.orders.show')->with('order', $order);
    }
}
