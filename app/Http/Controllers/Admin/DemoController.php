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
        return view('admin.demo_requests.index', compact('demoRequests'));
    }
}
