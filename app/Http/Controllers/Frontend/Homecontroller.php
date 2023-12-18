<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Brand;
use App\Models\Slider;
use App\Models\Product;
use App\Models\FlashSale;
use Illuminate\Http\Request;
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
        return view(
            'frontend.home.home',
            compact(
                'sliders',
                'flashSale',
                'flashSaleItems',
                'popularCategory',
                'brands',
                'productBaseType'
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
}
