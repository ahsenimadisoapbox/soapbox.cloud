<?php

namespace App\Http\Controllers;

use App\Mail\DemoRequestMail;
use App\Models\DemoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DemoRequestController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'company_name' => 'required|string|max:255',

            'industry' => 'required|string|max:255',

            'primary_interest' => 'required|string|max:255',

            'notes' => 'nullable|string',
        ]);

        $demoRequest = DemoRequest::create($data);

        Mail::to($demoRequest->email)
        ->send(new DemoRequestMail($demoRequest));

        return response()->json([
            'success' => true,
            'redirect_url' => route('thank.you', ['source' => 'demo'])
        ]);
    }
}