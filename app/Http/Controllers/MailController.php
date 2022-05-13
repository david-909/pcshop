<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateEmailRequest;
use App\Mail\ConfirmMail;
use App\Mail\ContactMail;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Question\ConfirmationQuestion;

class MailController extends Controller
{
    public function index(ValidateEmailRequest $request)
    {

        #dd($request);
        $mailData = [
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'text' => $request->message
        ];

        Mail::to('kosticdavid99@gmail.com')->send(new ContactMail($mailData));
        Mail::to($request->email)->send(new ConfirmMail($mailData));

        return redirect()->route("contact");

        #dd("Email is sent successfully.");
    }
}
