<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Http\Controllers\Controller;
use App\DataTables\ProductVariantItemDataTable;
use App\Models\ProductVariantItem;

class ProductVariantItemController extends Controller
{
    public function index(ProductVariantItemDataTable $dataTable , $productId , $variantId){
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        return $dataTable->render('admin.product.product-variant-item.index' , compact('product' , 'variant'));
    }

    public function create(string $productId,string $variantId){
        $variant = ProductVariant::findOrFail($variantId);
        $product = Product::findOrFail($productId);
        return view('admin.product.product-variant-item.create' , compact('variant' , 'product'));
    }

    /** store data */

    public function store(Request $request){

        $request->validate([
            'variant_id' => 'required|integer',
            'name' => 'required|max:200',
            'is_default' => 'required',
            'status' => 'required',
        ]);

        $variantItem = new ProductVariantItem();
        $variantItem->product_variant_id = $request->variant_id;
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('Created Successfully' , 'success');
        return redirect()->route('admin.variant-item.index' , ['productId' => $request->product_id ,'variantId' => $request->variant_id]);

    }

}
