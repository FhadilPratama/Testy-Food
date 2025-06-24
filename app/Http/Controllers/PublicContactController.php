<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class PublicContactController extends Controller
{
    public function create()
    {
        return view('public.contacts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'subject' => 'required|string|max:150',
            'message' => 'required|string',
        ]);

        Contact::create($validated);

        Mail::to('fhadilpratama945@gmail.com')->send(new ContactMessageMail($validated));

        return redirect()->route('public.contacts.create')
            ->with('success', 'Pesan Anda berhasil dikirim! Terimakasih telah menghubungi kami😊');
    }

}
