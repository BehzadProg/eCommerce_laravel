<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PayIrSetting;
use App\Models\PaypalSetting;
use App\Models\StripeSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index() {
        $paypal = PaypalSetting::first();
        $stripe = StripeSetting::first();
        $payir = PayIrSetting::first();
        return view('admin.payment-setting.index' , compact('paypal' , 'stripe' , 'payir'));
    }
}
