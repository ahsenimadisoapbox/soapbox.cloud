<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EhsAssessment;
use Illuminate\Http\Request;

class EhsAssessmentController extends Controller
{
    public function index()
    {
        $assessments = EhsAssessment::latest()->get();
        return view('admin.ehs_assessments.index', compact('assessments'));
    }

    /**
     * Show single assessment (Detail View)
     */
    public function show($id)
    {
        $item = EhsAssessment::findOrFail($id);

        return view('admin.ehs_assessments.show', compact('item'));
    }

    /**
     * Optional: Delete assessment
     */
    public function destroy($id)
    {
        $assessment = EhsAssessment::findOrFail($id);
        $assessment->delete();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Assessment deleted successfully');
    }
}
