<?php

namespace App\Http\Controllers\Backend;

use Str;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\ChildCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\DataTables\VendorProductDataTable;

class VendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(VendorProductDataTable $dataTable)
    {
        return $dataTable->render('vendor.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $brands = Brand::all();
        return view('vendor.product.create' , compact('category' , 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumb_image' => ['required', 'image', 'max:3000'],
            'name' => ['required', 'max:200'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max:600'],
            'long_description' => ['required'],
            'seo_title' => ['nullable', 'max:200'],
            'seo_description' => ['nullable', 'max:250'],
            'status' => ['required']
        ]);

        /** Handle the image upload */
        $imagePath = handleUpload('thumb_image', null, env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH'), 'Vendor_product');

        $product = new Product();
        $product->thumb_image = $imagePath;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        if($request->offer_price){
            $product->offer_start_date = $request->offer_start_date;
            $product->offer_end_date = $request->offer_end_date;
        }else{
            $product->offer_start_date = null;
            $product->offer_end_date = null;
        }
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->is_approved = 0;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr('Product Created Successfully!', 'success');

        return redirect()->route('vendor.products.index');
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
        $products = Product::findOrFail($id);
        /** check if it's the owner of the product */
        if($products->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        $category = Category::all();
        $brands = Brand::all();
        $subCategory = SubCategory::where('category_id', $products->category_id)->get();
        $childCategory = ChildCategory::where('sub_category_id', $products->sub_category_id)->get();
        return view('vendor.product.edit', compact('products', 'category', 'brands', 'subCategory', 'childCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'thumb_image' => ['image', 'max:3000'],
            'name' => ['required', 'max:200'],
            'category' => ['required'],
            'brand' => ['required'],
            'price' => ['required'],
            'qty' => ['required'],
            'short_description' => ['required', 'max:600'],
            'long_description' => ['required'],
            'seo_title' => ['nullable', 'max:200'],
            'seo_description' => ['nullable', 'max:250'],
            'status' => ['required']
        ]);

        /** Handle the image upload */

        $product = Product::findOrFail($id);
         /** check if it's the owner of the product */
         if($product->vendor_id !== Auth::user()->vendor->id){
            abort(404);
        }
        $imagePath = handleUpload('thumb_image', $product, env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH'), 'Vendor_product');
        $product->thumb_image = (!empty($imagePath) ? $imagePath : $product->thumb_image);
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->vendor_id = Auth::user()->vendor->id;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->child_category_id = $request->child_category;
        $product->brand_id = $request->brand;
        $product->qty = $request->qty;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->video_link = $request->video_link;
        $product->sku = $request->sku;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        if($request->offer_price){
            $product->offer_start_date = $request->offer_start_date;
            $product->offer_end_date = $request->offer_end_date;
        }else{
            $product->offer_start_date = null;
            $product->offer_end_date = null;
        }
        $product->product_type = $request->product_type;
        $product->status = $request->status;
        $product->is_approved = $product->is_approved;
        $product->seo_title = $request->seo_title;
        $product->seo_description = $request->seo_description;
        $product->save();

        toastr('Product Updated Successfully!', 'success');

        return redirect()->route('vendor.products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();

        return response(['message' => 'status updated successfully']);
    }

    public function getSubCategory(Request $request)
    {
        $subCategory = SubCategory::where('category_id', $request->id)->get();
        return $subCategory;
    }

    public function getChildCategory(Request $request)
    {
        $childCategory = ChildCategory::where('sub_category_id', $request->id)->get();
        return $childCategory;
    }
}