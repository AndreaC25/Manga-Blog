<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        Mail::to(config('mail.admin_address'))->send(new ContactMail($data['name'], $data['email'], $data['message']));

        return redirect()->route('contact.create')->with('success', 'Messaggio inviato con successo!');
    }
}
