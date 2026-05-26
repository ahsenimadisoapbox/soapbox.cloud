<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Industry;
use App\Models\Service;

class IndustryController extends Controller
{
    public function industries()
    {
        $industries = Industry::latest()->get();

        return view('industries.index', compact('industries'));
    }

    public function industryDetails($slug)
    {
        $industry = Industry::with('services')
            ->where('slug', $slug)
            ->firstOrFail();

        $faqs = $this->getFaqs($industry->title);

        return view('industries.show', compact('industry', 'faqs'));
    }

    public function getFaqs($page)
    {
        return Faq::orderBy('sort_order', 'asc')
            ->where('page', $page)
            ->get();
    }

    public function serviceDetails($slug)
    {
        $service = Service::where('slug', $slug)
            ->with('industry')
            ->firstOrFail();

        return view('services.show', compact('service'));
    }
}