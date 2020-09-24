<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function email(Request $request)
    {
        Mail::to('contact@mon-blog.com')->send(new ContactMail($request->all()));
        return response()->json(['success'=> 'success']);
    }
}
