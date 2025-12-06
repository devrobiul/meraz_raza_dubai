<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\UserContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function messageStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'subject' => 'required|string|max:150',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:1000',
        ]);

        $data = $request->all();
        Mail::to(config('mail.admin_email'))->queue(new UserContactMail($data));
        flash()->success('Your message request has been submitted!');

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Your message request has been submitted!',
                'route' => route('contact-me'),
            ]);
        }
    }
}
