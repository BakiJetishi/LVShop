<?php

namespace App\Http\Controllers;

use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function index()
    {
        return view('components.contactUs');
    }

    public function submit(Request $request)
    {

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'number' => 'required',
            'message' => 'required',
        ]);
        
        Mail::to('bakii.jetishii@gmail.com')->send(new ContactForm($data));

        return redirect('/')->with('success', 'Your message has been sent successfully!');
    }
}