<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PayIrSetting;
use Illuminate\Http\Request;

class PayIrSettingController extends Controller
{
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|integer',
            'country_name' => 'required|max:200',
            'currency_name' => 'required|max:200',
            'currency_rate' => 'required',
            'payir_api_key' => 'required',
        ]);

           PayIrSetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
                'country_name' => $request->country_name,
                'currency_name' => $request->currency_name,
                'currency_rate' => $request->currency_rate,
                'payir_api_key' => $request->payir_api_key,
            ]
        );
        toastr('Updated Successfully' , 'success');
        return redirect()->back();

    }
}
