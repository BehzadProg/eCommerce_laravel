<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Helper\MailHelper;
use Illuminate\Http\Request;
use App\Models\TermAndCondition;
use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\EmailConfigration;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('frontend.pages.about' , compact('about'));
    }

    public function termsAndConditions()
    {
        $term = TermAndCondition::first();
        return view('frontend.pages.termsAndCondition' , compact('term'));
    }

    public function contactUs()
    {
        return view('frontend.pages.contact');
    }

    public function handleContactUs(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|email|max:200',
            'subject' => 'required|max:200',
            'message' => 'required|max:1000',
        ]);

         // set mail config
         MailHelper::setMailConfig();

        $setting = EmailConfigration::first();
        Mail::to($setting->email)->send(new Contact($request->subject , $request->message , $request->email , $request->name));

        return response(['status' => 'success', 'message' => 'Mail Sent Successfully']);
    }
}
