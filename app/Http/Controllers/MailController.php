<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $re)
    {
        $details = [
            'email' => $re -> input('email'),
            'name' => $re -> input('name'),
            'message' => $re -> input('message')
        ];

        Mail::to('truongnhox159@gmail.com')->send(new ContactMail($details));

        return redirect('/contact') -> with('status', 'Success');
    }
}
