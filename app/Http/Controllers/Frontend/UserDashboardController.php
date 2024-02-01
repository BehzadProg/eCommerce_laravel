<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::where('user_id' , Auth::user()->id)->count();
        $pendingOrders = Order::where('user_id' , Auth::user()->id)
        ->where('order_status' , 'pending')
        ->count();
        $completeOrders = Order::where('user_id' , Auth::user()->id)
        ->where('order_status' , 'delivered')
        ->count();
        $reviews = ProductReview::where('user_id' , Auth::user()->id)->count();
        $wishList = WishList::where('user_id' , Auth::user()->id)->count();
        return view('frontend.dashboard.dashboard' , compact(
            'totalOrders',
            'pendingOrders',
            'completeOrders',
            'reviews',
            'wishList'
        ));
    }
}
