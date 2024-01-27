<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Models\EmailConfigration;
use Illuminate\Support\Facades\Session;

class SettingController extends Controller
{
    public function index(){
        $generalSetting = GeneralSetting::first();
        $emailConfigration = EmailConfigration::first();
        return view('admin.setting.index' , compact('generalSetting' , 'emailConfigration'));
    }

    public function generalSettingUpdate(Request $request) {
        $request->validate([
            'site_name' => 'required|max:200',
            'layout' => 'required|max:200',
            'contact_email' => 'required|max:200',
            'currency_name' => 'required|max:200',
            'currency_icon' => 'required|max:200',
            'time_zone' => 'required|max:200',
        ]);

        GeneralSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => $request->site_name,
                'layout' => $request->layout,
                'contact_email' => $request->contact_email,
                'contact_phone' => $request->contact_phone,
                'contact_address' => $request->contact_address,
                'map' => $request->map,
                'currency_name' => $request->currency_name,
                'currency_icon' => $request->currency_icon,
                'time_zone' => $request->time_zone,
            ]
        );

        toastr('Updated Successfully' , 'success');
        return redirect()->back();
    }

    public function EmailConfigrationUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'host' => 'required|max:200',
            'username' => 'required|max:200',
            'password' => 'required|max:200',
            'port' => 'required|max:200',
            'encription' => 'required',
        ]);

        EmailConfigration::updateOrCreate(
            ['id' => 1],
            [
                'email' => $request->email,
                'host' => $request->host,
                'username' => $request->username,
                'password' => $request->password,
                'port' => $request->port,
                'encription' => $request->encription,
            ]
        );

        toastr('Updated Successfully' , 'success');
        return redirect()->back();
    }

    public function changeViewList(Request $request)
    {
        Session::put('setting_list_style', $request->style);
    }
}
