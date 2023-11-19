<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ProductVariantItem;
use Cart;

class CartController extends Controller
{
    /** add item to cart */
    function addToCart(Request $request){
        $product = Product::findOrFail($request->product_id);

        $variants = [];
        $variantTotalAmount = 0;

        if($request->has('variant_items')){

            foreach ($request->variant_items as $item_id) {
                $variant_item = ProductVariantItem::find($item_id);
                $variants[$variant_item->productVariant->name]['name'] = $variant_item->name;
                $variants[$variant_item->productVariant->name]['price'] = $variant_item->price;
                $variantTotalAmount += $variant_item->price;

            }
        }

        /** check discount */
        $productPrice = 0;
        if(checkDiscount($product)){
            $productPrice = $product->offer_price;
        }else{
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

        return response(['status' => 'success' , 'message' => 'Added to cart successfully']);
    }

    /** show cart details page */
    public function cartDetails(){
        $cartItems = Cart::content();
        return view('frontend.pages.cart-detail' , compact('cartItems'));
    }

    /** update product quantity */
    public function updateProductQty(Request $request) {
        Cart::update($request->rowId , $request->quantity);
        $totalPrice = $this->getProductTotal($request->rowId);

        return response(['status' => 'success' , 'totalPrice' => $totalPrice]);
    }

    /** total price amount by quantity */
    public function getProductTotal($rowId){
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;
        return $total;
    }

    /** clear all cart product */
    public function clearCart() {
        Cart::destroy();
        return response(['status' => 'success' , 'message' => 'Cart Cleared Successfully']);
    }

    /** remove product from cart */
    public function removeProduct($rowId){
        Cart::remove($rowId);

        return redirect()->back();
    }

    public function getCartCount() {
        return Cart::content()->count();
    }

}
