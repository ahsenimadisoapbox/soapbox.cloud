<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LegalPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LegalPageController extends Controller
{
    public function index()
    {
        $pages = LegalPage::orderBy('id', 'DESC')->get();
        return view('admin.legal_pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.legal_pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|boolean',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
            'meta_keywords' => 'nullable|max:500',
        ]);

        LegalPage::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('admin.legal-pages.index')
            ->with('success', 'Legal page created successfully.');
    }

    public function edit(LegalPage $legalPage)
    {
        return view('admin.legal_pages.edit', compact('legalPage'));
    }

    public function update(Request $request, LegalPage $legalPage)
    {
        $request->validate([
            'name' => 'required|max:255',
            'content' => 'required',
            'status' => 'required|boolean',
            'meta_title' => 'nullable|max:255',
            'meta_description' => 'nullable|max:500',
            'meta_keywords' => 'nullable|max:500',
        ]);

        $legalPage->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'content' => $request->content,
            'status' => $request->status,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ]);

        return redirect()->route('admin.legal-pages.index')
            ->with('success', 'Legal page updated successfully.');
    }

    public function destroy(LegalPage $legalPage)
    {
        $legalPage->delete();

        return redirect()->route('admin.legal-pages.index')
            ->with('success', 'Legal page deleted successfully.');
    }
}
