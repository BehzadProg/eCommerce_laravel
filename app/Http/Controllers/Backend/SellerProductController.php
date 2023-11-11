<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SellerProductDataTable;
use App\DataTables\SellerPendingProductDataTable;

class SellerProductController extends Controller
{
    public function index(SellerProductDataTable $dataTable){
        return $dataTable->render('admin.product.seller-product.index');
    }

    public function pendingProducts(SellerPendingProductDataTable $dataTable){
        return $dataTable->render('admin.product.seller-pending-product.index');
    }

    public function changeApprove(Request $request){
        $product = Product::findOrFail($request->id);
        $product->is_approved = $request->value;
        $product->save();
        return response(['message' => 'Product Approve Status Has Been Changed']);
    }
}
