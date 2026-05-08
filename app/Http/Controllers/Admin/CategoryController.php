<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($request->name);

        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Created Successfully');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
            'sort_order' => 'nullable|integer',
        ]);

        $data['slug'] = Str::slug($request->name);

        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return back()->with('success', 'Category Deleted Successfully');
    }
}