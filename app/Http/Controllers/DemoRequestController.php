<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DemoRequest;

class DemoRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email',
            'phone'      => 'nullable|string',
            'company'    => 'nullable|string',
            'country'    => 'nullable|string',
            'industry'   => 'nullable|string',
            'role'       => 'nullable|string',
            'challenge'  => 'nullable|string',
            'source'     => 'nullable|string',
        ]);

        DemoRequest::create($data);

        return redirect()->back()->with('success', 'Demo request submitted successfully!');
    }
}
