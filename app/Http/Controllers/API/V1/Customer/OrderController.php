<?php

namespace App\Http\Controllers\API\V1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\OrderItem;
use App\Order;

class OrderController extends Controller
{
    public function checkout()
    {
        // add cart items to order
        $order = auth('api_customer')->user()->orders()->save(new Order);

        $authenticated_customer_cart = auth('api_customer')->user()->cart;
        $cart_items = $authenticated_customer_cart->items;

        foreach($cart_items as $cart_item) {
            $price = $cart_item->product->price;

            $new_order_item = new OrderItem;
            $new_order_item->product_id = $cart_item->product_id;
            $new_order_item->price = $price;

            $order->items()->save($new_order_item);
        }

        // empty the cart
        auth('api_customer')->user()->cart->items()->delete();

        return response()->json($order);
    }
}
