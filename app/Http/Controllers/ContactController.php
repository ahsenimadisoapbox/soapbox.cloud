<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Mail\ThankYouMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'hear_about' => 'nullable|string|max:255',
            'message' => 'required',
            'g-recaptcha-response' => 'required',
        ]);

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => env('NOCAPTCHA_SECRET'),
            'response' => $request->input('g-recaptcha-response'),
            'remoteip' => $request->ip(),
        ]);

        if (!data_get($response->json(), 'success')) {
            return back()
                ->withErrors(['g-recaptcha-response' => 'Captcha verification failed'])
                ->withInput();
        }

        unset($data['g-recaptcha-response']);

        $contact = Contact::create($data);

        // Send Thank You Email
        Mail::to($contact->email)->send(new ThankYouMail($contact));

        return redirect()->route('thank.you');
    }

    public function thankYou()
    {
        return view('thank-you');
    }
}
