<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('admin.orders.list', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $order->products = OrderProduct::where('order_id', $order->id)->get()->toArray();
        if ($order->payment_method == 'PayPal') {
            $payment = Payment::where('payment_id', $order->payment_id)->first();
            return view('admin.orders.edit', compact('order', 'payment'));
        } else {
            return view('admin.orders.edit', compact('order'));
        }
    }

    public function invoice($id)
    {
        // $order = Order::find($id);
        // $order->products = OrderProduct::where('order_id', $order->id)->get()->toArray();
        // return view('admin.orders.detail', compact('order'));
    }
}
