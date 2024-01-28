<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use App\Helper\MailHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\CreateAccount;
use App\Models\Vendor;
use Illuminate\Support\Facades\Mail;

class ManageUserController extends Controller
{
    public function index()
    {
        return view('admin.manage-user.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:200|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required',
        ]);


        $user = new User();
        if($request->role === 'user'){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'user';
            $user->status = 'active';
            $user->save();

            // set mail config
            MailHelper::setMailConfig();
            Mail::to($request->user())->send(new CreateAccount($request->name , $request->email , $request->password));

            toastr('Created Successfully' , 'success');
            return redirect()->back();
        }elseif($request->role === 'vendor'){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'vendor';
            $user->status = 'active';
            $user->save();

            $vendor = new Vendor();
            $vendor->user_id = $user->id;
            $vendor->banner = '123_Image.jpeg';
            $vendor->shop_name = $request->name.' Shop';
            $vendor->phone = '1234566543';
            $vendor->email = 'test@gmail.com';
            $vendor->address = 'Usa';
            $vendor->description = 'descripton shop';
            $vendor->status = 1;
            $vendor->save();


            // set mail config
            MailHelper::setMailConfig();
            Mail::to($request->user())->send(new CreateAccount($request->name , $request->email , $request->password));

            toastr('Created Successfully' , 'success');
            return redirect()->back();
        }elseif($request->role === 'admin'){
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role = 'admin';
            $user->status = 'active';
            $user->save();

            $vendor = new Vendor();
            $vendor->user_id = $user->id;
            $vendor->banner = '123_Image.jpeg';
            $vendor->shop_name = $request->name.' Shop';
            $vendor->phone = '1234566543';
            $vendor->email = 'test@gmail.com';
            $vendor->address = 'Usa';
            $vendor->description = 'descripton shop';
            $vendor->status = 1;
            $vendor->save();


            // set mail config
            MailHelper::setMailConfig();
            Mail::to($request->user())->send(new CreateAccount($request->name , $request->email , $request->password));

            toastr('Created Successfully' , 'success');
            return redirect()->back();
        }
    }
}