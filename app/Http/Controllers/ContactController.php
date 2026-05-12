<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Unit V: Laravel Form validation & Method field (POST) & CSRF
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ], [
            'message.min' => 'Please provide a more detailed message (at least 10 characters).',
        ]);

        // Unit VI: CRUD using Eloquent ORM (Create)
        ContactMessage::create($validatedData);

        // Unit IV: Sending Emails
        // Note: MAIL_MAILER is set to 'log' in .env, so emails will appear in storage/logs/laravel.log
        Mail::to('jaskiratkaur461@gmail.com')->send(new ContactMail($validatedData));

        // Unit II & IV: Laravel Redirections & Session Data (Back with success message)
        return back()->with('success', 'Your message has been sent successfully and logged!');
    }
}
