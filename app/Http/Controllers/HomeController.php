<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::limit(5)->get();
        return view('user.home', compact('categories'));
    }

    public function shop()
    {
        $products = Product::paginate(12);
        $categories = Category::all();
        return view('user.shop', compact('categories', 'products'));
    }

    public function shopCategory($category)
    {
        $categories = Category::all();
        $category = Category::where('slug', $category)->first();
        $subCategories = $category->subCategories;
        // Sử dụng Eloquent ORM để lấy dữ liệu
        $products = Product::whereHas('subcategory.category', function ($query) use ($category) {
            $query->where('id', $category->id);
        })->get();
        return view('user.shop-by-category', compact('category', 'categories', 'subCategories', 'products'));
    }

    public function shopSubCategory($category, $subCategory)
    {
        $categories = Category::all();
        $category = Category::where('slug', $category)->first();
        $subCategory = $category->subCategories->where('slug', $subCategory)->first();
        $products = Product::where('category_product_id', $subCategory->id)->get();
        return view('user.shop-by-subCategory', compact('category', 'categories', 'subCategory', 'products'));
    }

    public function about()
    {
        return view('user.about');
    }

    public function blog()
    {
        return view('user.blog');
    }
}
