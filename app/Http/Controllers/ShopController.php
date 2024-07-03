<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use Illuminate\Http\Request;

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
        // dd($cartProducts);
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

    public function checkout()
    {
        $user = auth()->user();
        $cart = Cart::where('user_id', $user->id)->first();
        $cartProducts = CartProduct::where('cart_id', $cart->id)->get();
        // check if cart is empty
        if ($cartProducts->count() == 0) {
            return redirect()->route('cart');
        } else {
            return view('user.checkout', compact('cartProducts'));
        }
    }
}
