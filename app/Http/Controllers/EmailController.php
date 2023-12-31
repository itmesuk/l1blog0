<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TestMail;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send_email()
    {
        $mailData = [
            'title' => 'Mail from L10Blog',
            'body' => 'ทดสอบส่ง Email จาก webapp Laravel 10 smtp.'
        ];

        Mail::to('it@me-suk.com')->send(new TestMail($mailData));

        dd('Email is send successfully');
    }
}
