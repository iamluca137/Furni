<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ImageProduct;
use App\Models\Product;
use App\Models\ProductStatus;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        // get first image of product
        foreach ($products as $product) {
            $image = ImageProduct::where('product_id', $product->id)->first();
            $product->image = $image->image ?? 'no-image.png';
        }
        $trashes = Product::onlyTrashed()->get();
        return view('admin.products.list', compact('products', 'trashes'));
    }

    public function create()
    {
        $categories = Category::all();
        $statuses = ProductStatus::all();
        $tags = Tag::all();
        return view('admin.products.add', compact('categories', 'statuses', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'category_product_id' => 'required|min:1',
            'price' => 'required|numeric|min:1000|max:1000000000',
            // max 5 pictures
            'images' => 'required|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:51200',
            'quantity' => 'required|numeric|min:1|max:1000000',
            'status' => 'required',
            'tags' => 'required',
        ], [
            'images.max' => 'The number of images must not exceed 5',
        ]);

        $dataProduct = [
            'name' => $request->name,
            'price' => (int)$request->price,
            'description' => $request->description,
            'info' => $request->info,
            'quantity' => (int)$request->quantity,
            'category_product_id' => (int)$request->category_product_id,
            'product_status_id' => (int)$request->status,
            'slug' => $this->createSlug($request->name),
        ];

        if ($product = Product::create($dataProduct)) {

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $extention = $file->getClientOriginalName();
                    $filename = time() . "_" . $extention;
                    $filename = $this->formatImage($filename);
                    $file->move('assets/images/products/', $filename);
                    ImageProduct::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                    ]);
                }
            }
            foreach ($request->tags as $id => $name) {
                ProductTag::create([
                    'tag_id' => $name,
                    'product_id' => $product->id,
                ]);
            }
            return redirect()->route('admin.product')->with('success', 'Product created successfully');
        } else {
            return redirect()->route('admin.product.create')->with('error', 'Failed to create product');
        }
    }

    public function edit(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $product->images = ImageProduct::where('product_id', $product->id)->get();
        $tags_id = ProductTag::where('product_id', $product->id)->get()->pluck('tag_id');
        $product->tags = Tag::whereIn('id', $tags_id)->get();
        $categories = Category::all();
        $statuses = ProductStatus::all();
        $tags = Tag::all();
        return view('admin.products.edit', compact('product', 'categories', 'tags', 'statuses'));
    }

    public function update(Request $request, string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $tags_id = ProductTag::where('product_id', $product->id)->get()->pluck('tag_id');
        $tags = Tag::whereIn('id', $tags_id)->get()->pluck('id')->toArray();
        $images = ImageProduct::where('product_id', $product->id)->get()->pluck('image')->toArray();
        $request->validate([
            'name' => 'required|min:1|max:255',
            'category_product_id' => 'required|min:1',
            'price' => 'required|numeric|min:1000|max:1000000000',
            // max 5 pictures include old pictures and new pictures
            'images' => [
                Rule::requiredIf(empty($request->old_images)),
                'array',
                'max:' . (empty($request->old_images) ? 5 : 5 - count($request->old_images)),
            ],
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:51200',
            'quantity' => 'required|numeric|min:1|max:1000000',
            'status' => 'required',
            'tags' => 'required',
        ], [
            'images.max' => 'The number of images must not exceed 5',
        ]);

        $dataProduct = [
            'name' => $request->name,
            'price' => (int)$request->price,
            'description' => $request->description,
            'info' => $request->info,
            'quantity' => (int)$request->quantity,
            'category_product_id' => (int)$request->category_product_id,
            'product_status_id' => (int)$request->status,
            'slug' => $this->createSlug($request->name),
        ];

        if ($product->update($dataProduct)) {

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $extention = $file->getClientOriginalName();
                    $filename = time() . "_" . $extention;
                    $filename = $this->formatImage($filename);
                    $file->move('assets/images/products/', $filename);
                    ImageProduct::create([
                        'product_id' => $product->id,
                        'image' => $filename,
                    ]);
                }
            }
            if (!empty($request->old_images)) {
                if (count($images) > count($request->old_images)) {
                    $diff_elements = array_diff($images, $request->old_images);
                    foreach ($diff_elements as $element) {
                        ImageProduct::where('product_id', $product->id)->where('image', $element)->delete();
                        unlink('assets/images/products/' . $element);
                    }
                }
            }

            if (!empty($tags)) {
                if (count($tags) > count($request->tags)) {
                    $diff_tags = array_diff($tags, $request->tags);
                    foreach ($diff_tags as $element) {
                        ProductTag::where('product_id', $product->id)->where('tag_id', $element)->delete();
                    }
                }

                if (count($tags) < count($request->tags)) {
                    $diff_tags = array_diff($request->tags, $tags);
                    foreach ($diff_tags as $element) {
                        ProductTag::create([
                            'tag_id' => $element,
                            'product_id' => $product->id,
                        ]);
                    }
                }
            }
            return redirect()->route('admin.product')->with('success', 'Product edited successfully');
        } else {
            return redirect()->route('admin.product.edit')->with('error', 'Failed to edit product');
        }
    }

    public function delete(string $slug)
    {
    }

    public function trash()
    {
    }

    public function restore(string $slug)
    {
    }

    public function destroy(string $slug)
    {
    }
}
