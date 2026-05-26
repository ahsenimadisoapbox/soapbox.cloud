<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::latest()->get();

        return view('admin.industries.index', compact('industries'));
    }

    public function create()
    {
        return view('admin.industries.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'icon' => 'nullable|string',
            'section_title' => 'nullable',
            'section_description' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {

    $image = $request->file('image');

    $imageName = time() . '-' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();

    $image->move(public_path('uploads/industries'), $imageName);

    $data['image'] = 'uploads/industries/' . $imageName;
}

        Industry::create($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry Created Successfully');
    }

    public function edit($id)
    {
        $industry = Industry::findOrFail($id);

        return view('admin.industries.edit', compact('industry'));
    }

    public function update(Request $request, $id)
    {
        $industry = Industry::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable|image',
            'icon' => 'nullable|string',
            'section_title' => 'nullable',
            'section_description' => 'nullable',
            'meta_title' => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/industries'), $imageName);

            $data['image'] = 'uploads/industries/' . $imageName;
        }

        $industry->update($data);

        return redirect()->route('admin.industries.index')
            ->with('success', 'Industry Updated Successfully');
    }

    public function destroy($id)
    {
        $industry = Industry::findOrFail($id);

        $industry->delete();

        return back()->with('success', 'Industry Deleted Successfully');
    }

    public function show($id)
    {
        $industry = Industry::with('services')
            ->findOrFail($id);

        return view('admin.industries.show', compact('industry'));
    }

    
}