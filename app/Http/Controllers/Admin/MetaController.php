<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    public function index()
    {
        $metas = Meta::orderBy('id', 'DESC')->get();
        return view('admin.metas.index', compact('metas'));
    }

    public function create()
    {
        return view('admin.metas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|max:255|unique:metas,page',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
            'meta_keywords' => 'nullable|max:500',
        ]);

        Meta::create($request->all());

        return redirect()->route('admin.metas.index')
            ->with('success', 'Meta tags added successfully.');
    }

    public function edit(Meta $meta)
    {
        return view('admin.metas.edit', compact('meta'));
    }

    public function update(Request $request, Meta $meta)
    {
        $request->validate([
            'page' => 'required|max:255|unique:metas,page,' . $meta->id,
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
            'meta_keywords' => 'nullable|max:500',
        ]);

        $meta->update($request->all());

        return redirect()->route('admin.metas.index')
            ->with('success', 'Meta tags updated successfully.');
    }

    public function destroy(Meta $meta)
    {
        $meta->delete();

        return redirect()->route('admin.metas.index')
            ->with('success', 'Meta tags deleted successfully.');
    }
}
