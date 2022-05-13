<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use function Symfony\Component\Mime\Header\all;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact', $this->data);
    }
}
