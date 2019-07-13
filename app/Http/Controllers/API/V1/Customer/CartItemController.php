<?php

namespace App\Http\Controllers\API\V1\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CartItem;
use App\Cart;

class CartItemController extends Controller
{
    public function index()
    {
        $cart_items = $this->authenticated_customer_cart()->items()->with('product', 'cart', 'cart.customer')->get();

        return response()->json($cart_items);
    }

    public function store()
    {
        $cart_item = new CartItem;
        $cart_item->product_id = request()->product_id;
        // quantity

        return $this->authenticated_customer_cart()->items()->save($cart_item);
    }

    public function destroy($id)
    {
        $this->authenticated_customer_cart()->items()->find($id)->delete();

        return response()->json(null, 204);
    }

    private function authenticated_customer_cart()
    {
        $authenticated_customer = auth('api_customer')->user();
        // $authenticated_customer->cart

        // If the customer doesn't already has a cart, we will give them a new one
        return $authenticated_customer->cart ?: $authenticated_customer->cart()->save(new Cart());

        // $test = $authenticated_customer->cart != null ?
        //     $authenticated_customer->cart
        //      : $authenticated_customer->cart()->save(new Cart());

        //      return $test;
    }
}
