<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $re)
    {
        $validated = $re -> validate([
            'email' => 'required',
            'message' => 'required',
            'name' => 'required'
        ],
        [
            'email.required' => 'Email không bỏ trống!!',
            'message.required' => 'Message không bỏ trống!!',
            'name.required' => 'Name không bỏ trống!!'
        ]);

        $details = [
            'email' => $re -> input('email'),
            'name' => $re -> input('name'),
            'message' => $re -> input('message')
        ];

        Mail::to('truongnhox159@gmail.com')->send(new ContactMail($details));

        return redirect('/contact') -> with('status', 'Success');
    }
}
