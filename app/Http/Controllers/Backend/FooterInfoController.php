<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FooterInfo;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    public function index()
    {
        $footerInfo = FooterInfo::first();
        return view('admin.footer.footer-info.index' , compact('footerInfo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => 'nullable|image|max:3000',
            'phone' => 'max:100',
            'email' => 'max:100',
            'address' => 'max:300',
            'copyright' => 'max:200',
        ]);
        $footerInfo = FooterInfo::first();
        $imagePath = handleUpload('logo' , $footerInfo , env('FOOTER_LOGO_UPLOAD_PATH') , 'footer_logo');
        FooterInfo::updateOrCreate(
            ['id'=> $id],
            [
                'logo' => (!empty($imagePath) ? $imagePath : $footerInfo->logo),
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address,
                'copyright' => $request->copyright,
            ]
        );

        toastr('Updated Successfully!' , 'success');
        return redirect()->back();
    }
}
