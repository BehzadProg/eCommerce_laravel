<?php

namespace App\Http\Controllers\Backend;

use App\Helper\MailHelper;
use App\Mail\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsLetterSubscriber;
use Illuminate\Support\Facades\Mail;
use App\DataTables\NewsLetterSubscriberDataTable;

class SubscriberController extends Controller
{
    public function index(NewsLetterSubscriberDataTable $dataTable)
    {
        return $dataTable->render('admin.subscriber.index');
    }

    public function sendEmail(Request $request){
        $request->validate([
            'subject' => 'required',
            'message' => 'required',
        ]);

        $emails = NewsLetterSubscriber::where('is_verified' , 1)->pluck('email')->toArray();

         // set mail config
         MailHelper::setMailConfig();

        Mail::to($emails)->send(new Newsletter($request->subject , $request->message));

        toastr('Mail has been sent' , 'success');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $subscriber = NewsLetterSubscriber::findOrFail($id);
        $subscriber->delete();

        return response(['status' => 'success' , 'message' => 'Deleted Successfully']);
    }
}
