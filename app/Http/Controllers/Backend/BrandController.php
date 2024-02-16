<?php

namespace App\Http\Controllers\Backend;

use Str;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\DataTables\BrandDataTable;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'required|mimes:png,jpg,jpeg|max:2000',
            'name' => 'required|max:200',
            'is_featured' => 'required',
            'status' => 'required',
        ]);

        $brand = new Brand();
        $imagePath = handleUpload('logo' , null , env('BRAND_IMAGE_UPLOAD_PATH') , 'brand_logo');
        $brand->logo = $imagePath;
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Brand Created Successfully' , 'success');
        return redirect()->route('admin.brand.index');
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
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit' , compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => 'mimes:png,jpg,jpeg|max:2000',
            'name' => 'required|max:200',
            'is_featured' => 'required',
            'status' => 'required',
        ]);

        $brand = Brand::findOrFail($id);
        $imagePath = handleUpload('logo' , $brand , env('BRAND_IMAGE_UPLOAD_PATH') , 'brand_logo');
        $brand->logo = (!empty($imagePath) ? $imagePath : $brand->logo);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->is_featured = $request->is_featured;
        $brand->status = $request->status;
        $brand->save();

        toastr('Brand Updated Successfully' , 'success');
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::findOrFail($id);
        if(Product::where('brand_id' , $brand->id)->count() > 0){
            return response([ 'status' => 'error','message' => 'This brand have products you can\'t delete it']);
        }
        deleteFileIfExist(env('BRAND_IMAGE_UPLOAD_PATH').$brand->logo);
        $brand->delete();
        return response([ 'status' => 'success','message' => 'Deleted successfully']);
    }

    public function changeStatus(Request $request){
        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status == 'true' ? 1 : 0;
        $brand->save();

        return response(['message' => 'status updated successfully']);
    }
}
