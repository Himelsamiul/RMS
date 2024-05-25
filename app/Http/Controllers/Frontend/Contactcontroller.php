<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Contactcontroller extends Controller
{



public function contactform()
    {
        return view('frontend.pages.contact');
    }

    
    public function submit(Request $request)
    {
        // Validate and process the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Handle the form submission (e.g., save to database, send email, etc.)

        return redirect()->route('home')->with('success', 'Message sent successfully!');
    }
}
