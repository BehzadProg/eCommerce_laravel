<?php

namespace App\Http\Controllers\Backend;

use App\Models\Blog;
use App\Models\User;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\NewsLetterSubscriber;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $todayOrder = Order::whereDate('created_at' , Carbon::today())->count();

        $todayPendingOrder = Order::whereDate('created_at' , Carbon::today())
        ->where('order_status' , 'pending')->count();

        $totalOrder = Order::count();

        $totalPendingOrder = Order::where('order_status' , 'pending')->count();

        $totalCompletedOrder = Order::where('order_status' , 'delivered')->count();

        $totalCanceledOrder = Order::where('order_status' , 'canceled')->count();

        $totalProduct = Product::count();

        $totalBlogs = Blog::count();

        $todayEarning = Order::whereDate('created_at' , Carbon::today())
        ->where('order_status' , '!=' , 'canceled')
        ->sum('sub_total');

        $thisMonthEarning = Order::whereMonth('created_at' , Carbon::now()->month)->where('order_status' , '!=' , 'canceled')
        ->sum('sub_total');

        $thisYearEarning = Order::whereYear('created_at' , Carbon::now()->year)->where('order_status' , '!=' , 'canceled')->sum('sub_total');

        $totalEarning = Order::where('order_status' , '!=' , 'canceled')->sum('sub_total');

        $pendingReviews = ProductReview::where('is_approved' , 0)->count();

        $totalActiveReview = ProductReview::where('is_approved' , 1)->count();

        $totalActiveUser = User::where(['status' => 'active' , 'role' => 'user'])->count();
        $totalActiveVendor = User::where(['status' => 'active' , 'role' => 'vendor'])->count();
        $totalActiveAdmin = User::where(['status' => 'active' , 'role' => 'admin'])->count();
        $banUsers = User::where('status' , 'inactive')->count();
        $requestToBeVendor = Vendor::where('status' , 0)->count();

        $subscribers = NewsLetterSubscriber::where('is_verified' , 1)->count();


        return view('admin.dashboard' , compact(
            'todayOrder',
            'todayPendingOrder',
            'totalOrder',
            'totalPendingOrder',
            'totalCompletedOrder',
            'totalCanceledOrder',
            'totalProduct',
            'totalBlogs',
            'todayEarning',
            'thisMonthEarning',
            'thisYearEarning',
            'totalEarning',
            'pendingReviews',
            'totalActiveReview',
            'totalActiveUser',
            'totalActiveVendor',
            'totalActiveAdmin',
            'banUsers',
            'requestToBeVendor',
            'subscribers'
        ));
    }

    public function login(){
        return view('admin.auth.login');
    }
}
