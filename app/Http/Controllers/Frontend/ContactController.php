<?php

namespace App\Http\Controllers\Frontend;

use App\Mail\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactPage()
    {
        $company = User::where('role', 'company')->where('status', 'active')->take(4)->get();
        return view('frontend.pages.contact', compact('company'));
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000'],
        ]);

        Mail::to('shohrab.hossain36@gmail.com')->send(new Contact($request->name, $request->subject, $request->message, $request->email));
        toastr('Message Send Successfully');
        return redirect()->back();
    }

}