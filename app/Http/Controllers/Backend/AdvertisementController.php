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
        $homepage_banner_section_one = json_decode($homepage_banner_section_one?->value);
        $homepage_banner_section_two = Advertisement::where('key' , 'homepage_banner_section_two')->first();
        $homepage_banner_section_two = json_decode($homepage_banner_section_two?->value);
        $homepage_banner_section_three = Advertisement::where('key' , 'homepage_banner_section_three')->first();
        $homepage_banner_section_three = json_decode($homepage_banner_section_three?->value);
        $homepage_banner_section_four = Advertisement::where('key' , 'homepage_banner_section_four')->first();
        $homepage_banner_section_four = json_decode($homepage_banner_section_four?->value);
        $productpage_banner_section = Advertisement::where('key' , 'productpage_banner_section')->first();
        $productpage_banner_section = json_decode($productpage_banner_section?->value);
        $productDetails_page_banner_section = Advertisement::where('key' , 'productDetails_page_banner_section')->first();
        $productDetails_page_banner_section = json_decode($productDetails_page_banner_section?->value);
        $flashsale_banner_section = Advertisement::where('key' , 'flashsale_banner_section')->first();
        $flashsale_banner_section = json_decode($flashsale_banner_section?->value);
        $cartview_banner_section = Advertisement::where('key' , 'cartview_banner_section')->first();
        $cartview_banner_section = json_decode($cartview_banner_section?->value);
        return view('admin.advertisement.index' , 
        compact(
            'homepage_banner_section_one' ,
            'homepage_banner_section_two' ,
            'homepage_banner_section_three' ,
            'homepage_banner_section_four',
            'productpage_banner_section',
            'productDetails_page_banner_section',
            'flashsale_banner_section',
            'cartview_banner_section'
            ));
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

    public function homepageBannerSectionThree(Request $request)
    {

        $request->validate([
            'banner_url_one' => 'required',
            'bannner_image_one' => 'image',
            'status_one' => 'required',
            'banner_url_two' => 'required',
            'bannner_image_two' => 'image',
            'status_two' => 'required',
            'banner_url_three' => 'required',
            'bannner_image_three' => 'image',
            'status_three' => 'required'
        ]);

      $imagePath = updateImage($request , 'banner_image_one' , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH') , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$request->old_banner_image_one);
      $imagePathTwo = updateImage($request , 'banner_image_two' , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH') , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$request->old_banner_image_two);
      $imagePathThree = updateImage($request , 'banner_image_three' , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH') , env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$request->old_banner_image_three);


        $value = [
            'banner_one' => [
                'banner_url' => $request->banner_url_one,
                'status' => $request->status_one,
            ],
            'banner_two' => [
                'banner_url' => $request->banner_url_two,
                'status' => $request->status_two,
            ],
            'banner_three' => [
                'banner_url' => $request->banner_url_three,
                'status' => $request->status_three,
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
        if(!empty($imagePathThree)){
            $value['banner_three']['banner_image'] = $imagePathThree;
        }else{
            $value['banner_three']['banner_image'] = $request->old_banner_image_three;
        }
        $value = json_encode($value);
        Advertisement::updateOrCreate(
            ['key' => 'homepage_banner_section_three'],
            ['value' => $value]
        );

        toastr('Updated Successfully' , 'success');
        return redirect()->back();
    }

    public function homepageBannerSectionFour(Request $request)
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
            ['key' => 'homepage_banner_section_four'],
            ['value' => $value]
        );

        toastr('Updated Successfully' , 'success');
        return redirect()->back();
    }

    public function ProductPageBanner(Request $request)
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
            ['key' => 'productpage_banner_section'],
            ['value' => $value]
        );

        toastr('Updated Successfully' , 'success');
        return redirect()->back();
    }
    public function ProductDetailsPageBanner(Request $request)
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
            ['key' => 'productDetails_page_banner_section'],
            ['value' => $value]
        );

        toastr('Updated Successfully' , 'success');
        return redirect()->back();
    }

    public function flashSaleBanner(Request $request)
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
            ['key' => 'flashsale_banner_section'],
            ['value' => $value]
        );

        toastr('Updated Successfully' , 'success');
        return redirect()->back();
    }

    public function cartViewBanner(Request $request)
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
            ['key' => 'cartview_banner_section'],
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
