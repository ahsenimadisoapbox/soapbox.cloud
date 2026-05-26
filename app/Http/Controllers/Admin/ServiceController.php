<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('industry')->latest()->get();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $industries = Industry::all();

        return view('admin.services.create', compact('industries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'industry_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {

    $image = $request->file('image');

    $imageName = time() . '-' . Str::slug($request->title) . '.' . $image->getClientOriginalExtension();

    $image->move(public_path('uploads/services'), $imageName);

    $data['image'] = 'uploads/services/' . $imageName;
}

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service Created Successfully');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        $industries = Industry::all();

        return view('admin.services.edit', compact('service', 'industries'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $data = $request->validate([
            'industry_id' => 'required',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image',
        ]);

        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('uploads/services'), $imageName);

            $data['image'] = 'uploads/services/' . $imageName;
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service Updated Successfully');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->delete();

        return back()->with('success', 'Service Deleted Successfully');
    }

    public function show($id)
    {
        $service = Service::with('industry')
            ->findOrFail($id);

        return view('admin.services.show', compact('service'));
    }
}