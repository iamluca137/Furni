<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOrderStatusRequest;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderStatus;
use App\Models\Payment;
use App\Models\Product; 

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('admin.orders.list', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $orderProducts = OrderProduct::where('order_id', $order->id)->get();
        $statuses = OrderStatus::all();
        $order->payment_method == 'PayPal' ? $payment = Payment::where('payment_id', $order->payment_id)->first() : $payment = null;
        return view('admin.orders.edit', compact('order', 'statuses', 'orderProducts', 'payment'));
    }

    public function update(UpdateOrderStatusRequest $request, $id)
    {
        // 1 - Processing
        // 2 - Shipping
        // 3 - Completed
        // 4 - Cancelled
        // 5 - Returns/Refunds  

        $order = Order::find($id);
        $order->order_status_id = $request->status;

        $order->save();
        if ($order->order_status_id == 3 && !Invoice::where('order_id', $order->id)->exists()) {
            $orderProducts = OrderProduct::where('order_id', $order->id)->get();
            $subTotal = 0;
            foreach ($orderProducts as $orderProduct) {
                $product = Product::find($orderProduct['product_id']);
                $subTotal += $orderProduct['quantity'] * $product->price;
            }
            $dataInvoice = [
                'invoice_id' => 'INV/' . $order->id,
                'address' => $order->address,
                'city' => $order->city,
                'country' => $order->country,
                'email' => $order->email,
                'order_id' => $order->id,
                'sub_total' => (string)$subTotal,
                'discount' => $order->discount,
                'total' => $order->total_amount,
                'date' => date('F d, Y', strtotime(now())),
            ];

            Invoice::create($dataInvoice);
        }

        return redirect()->route('admin.order')->with('success', 'Order updated successfully');
    }

    public function invoice($id)
    {
        $invoice = Invoice::where('order_id', $id)->first();
        return view('invoice.invoice', compact('invoice'));
    }
}
