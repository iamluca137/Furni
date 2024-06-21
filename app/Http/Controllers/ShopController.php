<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Coupon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ShopController extends Controller
{
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $relatedProducts = Product::where('category_product_id', $product->category_product_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
        return view('user.product-details', compact('product', 'relatedProducts'));
    }

    public function cart(Request $request)
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
        return view('user.cart', compact('cartProducts'));
    }

    public function addItemToCart(Request $request)
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $product = Product::where('slug', $request->product_slug)->first();
        // check quantity in stock or not
        if ($product->quantity < $request->quantity) {
            return redirect()->back()->with('error', 'Only ' . $product->quantity . ' items in stock');
        }
        $cartProduct = CartProduct::where('cart_id', $cart->id)
            ->where('product_id', $product->id)
            ->first();
        if ($cartProduct) {
            // Check quantity  
            if ($product->quantity == $cartProduct->quantity) {
                return redirect()->back()->with('error', 'Product already max quantity in cart');
            }

            if ($product->quantity < $cartProduct->quantity + $request->quantity) {
                return redirect()->back()->with('error', 'You can add only ' . $product->quantity - $cartProduct->quantity . ' items in stock');
            }
            // Update quantity
            $cartProduct->quantity += $request->quantity;
            $cartProduct->save();
        } else {
            $data = [
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ];
            // Add new cart product
            CartProduct::create($data);
        }
        return redirect()->route('cart');
    }

    public function removeCartItem(string $id)
    {
        if (auth()->user()) {
            $user = auth()->user();
            $cart = Cart::where('user_id', $user->id)->first();
            $cartProduct = CartProduct::where('cart_id', $cart->id)
                ->where('product_id', $id)
                ->first();
            $cartProduct->delete();
            return redirect()->route('cart');
        } else {
            return redirect()->route('login');
        }
    }

    public function checkCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon_code)->first();
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
            return redirect()->back()->with('discount', $discount);
        } else {
            return redirect()->back()->with('error', 'Invalid coupon code');
        }
    }

    public function checkout()
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();

        return view('user.checkout', compact('cartProducts'));
    }

    public function checkoutPost(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'c_country' => 'required',
        //     'c_fname' => 'required',
        //     'c_address' => 'required',
        //     'c_city' => 'required',
        //     'c_email' => 'required|email',
        //     'c_phone' => 'required|regex:/(0)[0-9]{9}/',
        // ], [
        //     'c_country' => 'Country is required',
        //     'c_fname' => 'First name is required',
        //     'c_address' => 'Address is required',
        //     'c_city' => 'City is required',
        //     'c_email' => 'Email is required',
        //     'c_email.email' => 'Email is invalid',
        //     'c_phone' => 'Phone is required',
        //     'c_phone.regex' => 'Phone is invalid',
        // ]);


        $user = auth()->user();
        $coupon = Coupon::where('code', $request->c_coupon)->first();
        if ($coupon) {
            $cart = Cart::where('user_id', $user->id)->first();
            $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
            $total = 0;
            foreach ($cartProducts as $cartProduct) {
                $total += $cartProduct->product->price * $cartProduct->quantity;
            }
            $discount = $total * ($coupon->discount / 100);
        } else {
            $discount = 0;
        }
    }

    public function invoice()
    {
        return view('invoice.invoice');
    }

    public function removeCoupon()
    {
        session()->forget('discount');
        return redirect()->back();
    }
}
