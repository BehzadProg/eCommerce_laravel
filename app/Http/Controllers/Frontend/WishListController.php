<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index() {

        $wishlist = WishList::with('product')->where('user_id' , Auth::user()->id)->latest()->get();
        if(count($wishlist) === 0){
            toastr('First add product to wishlist' , 'info');
            return redirect()->route('home');
        }
        return view('frontend.pages.wishlist' , compact('wishlist'));
    }

    public function addToWishList(Request $request) {
       if(!Auth::check()){
        return response(['status' => 'info' , 'message' => 'For adding product to wishList you have to login!']);
       }

       $wishlistCount = WishList::where(['product_id' => $request->id , 'user_id' => Auth::user()->id])->count();
       if($wishlistCount > 0){
        return response(['status' => 'info' , 'message' => 'The product is already exist at your wishlist']);
       }

       $wishlist = new WishList();
       $wishlist->product_id = $request->id;
       $wishlist->user_id = Auth::user()->id;
       $wishlist->save();

       //change count number in header
       $count = WishList::where('user_id' , Auth::user()->id)->count();

       return response(['status' => 'success' , 'message' => 'Added to your wishlist successfully' , 'count' => $count]);
    }

    public function destroy(Request $request) {
        $wishlist = WishList::where('id' , $request->id)->firstOrFail();
        if($wishlist->user_id !== Auth::user()->id){
            return redirect()->back();
        }
        $wishlist->delete();

        //change count number in header
        $count = WishList::where('user_id' , Auth::user()->id)->count();
        return response(['status' => 'success' , 'message' => 'Product removed successfully' , 'redirect' => route('home') , 'count' => $count]);
    }
}
