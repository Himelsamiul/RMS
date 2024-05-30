<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function sendMessage(Request $request)
    {
        // Validate the request
     //   dd($request->all());
        
        $request->validate([
            'text' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);
        dd('Validation passed');


        // Create a new feedback entry
        $feedback = Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            
        ]);
        dd($feedback);

        // Optionally, you can send an email using a Mailable class
        // Mail::to('your-email@example.com')->send(new ContactMail($feedback->toArray()));

        // Redirect back with a success message
        return redirect()->route('customer.login');
    }
}
