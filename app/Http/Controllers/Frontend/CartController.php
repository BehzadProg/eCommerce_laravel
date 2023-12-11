<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\coupon;
use App\Models\ProductVariantItem;
use Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /** show cart details page */
    public function cartDetails()
    {
        $cartItems = Cart::content();

        if(count($cartItems) === 0){
            Session::forget('discount');
            toastr('For see your cart you have to add product to your cart' , 'info' , 'Cart Is Empty!');
            return redirect()->route('home');
        }
        return view('frontend.pages.cart-detail', compact('cartItems'));
    }

    /** add item to cart */
    function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        // check product quantity
        if ($product->qty === 0) {
            return response(['status' => 'stock_limit', 'message' => 'Product Stock out!']);
        } elseif ($product->qty < $request->qty) {
            return response(['status' => 'stock_limit', 'message' => 'Quantity is not available!']);
        }


        $variants = [];
        $variantTotalAmount = 0;

        if ($request->has('variant_items')) {

            foreach ($request->variant_items as $item_id) {
                $variant_item = ProductVariantItem::find($item_id);
                $variants[$variant_item->productVariant->name]['name'] = $variant_item->name;
                $variants[$variant_item->productVariant->name]['price'] = $variant_item->price;
                $variantTotalAmount += $variant_item->price;
            }
        }

        /** check discount */
        $productPrice = 0;
        if (checkDiscount($product)) {
            $productPrice = $product->offer_price;
        } else {
            $productPrice = $product->price;
        }

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        Cart::add($cartData);

        return response(['status' => 'success', 'message' => 'Added to cart successfully']);
    }

    /** update product quantity */
    public function updateProductQty(Request $request)
    {
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);
        // check product quantity
        if ($product->qty === 0) {
            return response(['status' => 'stock_limit', 'message' => 'Product Stock out!']);
        } elseif ($product->qty < $request->quantity) {
            return response(['status' => 'stock_limit', 'message' => 'Quantity is not available!']);
        }

        Cart::update($request->rowId, $request->quantity);
        $totalPrice = $this->getProductTotal($request->rowId);

        return response(['status' => 'success', 'totalPrice' => $totalPrice]);
    }

    /** total price amount by quantity */
    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;
        return $total;
    }

    // get sidebar cart total amonut
    public function cartTotal()
    {
        $total = 0;
        foreach (Cart::content() as $product) {
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }

    /** clear all cart product */
    public function clearCart()
    {
        Cart::destroy();
        return response(['status' => 'success', 'message' => 'Cart Cleared Successfully']);
    }

    /** remove product from cart */
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    public function getCartCount()
    {
        return Cart::content()->count();
    }

    public function fetchCartProduct()
    {
        return Cart::content();
    }

    public function removeCartProduct(Request $request)
    {
        Cart::remove($request->rowId);

        return response(['status' => 'success', 'message' => 'Product removed successfully']);
    }

    public function applyCoupon(Request $request){

        if($request->coupon_code === null){
            return response(['status' => 'error' , 'message' => 'Coupon filled is required']);
        }

        $coupon = coupon::where([ 'code' => $request->coupon_code  , 'status' => 1])->first();

        if($coupon === null){
            return response(['status' => 'error' , 'message' => 'Coupon not exist!']);
        }elseif($coupon->start_date > date('Y-m-d')){
            return response(['status' => 'error' , 'message' => 'Coupon not exist!']);
        }elseif($coupon->end_date < date('Y-m-d')){
            return response(['status' => 'error' , 'message' => 'Coupon is expired!']);
        }elseif($coupon->total_used >= $coupon->quantity){
            return response(['status' => 'error' , 'message' => 'This Coupon is not useable anymore!']);
        }

        if($coupon->discount_type === 'amount'){
            Session::put('discount' , [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'coupon_type' => 'amount',
                'discount' => $coupon->discount,
            ]);
        }elseif($coupon->discount_type === 'percent'){
            Session::put('discount' , [
                'coupon_name' => $coupon->name,
                'coupon_code' => $coupon->code,
                'coupon_type' => 'percent',
                'discount' => $coupon->discount,
            ]);
        }

        return response(['status' => 'success' , 'message' => 'Coupon applied successfully']);
    }

    //Calculate Coupon discount
    public function couponCalculation(){
        $cartSubTotal = cartTotal();
        if(Session::has('discount')){
            $coupon = Session::get('discount');
            if($coupon['coupon_type'] === 'amount'){
                $total = $cartSubTotal - $coupon['discount'];
                return response(['status' => 'success' , 'cart_total' => $total , 'discount' => $coupon['discount'] ]);
            }elseif($coupon['coupon_type'] === 'percent'){
                $discount = $cartSubTotal - ($cartSubTotal * $coupon['discount'] / 100);
                $total = $cartSubTotal - $discount;
                return response(['status' => 'success' , 'cart_total' => $total , 'discount' => $discount ]);
            }
        }else{
            $total = cartTotal();
            return response(['status' => 'success' , 'cart_total' => $total , 'discount' => 0 ]);
        }
    }
}
