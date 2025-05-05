<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmission;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string',
        ]);

        // Here you could send an email, store in a database, etc.
        // This implementation respects privacy by making personal info optional

        // Example email sending (would need to configure mail settings in .env)
        // Mail::to('admin@childhelp.org')->send(new ContactFormSubmission($validated));

        return redirect()->route('contact')->with('success', 'Thank you for contacting us. Your message has been received.');
    }
}
