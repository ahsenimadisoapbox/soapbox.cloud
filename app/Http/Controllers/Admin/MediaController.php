<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MediaController extends Controller
{
    public function index()
    {
        $media = Media::latest()->get();

        return view('admin.media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'title' => 'nullable|string|max:255',
            'alt'   => 'nullable|string|max:255',
            'redirect_url' => 'nullable|url|max:500',
        ]);

        $data = [];

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName =
                time() . '-' .
                Str::slug($request->title ?? 'media') .
                '.' .
                $image->getClientOriginalExtension();

            $destinationPath = public_path('uploads/media');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $image->move(
                $destinationPath,
                $imageName
            );

            $data['image'] = $imageName;

            $data['path'] =
                'uploads/media/' . $imageName;
        }

        $data['title'] = $request->title;
        $data['alt']   = $request->alt;
        $data['redirect_url'] = $request->redirect_url;
        Media::create($data);

        return redirect()
            ->route('admin.media.index')
            ->with(
                'success',
                'Media uploaded successfully'
            );
    }

    public function show($id)
    {
        $media = Media::findOrFail($id);

        return view(
            'admin.media.show',
            compact('media')
        );
    }

    public function destroy($id)
    {
        $media = Media::findOrFail($id);

        if (
            $media->path &&
            file_exists(public_path($media->path))
        ) {
            unlink(
                public_path($media->path)
            );
        }

        $media->delete();

        return redirect()
            ->route('admin.media.index')
            ->with(
                'success',
                'Media deleted successfully'
            );
    }
}