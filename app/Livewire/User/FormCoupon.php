<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use Illuminate\Support\Facades\Cache;

class FormCoupon extends Component
{
    public $coupon_code = '';

    public function checkCoupon()
    {
        $coupon = Coupon::where('code', trim($this->coupon_code))->first();
        if ($coupon) {
            // check time
            $now = date('Y-m-d H:i:s');
            if ($now < $coupon->valid_from || $now > $coupon->valid_until) {
                return redirect()->back()->with('error', 'Coupon is not valid');
            }
            // check quantity
            if ($coupon->quantity <= 0) {
                return redirect()->back()->with('error', 'Coupon is expired');
            }
            $user = auth()->user();
            $cart = Cart::where('user_id', $user->id)->first();
            $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
            $total = 0;
            foreach ($cartProducts as $cartProduct) {
                $total += $cartProduct->product->price * $cartProduct->quantity;
            }
            $totalDiscount = $total * $coupon->discount / 100;
            $discount = [
                'code' => $coupon->code,
                'discount' => $totalDiscount,
            ];

            Cache::put('discount',  $discount, now()->addMinutes(2000));

            return redirect()->back()->with('discount', $discount);
        } else {
            return redirect()->back()->with('error', 'Invalid coupon code');
        }
    }

    public function removeCoupon()
    {
        Cache::forget('discount');
        return redirect()->back();
    }

    public function render()
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
        $discount = Cache::get('discount') ? Cache::get('discount') : null;

        return view('livewire.user.form-coupon', compact('cartProducts', 'discount'));
    }
}
