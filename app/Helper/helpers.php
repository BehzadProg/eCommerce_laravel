<?php

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

function generateFileName($name , $privateName)
{
    $year = Carbon::now()->year;
    $month = Carbon::now()->month;
    $day = Carbon::now()->day;
    $hour = Carbon::now()->hour;
    $minute = Carbon::now()->minute;
    $second = Carbon::now()->second;
    $microsecond = Carbon::now()->microsecond;

    return $year . '_' . $month . '_' . $day . '_' . $hour . '_' . $minute . '_' . $second . '_' . $microsecond . '_' . $privateName .'.' . $name;
}

function handleUpload($inputName, $model = null, $pathFile = null , $privateName = null)
{
    try {
        if (request()->hasFile($inputName)) {

            if ($model && $model->exists(public_path($model->{$inputName}))) {
                \File::delete(public_path($pathFile) . $model->{$inputName});
            }

            $file = request()->file($inputName);

            $fileName = generateFileName($file->getClientOriginalExtension() , $privateName);

            $file->move(public_path($pathFile), $fileName);

            return $fileName;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

function handleMultiUpload($inputName, $pathFile, $privateName)
{
    try {
        $imagePaths = [];
        if (request()->hasFile($inputName)) {

            $files = request()->file($inputName);

            foreach ($files as $file) {

                $fileName = generateFileName($file->getClientOriginalExtension() , $privateName);

                $file->move(public_path($pathFile), $fileName);

                array_push($imagePaths , $fileName);
            }

            return $imagePaths;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

// handle update image for advertisement banners
function updateImage(Request $request, $inputName, $path, $oldPath=null)
{
    if($request->hasFile($inputName)){
        if(\File::exists(public_path($oldPath))){
            \File::delete(public_path($oldPath));
        }

        $image = $request->{$inputName};
        $ext = $image->getClientOriginalExtension();
        $imageName = 'Advertising_banner_'.uniqid().'.'.$ext;

        $image->move(public_path($path), $imageName);

       return $imageName;
   }
}

function deleteFileIfExist($filePath)
{
    try{

        if(\File::exists(public_path($filePath))){
            \File::delete(public_path($filePath));
        }
    }catch(\Exception $e){
        throw $e;
    }
}

function setActive(array $route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}

/** check if the product has discount */
function checkDiscount($product){
    $currentDate = date('Y-m-d');
    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date){
        return true;
    }
    return false;
}

/** calculate discount percent */

function calculateDiscountPercend($originalPrice,$discountPrice){
    $discountAmount = $originalPrice - $discountPrice;
    $discountPercent = ($discountAmount / $originalPrice) * 100;

    return round($discountPercent);
}

function productType(string $type){
    switch ($type) {
        case 'new_arrival':
            return 'New';
            break;
        case 'featured_product':
            return 'Featured';
            break;
        case 'best_product':
            return 'Best';
            break;
        case 'top_product':
            return 'Top';
            break;

        default:
            return '';
            break;
    }
}

// get sidebar cart total amonut
function cartTotal(){
    $total = 0;
    foreach (\Cart::content() as $product) {
        $total += ($product->price + $product->options->variants_total) * $product->qty;
    }

    return $total;
}


// get payable total amount
function getMainCartTotal() {
    $cartSubTotal = cartTotal();
    if(Session::has('discount')){
        $coupon = Session::get('discount');
        if($coupon['coupon_type'] === 'amount'){
            $total = $cartSubTotal - $coupon['discount'];
            return $total;
        }elseif($coupon['coupon_type'] === 'percent'){
            $discount = $cartSubTotal - ($cartSubTotal * $coupon['discount'] / 100);
            $total = $cartSubTotal - $discount;
            return $total;
        }
    }else{
        return cartTotal();
    }
}

// get coupon discount amount
function getCartDiscount() {
    $cartSubTotal = cartTotal();
    if(Session::has('discount')){
        $coupon = Session::get('discount');
        if($coupon['coupon_type'] === 'amount'){
            return $coupon['discount'];
        }elseif($coupon['coupon_type'] === 'percent'){
            $discount = $cartSubTotal - ($cartSubTotal * $coupon['discount'] / 100);
            return $discount;
        }
    }else{
        return 0;
    }
}

// get selected shipping fee from session
function getShippingFee(){
    if(Session::has('shipping_method')){
        return Session::get('shipping_method')['cost'];
    }else{
        return 0;
    }
}

// get payable final Amount
function getPayableFinalAmount(){
    return getMainCartTotal() + getShippingFee();
}

// text limitaion
function limitText($text , $limit = 20){
    return \Str::limit($text, $limit);
}
