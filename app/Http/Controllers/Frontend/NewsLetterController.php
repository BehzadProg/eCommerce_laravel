<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\MailHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsLetterSubscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionVerification;

class NewsLetterController extends Controller
{
    public function newsLetterRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $existSubscriber = NewsLetterSubscriber::where('email', $request->email)->first();

        if (!empty($existSubscriber)) {
            if ($existSubscriber->is_verified == 0) {
                //send verification link here
                $existSubscriber->verified_token = \Str::random(25);
                $existSubscriber->save();

                // set mail config
                MailHelper::setMailConfig();
                //send mail
                Mail::to($existSubscriber->email)->send(new SubscriptionVerification($existSubscriber));

                return response(['status' => 'success', 'message' => 'A verification link has been sent to your email please check']);
            } elseif ($existSubscriber->is_verified == 1) {
                return response(['status' => 'error', 'message' => 'You already subscribed with this email!']);
            }
        } else {
            $subscriber = new NewsLetterSubscriber();
            $subscriber->email = $request->email;
            $subscriber->verified_token = \Str::random(25);
            $subscriber->is_verified = 0;
            $subscriber->save();


            // set mail config
            MailHelper::setMailConfig();
            //send mail
            Mail::to($subscriber->email)->send(new SubscriptionVerification($subscriber));

            return response(['status' => 'success', 'message' => 'A verification link has been sent to your email please check']);
        }
    }

    public function newLetterSubcriberVerify($token)
    {
        $verify = NewsLetterSubscriber::where('verified_token', $token)->first();
        if ($verify) {
            $verify->verified_token = 'verified';
            $verify->is_verified = 1;
            $verify->save();
            toastr('Email has been verified successfully!', 'success');
            return redirect()->route('home');
        } else {
            toastr('invalid token!', 'error', 'Error');
            return redirect()->route('home');
        }
    }
}
