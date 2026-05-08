<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Category;
use App\Models\Meta;
use App\Models\Faq;

class ModuleController extends Controller
{
    public function index()
    {
        $meta = $this->getMeta('modules');
        $categories = Category::with([
            'modules' => function ($query) {
                $query->where('status', 1)
                    ->orderBy('sort_order', 'asc');
            }
        ])->orderBy('sort_order', 'asc')->get();
        $faqs = $this->getFaqs('modules');
        return view('modules.index', compact('categories', 'meta', 'faqs'));
    }

    public function show($slug)
    {
        $module = Module::with([
            'challengers',
            'solutions',
            'keyCapabilities',
            'uses',
            'measurables',
            'frameworks'
        ])->where('slug', $slug)->firstOrFail();
        $faqs = $this->getFaqs($module->name);
        $randomModules = Module::where('id', '!=', $module->id)->where('is_live', 1)->inRandomOrder()->take(3)->get();

        return view('modules.show', compact('module', 'randomModules', 'faqs'));
    }

    public function getMeta($page)
    {
        return Meta::where('page', $page)->first();
    }

    public function getFaqs($page)
    {
        return Faq::orderBy('sort_order', 'asc')->where('page', $page)->get();
    }
}
