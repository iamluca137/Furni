<?php

namespace App\Http\Controllers;

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

    public function cart()
    {
        return view('user.cart');
    }
}
