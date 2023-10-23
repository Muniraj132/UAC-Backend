<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactuserFormMail;
class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
        
    }
    public function show($id){

        $send = Contact::where('id',$id)->first();
        
        $email = $send['email'];
         $bodyContent = [
             'toName' => $send['name'],
             ];
         {  
             try {
                Mail::to($email)->send(new ContactuserFormMail($bodyContent));
                }
                 catch (Exception $e) {
             }
         } 
         return redirect()->back()->with(['type' => 'success', 'message' =>'Email sent Successfully.']);
    }
}
