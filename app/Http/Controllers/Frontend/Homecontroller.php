<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;

class Homecontroller extends Controller
{
    public function index(){
        $sliders = Slider::where('status', 1)->orderBy('priority' , 'asc')->get();
        $flashSale = FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('show_at_home' , 1)->where('status' , 1)->get();
        return view('frontend.home.home', compact('sliders' , 'flashSale' , 'flashSaleItems'));
    }
}
