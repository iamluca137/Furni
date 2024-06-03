<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryStatus;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        $trashes = Category::onlyTrashed()->get();
        return view('admin.categories.list', compact('categories', 'trashes'));
    }

    public function create()
    {
        $statuses = CategoryStatus::all();
        return view('admin.categories.add', compact('statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:categories',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:51200',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = time() . "_" . $extention;
            $filename = $this->formatImage($filename);
            $file->move('assets/images/categories/', $filename);
        }

        $dataCat = [
            'name' => $request->name,
            'slug' => $this->createSlug($request->name),
            'image' => $filename,
            'status' => $request->status,
        ];

        if (Category::create($dataCat)) {
            return redirect()->route('admin.category')->with('success', 'Category created successfully');
        } else {
            return redirect()->route('admin.category.create')->with('error', 'Category created failed');
        }
    }

    public function edit(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        $statuses = CategoryStatus::all();
        return view('admin.categories.edit', compact('category', 'statuses'));
    }

    public function update(Request $request, string $slug)
    {
        $category = Category::where('slug', $slug)->first();

        $request->validate([
            'name' => 'required|min:2|max:50|unique:categories,name,' . $category->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:51200',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = time() . "_" . $extention;
            $filename = $this->formatImage($filename);
            $file->move('assets/images/categories/', $filename);
            unlink('assets/images/categories/' . $category->image);
        } else {
            $filename = $category->image;
        }

        $dataCat = [
            'name' => $request->name,
            'slug' => $this->createSlug($request->name),
            'image' => $filename,
            'status' => $request->status,
        ];

        if ($category->update($dataCat)) {
            return redirect()->route('admin.category')->with('success', 'Category updated successfully');
        } else {
            return redirect()->route('admin.category.edit', $slug)->with('error', 'Category updated failed');
        }
    }

    public function delete(string $slug)
    {
        $category = Category::where('slug', $slug)->first();
        if ($category->delete()) {
            // Update status category and sub category
            $category->update(['status' => 2]);
            // $category->subCategories()->update(['status' => 2]);
            return redirect()->route('admin.category')->with('success', 'Category deleted successfully');
        } else {
            return redirect()->route('admin.category')->with('error', 'Failed to delete category');
        }
    }

    public function trash()
    {
        $trashes = Category::onlyTrashed()->paginate(10);
        return view('admin.categories.trash', compact('trashes'));
    }

    public function restore(string $slug)
    {
        $category = Category::onlyTrashed()->where('slug', $slug)->first();
        if ($category->restore()) {
            $category->update(['status' => 1]);
            return redirect()->route('admin.category')->with('success', 'Category restored successfully');
        } else {
            return redirect()->route('admin.category.trash')->with('error', 'Failed to restore category');
        }
    }

    public function destroy(string $slug)
    {
        $category = Category::onlyTrashed()->where('slug', $slug)->first();
        if ($category->forceDelete()) {
            unlink('assets/images/categories/' . $category->image);
            return redirect()->route('admin.category')->with('success', 'Category deleted permanently');
        } else {
            return redirect()->route('admin.category.trash')->with('error', 'Failed to delete category permanently');
        }
    }
}
