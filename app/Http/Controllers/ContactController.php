<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(){
        return view('Frontend.contact');
    }

    public function about(){
        return view('Frontend.about');
    }

    public function add_contact(Request $request){
        
        $contact = new Contact();

        $contact->name = strip_tags($request->input('name'));
        $contact->email = strip_tags($request->input('email'));
        $contact->subject = strip_tags($request->input('subject'));
        $contact->message = strip_tags($request->input('message'));

        $contact->save();

        return redirect('/');
    }
}
