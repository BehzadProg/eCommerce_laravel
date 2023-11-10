<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VendorProductVariantDataTable;

class VendorProductVariantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,VendorProductVariantDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
          /** check product owner */
          if($product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        return $dataTable->render('vendor.product.product-variant.index' , compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $product = Product::findOrFail($request->product);
           /** check product owner */
           if($product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        return view('vendor.product.product-variant.create' , compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => 'required|integer',
            'name' => 'required|max:200',
            'status' => 'required',
        ]);

        $variant = new ProductVariant();
        $variant->product_id = $request->product;
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();

        toastr('created Successfully' , 'success');
        return redirect()->route('vendor.product-variants.index' , ['product' => $request->product]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,string $id)
    {
        $productVariant = ProductVariant::findOrFail($id);
        $product = Product::findOrFail($request->product);
         /** check product owner */
         if($product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        if($productVariant->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        return view('vendor.product.product-variant.edit' , compact('productVariant' , 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:200',
            'status' => 'required',
        ]);

        $variant = ProductVariant::findOrFail($id);
        if($variant->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        $variant->name = $request->name;
        $variant->status = $request->status;
        $variant->save();

        toastr('Updated Successfully' , 'success');
        return redirect()->route('vendor.product-variants.index' , ['product' => $variant->product_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        if($variant->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        $variantItemCheck = ProductVariantItem::where('product_variant_id' , $variant->id)->count();
        if($variantItemCheck > 0){
            return response(['status' => 'error' , 'message' => 'This Variant contains, Variant items for delete this you have to delete Variant items first!']);
        }
        $variant->delete();
        return response(['status' => 'success' , 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request){
        $variant = ProductVariant::findOrFail($request->id);
        $variant->status = $request->status == 'true' ? 1 : 0;
        $variant->save();

        return response(['message' => 'status updated successfully']);
    }
}
