<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{

    public function purchase()
    {
        $user = auth()->user();
        $orders = Order::where('user_id', $user->id)->get();
        // $orders = DB::table('orders')
        //     ->join('customers', 'orders.customer_id', '=', 'customers.id')
        //     ->select('orders.*', 'customers.*')
        //     ->get();
        // $orders = DB::table('orders')
        //     ->join('users', 'orders.user_id', '=', 'users.id')
        //     ->select('orders.*', 'users.*')
        //     ->where('orders.user_id', 3)
        //     ->get()->toArray();

        // dd($orders);

        foreach ($orders as $order) {
            $order->products = OrderProduct::where('order_id', $order->id)->get()->toArray();
        }
        return view('user.purchase', compact('orders'));
    }
}
