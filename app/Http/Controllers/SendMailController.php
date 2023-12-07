<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{
    public function index()
    {
        $content = [
            'subject' => 'Jouw Ticket',
            'body' => 'This is the email body of how to send email from laravel 10 with mailtrap.'
        ];

        Mail::to('your_email@gmail.com')->send(new SampleMail($content));

        return "Email has been sent.";
    }
}
