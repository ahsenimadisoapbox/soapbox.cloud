<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Meta;
use App\Models\Faq;
use App\Models\Popup;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $meta = $this->getMeta('home');
        $modules = Module::orderBy('sort_order', 'asc')->where('is_live', 1)->take(6)->get();
        $faqs = $this->getFaqs('home');
        $popup = Popup::where('status', 1)->latest()->first();
        return view('home', compact('modules', 'meta', 'faqs', 'popup'));
    }

    public function whoweare()
    {
        $meta = $this->getMeta('who-we-are');
        $faqs = $this->getFaqs('who-we-are');
        return view('whoweare', compact('meta', 'faqs'));
    }

    public function eap()
    {
        $meta = $this->getMeta('early-adopters-program');
        $faqs = $this->getFaqs('eap');
        return view('EAP', compact('meta', 'faqs'));
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
