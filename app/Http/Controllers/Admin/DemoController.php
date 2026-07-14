<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemoRequest;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    public function index()
    {
        $demoRequests = DemoRequest::latest()->get();

        return view(
            'admin.demo_requests.index',
            compact('demoRequests')
        );
    }

    public function show($id)
    {
        $demoRequest = DemoRequest::findOrFail($id);

        return view(
            'admin.demo_requests.show',
            compact('demoRequest')
        );
    }

    public function updateStatus(Request $request, $id)
    {
        $demoRequest = DemoRequest::findOrFail($id);

        $demoRequest->update([
            'status' => $request->status
        ]);

        return redirect()
            ->back()
            ->with('success', 'Status updated successfully.');
    }
}