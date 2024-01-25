<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Vendor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserVendorRequestController extends Controller
{
    public function index()
    {
        return view('frontend.dashboard.vendor-request.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_image' => 'required|image|max:3000',
            'shop_name' => 'required|max:200|unique:vendors,shop_name',
            'shop_email' => 'required|email',
            'shop_phone' => 'required|max:200',
            'shop_address' => 'required',
            'about' => 'required',
        ]);
        if(Auth::user()->role === 'vendor'){
            return redirect()->back();
        }

        $vendors = Vendor::where(['user_id' => Auth::user()->id , 'status' => 0])->first();
        if($vendors){
            toastr('You already submitted your request Please wait for your approval' , 'info');
            return redirect()->back();
        }else{
                $imagePath = handleUpload('shop_image' , null , env('VENDOR_SHOP_PROFILE_BANNER_UPLOAD_PATH') , 'vendor_banner');
                $vendor = new Vendor();
                $vendor->banner = $imagePath;
                $vendor->shop_name = $request->shop_name;
                $vendor->phone = $request->shop_phone;
                $vendor->email = $request->shop_email;
                $vendor->address = $request->shop_address;
                $vendor->description = $request->about;
                $vendor->user_id = Auth::user()->id;
                $vendor->status = 0;
                $vendor->save();

                toastr('submitted successfully Please wait to be approve!' , 'success');
                return redirect()->back();
        }

    }
}
