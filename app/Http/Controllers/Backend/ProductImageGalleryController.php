<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\ProductImageGalleryDataTable;
use App\Models\ProductImageGallery;

class ProductImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request,ProductImageGalleryDataTable $dataTable)
    {
        $product = Product::findOrFail($request->product);
        return $dataTable->render('admin.product.image-gallery.index' , compact('product'));
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
        deleteFileIfExist(env('ADMIN_PRODUCT_GALLERY_IMAGE_UPLOAD_PATH').$productImages->image);
        $productImages->delete();

        return response(['status' => 'success' , 'message' => 'Image Deleted Successfully']);
    }
}
