<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VendorProductVariantItemDataTable;

class VendorProductVariantItemController extends Controller
{
    public function index($productId, $variantId, VendorProductVariantItemDataTable $dataTable)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        /** check product owner */
        if ($product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }
        if ($variant->product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }
        return $dataTable->render('vendor.product.product-variant-item.index', compact('product', 'variant'));
    }

    public function create($productId, $variantId)
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);
        /** check product owner */
        if ($product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }
        if ($variant->product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }
        return view('vendor.product.product-variant-item.create', compact('product', 'variant'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'variant_id' => 'required|integer',
            'name' => 'required|max:200',
            'price' => 'required|integer',
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

        toastr('Created Successfully', 'success');
        return redirect()->route('vendor.variant-item.index', ['productId' => $request->product_id, 'variantId' => $request->variant_id]);
    }

    public function edit(string $productId, string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        $product = Product::findOrFail($productId);
        /** check product owner */
        if ($product->vendor_id !== Auth::user()->vendor->id) {
            abort(404);
        }
        if($variantItem->productVariant->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        return view('vendor.product.product-variant-item.edit', compact('variantItem', 'product'));
    }

    public function update(Request $request, $variantItemId)
    {
        $request->validate([
            'name' => 'required|max:200',
            'price' => 'required|integer',
            'is_default' => 'required',
            'status' => 'required',
        ]);

        $variantItem = ProductVariantItem::findOrFail($variantItemId);
        if($variantItem->productVariant->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        $variantItem->name = $request->name;
        $variantItem->price = $request->price;
        $variantItem->is_default = $request->is_default;
        $variantItem->status = $request->status;
        $variantItem->save();

        toastr('Updated Successfully', 'success');
        return redirect()->route('vendor.variant-item.index', ['productId' => $request->product_id, 'variantId' => $variantItem->product_variant_id]);
    }

    public function destroy(string $variantItemId)
    {
        $variantItem = ProductVariantItem::findOrfail($variantItemId);
        if($variantItem->productVariant->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        $variantItem->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request)
    {
        $variantItem = ProductVariantItem::findOrFail($request->id);
        $variantItem->status = $request->status == 'true' ? 1 : 0;
        $variantItem->save();

        return response(['message' => 'status updated successfully']);
    }
}
