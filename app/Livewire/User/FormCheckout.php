<?php

namespace App\Livewire\User;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use Livewire\Component;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class FormCheckout extends Component
{
    public $c_fname;
    public $c_address;
    public $c_city;
    public $c_email;
    public $c_phone;
    public $c_country = 'Việt Nam'; // default country is 'Việt Nam
    public $c_lname;
    public $c_postal_zip;
    public $c_order_notes;

    protected $rules = [
        
    ];

    // custom message for validation
    protected $messages = [
        
    ];

    public function paypal()
    {
        // $this->validate();

        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
        $subTotal = 0;
        foreach ($cartProducts as $cartProduct) {
            $subTotal += $cartProduct->product->price * $cartProduct->quantity;
        }

        $discount = session()->get('discount');
        $discountData = session('discount');
        $discount = isset($discountData['discount']) ? $discountData['discount'] : 0;
        $coupon = $discount['code'] ?? null;

        if (!empty($this->coupon) && $this->coupon != null) {
            $coupon = Coupon::where('code', $this->coupon)->first();
        } else {
            $coupon = null;
        }
        if ($coupon) {
            $discount = $subTotal * ($coupon->discount / 100);
        } else {
            $discount = 0;
        }

        $total = $subTotal - $discount;
        // data for checkout
        $dataCheckout = [
            'c_country' => $this->c_country,
            'c_fname' => $this->c_fname,
            'c_lname' => $this->c_lname,
            'c_address' => $this->c_address,
            'c_city' => $this->c_city,
            'c_postal_zip' => $this->c_postal_zip,
            'c_email' => $this->c_email,
            'c_phone' => $this->c_phone,
            'c_order_notes' => $this->c_order_notes,
            'cartProducts' => $cartProducts,
            'subTotal' => $subTotal,
            'coupon' => $coupon,
            'discount' => $discount,
            'total' => $total,
        ];

        // dd($dataCheckout);

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
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function render()
    {
        return view('livewire.user.form-checkout');
    }
}
