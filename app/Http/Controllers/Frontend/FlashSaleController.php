<?php

namespace App\Http\Controllers\Frontend;

use App\Models\FlashSale;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\FlashSaleItem;
use App\Http\Controllers\Controller;

class FlashSaleController extends Controller
{
    public function index() {
        $flashSale = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('status' , 1)->orderBy('id' , 'ASC')->paginate(20);
        $flashsale_banner_section = Advertisement::where('key' , 'flashsale_banner_section')->first();
        $flashsale_banner_section = json_decode($flashsale_banner_section?->value);
        return view('frontend.pages.flash-sale' , compact('flashSale' , 'flashSaleItems' , 'flashsale_banner_section'));
    }
}
