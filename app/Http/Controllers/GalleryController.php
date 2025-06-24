<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Content;

class GalleryController extends Controller
{
    public function ContactUs(){

        return view('frontend.contact.contact_us');
    }

    public function Coupon(){
        return view('frontend.contact.coupon');
    }

    public function Service(){
        return view('frontend.contact.service');
    }

    public function StoreContact(Request $request){
        Contact::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=> Carbon::now(),
        ]);

        $notification = array (
            'message' => 'Your Message Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AdminContactMessage(){

        $contact = Contact::latest()->get();
        return view('backend.contact.contact_message', compact('contact'));
    }
}
