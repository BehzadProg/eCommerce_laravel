<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Session;

class AdvertisementController extends Controller
{
    public function index() {
        $homepage_banner_section_one = Advertisement::where('key' , 'homepage_banner_section_one')->first();
        $homepage_banner_section_one = json_decode($homepage_banner_section_one->value);

        return view('admin.advertisement.index' , compact('homepage_banner_section_one'));
    }

    public function homepageBannerSectionOne(Request $request)
    {

        $request->validate([
            'banner_url' => 'required',
            'bannner_image' => 'image',
            'status' => 'required'
        ]);


        $oldImage = $request->old_banner_image;
        $inputName = 'banner_image';
        $oldPathFile = env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$oldImage;
        $pathFile = env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH');
        $model = Advertisement::where('key' , 'homepage_banner_section_one')->first();
        $model = json_decode($model->value);
        $imageName = $model->banner_one->banner_image;
        // dd($model->banner_one->banner_image);


        if($request->hasFile($inputName)){

            if(\File::exists(public_path($oldPathFile))){
                \File::delete(public_path($oldPathFile));
            }

            $image = $request->banner_image;
            $ext = $image->getClientOriginalExtension();
            $imageName = 'Advertising_banner_'.uniqid().'.'.$ext;

            $image->move(public_path($pathFile), $imageName);

            $imagePathFile = $imageName;

       }


        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_url,
                'status' => $request->status,
            ]
        ];
        if(!empty($imagePathFile)){
            $value['banner_one']['banner_image'] = $imagePathFile;
        }else{
            $value['banner_one']['banner_image'] = $request->old_banner_image;
        }
        $value = json_encode($value);
        Advertisement::updateOrCreate(
            ['key' => 'homepage_banner_section_one'],
            ['value' => $value]
        );

        toastr('Updated Successfully' , 'success');
        return redirect()->back();
    }

    public function changeViewList(Request $request)
    {
        Session::put('advertisement_list_style', $request->style);
    }
}
