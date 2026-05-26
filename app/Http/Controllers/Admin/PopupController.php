<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PopupController extends Controller
{
    public function index()
    {
        $popups = Popup::latest()->paginate(10);

        return view('admin.popups.index', compact('popups'));
    }

    public function create()
    {
        return view('admin.popups.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|max:255',
            'link' => 'nullable|max:500',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName =
                time() . '-' .
                Str::slug($request->title ?: 'popup')
                . '.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/popups'),
                $imageName
            );

            $data['image'] =
                'uploads/popups/' . $imageName;
        }

        Popup::create($data);

        return redirect()
            ->route('admin.popups.index')
            ->with('success', 'Popup created successfully.');
    }

    public function edit(Popup $popup)
    {
        return view('admin.popups.edit', compact('popup'));
    }

    public function update(Request $request, Popup $popup)
    {
        $request->validate([
            'title' => 'nullable|max:255',
            'link' => 'nullable|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'status' => 'required|boolean',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            // delete old image
            if (
                $popup->image &&
                file_exists(public_path($popup->image))
            ) {
                File::delete(public_path($popup->image));
            }

            $image = $request->file('image');

            $imageName =
                time() . '-' .
                Str::slug($request->title ?: 'popup')
                . '.' .
                $image->getClientOriginalExtension();

            $image->move(
                public_path('uploads/popups'),
                $imageName
            );

            $data['image'] =
                'uploads/popups/' . $imageName;
        }

        $popup->update($data);

        return redirect()
            ->route('admin.popups.index')
            ->with('success', 'Popup updated successfully.');
    }

    public function destroy(Popup $popup)
    {
        if (
            $popup->image &&
            file_exists(public_path($popup->image))
        ) {
            File::delete(public_path($popup->image));
        }

        $popup->delete();

        return redirect()
            ->route('admin.popups.index')
            ->with('success', 'Popup deleted successfully.');
    }
}