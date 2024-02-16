<?php

namespace App\Http\Controllers\Frontend;

use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShippingRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function index(){
        if(\Cart::content()->count() == 0){
            return redirect()->route('home');
        }
        $addresses = UserAddress::where('user_id' , Auth::user()->id)->latest()->get();
        $shippingMethods = ShippingRule::where('status' , 1)->get();
        return view('frontend.pages.checkout' , compact('addresses' , 'shippingMethods'));
    }

    public function createAddress(Request $request) {
        $request->validate([
            'name' => 'required|max:200',
            'email' => 'required|max:200|email',
            'phone' => 'required|max:200',
            'country' => 'required|max:200',
            'state' => 'required|max:200',
            'city' => 'required|max:200',
            'address' => 'required',
        ]);

        $userAddress = new UserAddress();
        $userAddress->user_id = Auth::user()->id;
        $userAddress->name = $request->name;
        $userAddress->email = $request->email;
        $userAddress->phone = $request->phone;
        $userAddress->country = $request->country;
        $userAddress->state = $request->state;
        $userAddress->city = $request->city;
        $userAddress->address = $request->address;
        $userAddress->save();

        toastr('Created Successfully' , 'success');
        return redirect()->back();
    }

    public function checkoutFormSubmit(Request $request){
        $request->validate([
            'shipping_method_id' => 'required|integer',
            'shipping_address_id' => 'required|integer'
        ]);

        $shippingRule = ShippingRule::findOrFail($request->shipping_method_id);
        if($shippingRule){

            Session::put('shipping_method' , [
                'id' => $shippingRule->id,
                'name' => $shippingRule->name,
                'type' => $shippingRule->type,
                'cost' => $shippingRule->cost,
            ]);
        }

        $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();
        if($address){

            Session::put('address' , $address);
        }

        return response(['status' => 'success' , 'redirect_url' => route('user.payment')]);
    }
}
