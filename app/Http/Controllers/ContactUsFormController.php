<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Contact;
use Mail;

class ContactUsFormController extends Controller {

    // Create Contact Form
    public function createForm(Request $request) {
      return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'subject'=>'required',
            'message' => 'required'
         ]);

        //  Store data in database
        Contact::create($request->all());

        //  Send mail to admin
        \Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'user_query' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('nguyenminhtriet300599@gmail.com', 'Admin')->subject($request->get('subject'));
        });

        return back()->with('success', 'Chúng tôi đã nhận được tin nhắn của bạn và xin cảm ơn bạn đã viết thư cho chúng tôi.');
    }

    
    // Danh sách
    public function getDanhSach()
    {
        $contacts = Contact::all();
        return view('admin.contact.danhsach', compact('contacts'));
    }
}