<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Industry;
use App\Models\Module;
use App\Models\Service;

class IndustryController extends Controller
{
    public function industries()
    {
        $industries = Industry::with('regulations')->latest()->get();

    foreach ($industries as $industry) {

        $industry->recommendedModules = Module::whereIn(
            'id',
            $industry->module_ids ?? []
        )
        ->where('status', 1)
        ->where('is_live', 1)
        ->get();
    }

    return view('industries.index', compact('industries'));
    }

    public function industryDetails($slug)
    {
        $industry = Industry::with([
            'operations',
            'regulations'
        ])
        ->where('slug', $slug)
        ->firstOrFail();

        $recommendedModules = Module::whereIn(
            'id',
            $industry->module_ids ?? []
        )
        ->where('status', 1)
        ->where('is_live', 1)
        ->get();
        $modules = Module::where('status', 1)
        ->orderByDesc('is_live')
        ->orderBy('name')
        ->get();

        $faqs = $this->getFaqs($industry->title);

        return view(
            'industries.show',
            compact(
                'industry',
                'recommendedModules',
                'faqs',
                'modules'
            )
        );
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