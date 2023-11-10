<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductImageGallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\ProductImageGalleryDataTable;
use App\DataTables\VendorProductImageGalleryDataTable;

class VendorProductImageGallery extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request , VendorProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        /** check product owner */
        if($product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        return $dataTable->render('vendor.product.image-gallery.index' , compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'image.*' => 'required|image|max:2048'
        ]);

        $handleImages = handleMultiUpload('image' , env('ADMIN_PRODUCT_GALLERY_IMAGE_UPLOAD_PATH') , 'gallery_product');

        foreach ($handleImages as $image) {

            $productImageGallery = new ProductImageGallery();
            $productImageGallery->image = $image;
            $productImageGallery->product_id = $request->product;
            $productImageGallery->save();
        }

        toastr('Created Successfully' , 'success');
        return redirect()->back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $productImages = ProductImageGallery::findOrFail($id);
        /** check product owner */
        if($productImages->product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        deleteFileIfExist(env('ADMIN_PRODUCT_GALLERY_IMAGE_UPLOAD_PATH').$productImages->image);
        $productImages->delete();

        return response(['status' => 'success' , 'message' => 'Image Deleted Successfully']);
    }
}
