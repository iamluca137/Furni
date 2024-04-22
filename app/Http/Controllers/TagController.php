<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.list', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50|unique:tags',
            'description' => 'nullable|min:6|max:255',
        ]);

        if (Tag::create([
            'name' => strtoupper($request->name),
            'description' => $request->description,
        ])) {
            return redirect()->route('admin.tag')->with('success', 'Tag created successfully');
        } else {
            return redirect()->route('admin.tag.create')->with('error', 'Failed to create tag');
        }
    }

    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, string $id)
    {
        $tag = Tag::find($id);

        $request->validate([
            'name' => [
                'required',
                'min:3',
                'max:50',
                Rule::unique('tags')->ignore($tag->id)
            ]
        ]);

        $tag->name = strtoupper($request->name);
        $tag->description = $request->description;

        if ($tag->save()) {
            return redirect()->route('admin.tag')->with('success', 'Tag updated successfully');
        } else {
            return redirect()->route('admin.tag.edit', $tag->id)->with('error', 'Failed to update tag');
        }

        return redirect()->route('admin.tag');
    }

    public function destroy(string $id)
    {
        $user = Tag::find($id);
        if ($user->delete()) {
            return redirect()->route('admin.tag')->with('success', 'Tag deleted successfully');
        } else {
            return redirect()->route('admin.tag')->with('error', 'Failed to delete tag');
        } 
    }
}
