<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function purchase()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        foreach ($orders as $order) {
            $order->products = OrderProduct::where('order_id', $order->id)->get()->toArray();
        }
        return view('user.purchase', compact('orders'));
    }
}
