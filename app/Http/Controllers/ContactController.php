<?php

namespace App\Http\Controllers;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;
class ContactController extends Controller
{
   public function contact(){
       return view('user.contact');
   }

   public function sendEmail(Request $request){
       $request->validate([
        'name'=>'required|min:3|max:120|regex:/^[\pL\s\-]+$/u',
            'email'=>'email',
            'msg'=>'max:300'
       ]);
       $details = [
          'msg'=>$request->msg,
          'name'=>$request->name,
          'email'=>$request->email,
          
       ];

       Mail::to('nileshkalsariya6@gmail.com')->send(new ContactMail($details));
       return back()->with('message_sent','Your message has been sent successfully');
   }
}
