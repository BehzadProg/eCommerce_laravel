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
        $homepage_banner_section_two = Advertisement::where('key' , 'homepage_banner_section_two')->first();
        $homepage_banner_section_two = json_decode($homepage_banner_section_two?->value);
        return view('admin.advertisement.index' , compact('homepage_banner_section_one' , 'homepage_banner_section_two'));
    }

    public function homepageBannerSectionOne(Request $request)
    {

        $request->validate([
            'banner_url' => 'required',
            'bannner_image' => 'image',
            'status' => 'required'
        ]);


        $imagePath = updateImage($request , 'banner_image' , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH') , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$request->old_banner_image);
        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_url,
                'status' => $request->status,
            ]
        ];
        if(!empty($imagePath)){
            $value['banner_one']['banner_image'] = $imagePath;
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
    public function homepageBannerSectionTwo(Request $request)
    {

        $request->validate([
            'banner_url_one' => 'required',
            'bannner_image_one' => 'image',
            'status_one' => 'required',
            'banner_url_two' => 'required',
            'bannner_image_two' => 'image',
            'status_two' => 'required'
        ]);

      $imagePath = updateImage($request , 'banner_image_one' , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH') , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$request->old_banner_image_one);
      $imagePathTwo = updateImage($request , 'banner_image_two' , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH') , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$request->old_banner_image_two);


        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_url_one,
                'status' => $request->status_one,
            ],
            'banner_two' => [
                'banner_url' => $request->banner_url_two,
                'status' => $request->status_two,
            ]
        ];
        if(!empty($imagePath)){
            $value['banner_one']['banner_image'] = $imagePath;
        }else{
            $value['banner_one']['banner_image'] = $request->old_banner_image_one;
        }
        if(!empty($imagePathTwo)){
            $value['banner_two']['banner_image'] = $imagePathTwo;
        }else{
            $value['banner_two']['banner_image'] = $request->old_banner_image_two;
        }
        $value = json_encode($value);
        Advertisement::updateOrCreate(
            ['key' => 'homepage_banner_section_two'],
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
