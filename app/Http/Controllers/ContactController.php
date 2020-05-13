<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class  ContactController extends Controller
{
    //
    public function main()
    {
        return view('contact');
    }
    public function store()
    {
        $data=request()->validate(
            [
                'fname'=>'required',
                'lname'=>'required',
                'subject'=>'required',
                'email'=>'required|email',
                'message'=>'required',
            ]
        );

        Mail::to('My.saniee@gmail.com')->send(new ContactFormMail($data));

        return view('contact');
    }



}
