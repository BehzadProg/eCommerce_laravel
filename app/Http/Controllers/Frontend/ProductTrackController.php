<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductTrackController extends Controller
{
    public function index()
    {
        return view('frontend.pages.product-track');
    }

    public function trackOrder(Request $request)
    {
        $order = Order::where('invocie_id' , $request->track_id)->first();

        return view('frontend.pages.product-track' , ['order' => $order]);
    }
}
