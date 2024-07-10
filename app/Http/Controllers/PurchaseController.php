<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderStatusRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\ImageProduct;
use App\Models\Invoice;
use App\Models\OrderStatus;
use App\Models\Product;
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
}
