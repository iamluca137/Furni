<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function paypal(Request $request)
    {
        $request->validate([
            'c_fname' => 'required',
            'c_address' => 'required',
            'c_city' => 'required',
            'c_email' => 'required|email',
            'c_phone' => 'required|regex:/(0)[0-9]{9}/',
        ], [
            'c_fname.required' => 'First name is required',
            'c_address.required' => 'Address is required',
            'c_city.required' => 'City is required',
            'c_email.required' => 'Email is required',
            'c_email.email' => 'Email is invalid',
            'c_phone.required' => 'Phone is required',
            'c_phone.regex' => 'Phone is invalid',
        ]);

        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
        $subTotal = 0;
        foreach ($cartProducts as $cartProduct) {
            $subTotal += $cartProduct->product->price * $cartProduct->quantity;
        }

        if (Cache::has('discount')) {
            $discountData = Cache::get('discount');
            $coupon = $discountData['code'];
            $discount = $discountData['discount'];
        } else {
            $coupon = null;
            $discount = 0;
        }

        $total = sprintf("%.2f", $subTotal - $discount);
        // data for checkout
        $dataCheckout = [
            'c_country' => $request->c_country,
            'c_fname' => $request->c_fname,
            'c_lname' => $request->c_lname,
            'c_address' => $request->c_address,
            'c_city' => $request->c_city,
            'c_postal_zip' => $request->c_postal_zip,
            'c_email' => $request->c_email,
            'c_phone' => $request->c_phone,
            'c_order_notes' => $request->c_order_notes,
            'cartProducts' => $cartProducts,
            'subTotal' => $subTotal,
            'coupon' => $coupon,
            'discount' => $discount,
            'total' => $total,
        ];

        session()->put('dataCheckout', $dataCheckout);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success'),
                "cancel_url" => route('cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $total
                    ]
                ]
            ]
        ]);

        // dd($response);

        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->back()->with('errorCheckout', 'Something went wrong');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);
        // dd($response);

        $dataCheckout = session()->get('dataCheckout');
        // dd($dataCheckout);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            // Insert data into database 
            //payment_id	amount	payer_name	payer_email	payment_status	payment_method 	
            $payment = new Payment();
            $payment->payment_id = $response['id'];
            $payment->amount = $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'];
            $payment->payer_name = $response['payer']['name']['given_name'];
            $payment->payer_email = $response['payer']['email_address'];
            $payment->payment_status = $response['status'];
            $payment->payment_method = "PayPal";
            $payment->save();

            $order = [
                'order_status_id' => 1,
                'payment_id' => $payment->payment_id,
                'user_id' => auth()->user()->id,
                'discount' => $dataCheckout['discount'],
                'total_amount' => $dataCheckout['total'],
                'country' => $dataCheckout['c_country'],
                'city' => $dataCheckout['c_city'],
                'first_name' => $dataCheckout['c_fname'],
                'last_name' => $dataCheckout['c_lname'],
                'address' => $dataCheckout['c_address'],
                'zip_code' => $dataCheckout['c_postal_zip'],
                'phone' => $dataCheckout['c_phone'],
                'email' => $dataCheckout['c_email'],
                'note' => $dataCheckout['c_order_notes'],
            ];

            $order = Order::create($order);
            // update coupon quantity
            if ($dataCheckout['coupon']) {
                $coupon = Coupon::where('code', $dataCheckout['coupon'])->first();
                $coupon->quantity -= 1;
                $coupon->save();
                // remove discount from cache
                Cache::forget('discount');
            }

            foreach ($dataCheckout['cartProducts'] as $cartProduct) {
                $orderProduct = [
                    'order_id' => $order->id,
                    'product_id' => $cartProduct->product_id,
                    'quantity' => $cartProduct->quantity,
                ];
                OrderProduct::create($orderProduct);
                $cartProduct->delete();
                // Update quantity in stock
                $product = Product::find($cartProduct->product_id);
                $product->quantity -= $cartProduct->quantity;
                $product->save();
            }
            return redirect()->route('thankyou');
        } else {
            return redirect()->route('cancel');
        }
    }

    public function cancel()
    {
        return redirect()->route('checkout');
    }
}
