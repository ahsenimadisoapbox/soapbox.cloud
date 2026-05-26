<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Faq;
use App\Models\Module;
use App\Models\Industry;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::orderBy('page')
            ->orderBy('sort_order')
            ->get()
            ->groupBy('page');

        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    {
        $modules = Module::orderBy('sort_order')
            ->where('is_live', 1)
            ->get();

        $blogs = Blog::orderBy('id', 'DESC')
            ->where('status', 1)
            ->get();

        $industries = Industry::orderBy('title', 'ASC')->get();

        return view('admin.faqs.create', compact(
            'modules',
            'blogs',
            'industries'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required',
            'sort_order' => 'nullable|integer',
            'page' => 'nullable|string|max:255',
        ]);

        Faq::create($request->all());

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully');
    }

    public function edit($id)
    {
        $modules = Module::orderBy('sort_order')
            ->where('is_live', 1)
            ->get();

        $blogs = Blog::orderBy('id', 'DESC')
            ->where('status', 1)
            ->get();

        $industries = Industry::orderBy('title', 'ASC')->get();

        $faq = Faq::findOrFail($id);

        return view('admin.faqs.edit', compact(
            'faq',
            'modules',
            'blogs',
            'industries'
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required',
            'sort_order' => 'nullable|integer',
            'page' => 'nullable|string|max:255',
        ]);

        $faq = Faq::findOrFail($id);

        $faq->update($request->all());

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully');
    }

    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);

        $faq->delete();

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully');
    }
}