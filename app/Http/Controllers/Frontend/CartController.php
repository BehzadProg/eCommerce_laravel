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
        $productTotalAmount = 0;
        if(checkDiscount($product)){
            $productTotalAmount = $product->offer_price + $variantTotalAmount;
        }else{
            $productTotalAmount = $product->price + $variantTotalAmount;
        }

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productTotalAmount;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['image'] = $product->thumb_image;
        $cartData['options']['slug'] = $product->slug;

        Cart::add($cartData);

        return response(['status' => 'success' , 'message' => 'Added to cart successfully']);
    }
}
