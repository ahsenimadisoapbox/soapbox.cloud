<?php

namespace App\Http\Controllers;

use App\Models\EhsAiModule;
use Illuminate\Http\Request;

class EHSAIModuleController extends Controller
{
    public function index()
    {
        $aiModules = EhsAiModule::where('status', 1)
            ->orderBy('sort_order')
            ->get();

        return view(
            'ai',
            compact('aiModules')
        );
    }
    public function show($slug)
    {
        $module = EhsAiModule::with([
            'helpItems',
            'trustPoints',
            'businessOutcomes'
        ])
        ->where('slug', $slug)
        ->where('status', 1)
        ->firstOrFail();

        return view(
            'ehsaimodules.show',
            compact('module')
        );
    }
}
