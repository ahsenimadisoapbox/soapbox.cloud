<?php

namespace App\Http\Controllers;

use App\Models\LegalPage;

class LegalController extends Controller
{
    public function show($slug)
    {
        $page = LegalPage::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        return view('legal.show', compact('page'));
    }
}
