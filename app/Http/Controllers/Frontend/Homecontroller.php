<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\Vendor;
use App\Models\Product;
use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\FlashSaleItem;
use App\Models\HomePageSetting;
use App\Http\Controllers\Controller;

class Homecontroller extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('priority', 'asc')->get();
        $flashSale = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('show_at_home', 1)->where('status', 1)->get();
        $popularCategory = HomePageSetting::where('key' , 'popular_category_section')->first();
        $brands = Brand::where('status' , 1)->where('is_featured' , 1)->get();
        $productBaseType = $this->getProductBaseType();
        $productSliderSectionOne = HomePageSetting::where('key' , 'product_slider_section_one')->first();
        $productSliderSectionTwo = HomePageSetting::where('key' , 'product_slider_section_two')->first();
        $productSliderSectionThree = HomePageSetting::where('key' , 'product_slider_section_three')->first();

        //advertising banners
        $homepage_banner_section_one = Advertisement::where('key' , 'homepage_banner_section_one')->first();
        $homepage_banner_section_one = json_decode($homepage_banner_section_one?->value);
        $homepage_banner_section_two = Advertisement::where('key' , 'homepage_banner_section_two')->first();
        $homepage_banner_section_two = json_decode($homepage_banner_section_two?->value);
        $homepage_banner_section_three = Advertisement::where('key' , 'homepage_banner_section_three')->first();
        $homepage_banner_section_three = json_decode($homepage_banner_section_three?->value);
        $homepage_banner_section_four = Advertisement::where('key' , 'homepage_banner_section_four')->first();
        $homepage_banner_section_four = json_decode($homepage_banner_section_four?->value);

        //blogs
        $blogs = Blog::with(['category'])->where('status' , 1)->orderByDesc('id')->take(8)->get();

        return view('frontend.home.home',
            compact(
                'sliders',
                'flashSale',
                'flashSaleItems',
                'popularCategory',
                'brands',
                'productBaseType',
                'productSliderSectionOne',
                'productSliderSectionTwo',
                'productSliderSectionThree',

                'homepage_banner_section_one',
                'homepage_banner_section_two',
                'homepage_banner_section_three',
                'homepage_banner_section_four',

                'blogs'
            )
        );
    }

    public function getProductBaseType()
    {
        $productBaseType = [];

        $productBaseType['new_arrival'] = Product::where(['product_type' => 'new_arrival' , 'is_approved' => 1 , 'status' => 1])->orderBy('id' , 'DESC')->take(8)->get();
        $productBaseType['top_product'] = Product::where(['product_type' => 'top_product' , 'is_approved' => 1 , 'status' => 1])->orderBy('id' , 'DESC')->take(8)->get();
        $productBaseType['best_product'] = Product::where(['product_type' => 'best_product' , 'is_approved' => 1 , 'status' => 1])->orderBy('id' , 'DESC')->take(8)->get();
        $productBaseType['featured_product'] = Product::where(['product_type' => 'featured_product' , 'is_approved' => 1 , 'status' => 1])->orderBy('id' , 'DESC')->take(8)->get();

        return $productBaseType;
    }

    public function vendorPage()
    {
        $vendors = Vendor::where('status' , 1)->paginate(10);
        return view('frontend.pages.vendor' , compact('vendors'));
    }

    public function vendorProductPage(string $id)
    {
        $products = Product::where(['status' => 1, 'is_approved' => 1 , 'vendor_id' => $id])->orderBy('id', 'DESC')
        ->paginate(12);

        $vendor = Vendor::findOrFail($id);

        return view('frontend.pages.vendor-product', compact('products' , 'vendor'));
    }
}
