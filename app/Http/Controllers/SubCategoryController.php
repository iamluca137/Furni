<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryStatus;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subCategories = SubCategory::paginate(10);
        $trashes = SubCategory::onlyTrashed()->get();
        return view('admin.sub_categories.list', compact('subCategories', 'trashes'));
    }

    public function create()
    {
        $statuses = CategoryStatus::all();
        $categories = Category::all();
        return view('admin.sub_categories.add', compact('statuses', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:50|unique:categories',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:51200',
            'status' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = time() . "_" . $extention;
            $filename = $this->formatImage($filename);
            $file->move('assets/images/sub_categories/', $filename);
        }

        $dataSubCat = [
            'name' => $request->name,
            'slug' => $this->createSlug($request->name),
            'category_id' => $request->category_id,
            'image' => $filename,
            'status' => $request->status,
        ];

        if (SubCategory::create($dataSubCat)) {
            return redirect()->route('admin.subcategory')->with('success', 'Sub Category created successfully');
        } else {
            return redirect()->route('admin.subcategory.create')->with('error', 'Sub Category created failed');
        }
    }

    public function edit(string $slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->first();
        $statuses = CategoryStatus::all();
        $categories = Category::all();
        return view('admin.sub_categories.edit', compact('subCategory', 'statuses', 'categories'));
    }

    public function update(Request $request, string $slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->first();

        $request->validate([
            'name' => 'required|min:2|max:50|unique:categories,name,' . $subCategory->id,
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:51200',
            'status' => 'required',
            'category_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalName();
            $filename = time() . "_" . $extention;
            $filename = $this->formatImage($filename);
            $file->move('assets/images/sub_categories/', $filename);
            unlink('assets/images/sub_categories/' . $subCategory->image);
        } else {
            $filename = $subCategory->image;
        }

        $dataSubCat = [
            'name' => $request->name,
            'slug' => $this->createSlug($request->name),
            'category_id' => $request->category_id,
            'image' => $filename,
            'status' => $request->status,
        ];

        if ($subCategory->update($dataSubCat)) {
            return redirect()->route('admin.subcategory')->with('success', 'Sub Category updated successfully');
        } else {
            return redirect()->route('admin.subcategory.edit', $slug)->with('error', 'Sub Category updated failed');
        }
    }

    public function delete(string $slug)
    {
        $subCategory = SubCategory::where('slug', $slug)->first();
        if ($subCategory->delete()) {
            return redirect()->route('admin.subcategory')->with('success', 'Sub Category deleted successfully');
        } else {
            return redirect()->route('admin.subcategory')->with('error', 'Failed to delete sub category');
        }
    }

    public function trash()
    {
        $trashes = SubCategory::onlyTrashed()->paginate(10);
        return view('admin.sub_categories.trash', compact('trashes'));
    }

    public function restore(string $slug)
    {
        $subCategory = SubCategory::onlyTrashed()->where('slug', $slug)->first();
        if ($subCategory->restore()) {
            return redirect()->route('admin.subcategory')->with('success', 'Sub Category restored successfully');
        } else {
            return redirect()->route('admin.subcategory.trash')->with('error', 'Failed to restore sub category');
        }
    }

    public function destroy(string $slug)
    {
        $subCategory = SubCategory::onlyTrashed()->where('slug', $slug)->first();
        if ($subCategory->forceDelete()) {
            unlink('assets/images/sub_categories/' . $subCategory->image);
            return redirect()->route('admin.subcategory')->with('success', 'Sub Category deleted permanently');
        } else {
            return redirect()->route('admin.subcategory.trash')->with('error', 'Failed to delete sub category permanently');
        }
    }
}
