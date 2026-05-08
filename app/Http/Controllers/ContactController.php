<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ThankYouMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'message' => 'required'
        ]);

        $contact = Contact::create($request->all());

        // Send Thank You Email
        Mail::to($contact->email)->send(new ThankYouMail($contact));

        return redirect()->route('thank.you');
    }

    public function thankYou()
    {
        return view('thank-you');
    }
}