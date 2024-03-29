<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\SubCategoryDataTable;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.sub-category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::where('status' , 1)->get();
        return view('admin.sub-category.create' , compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required|max:200|unique:sub_categories,name',
            'status' => 'required',
        ]);

        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();

        toastr('Sub Category Created Successfully' , 'success');
        return redirect()->route('admin.sub-category.index');
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
        $subCategory = SubCategory::findOrFail($id);
        $category = Category::where('status' , 1)->get();
        return view('admin.sub-category.edit' , compact('subCategory' , 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'category' => 'required',
            'name' => 'required|max:200|unique:sub_categories,name,'.$id,
            'status' => 'required',
        ]);

        $subCategory = SubCategory::findOrFail($id);
        $subCategory->category_id = $request->category;
        $subCategory->name = $request->name;
        $subCategory->slug = Str::slug($request->name);
        $subCategory->status = $request->status;
        $subCategory->save();

        toastr('Sub Category Updated Successfully' , 'success');
        return redirect()->route('admin.sub-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $childCategory = ChildCategory::where('sub_category_id' , $subCategory->id)->count();
        if($childCategory > 0){
            return response(['status' => 'error' , 'message' => 'This Sub Category contains, sub items for delete this you have to delete sub items first!']);
        }
        $subCategory->delete();
        return response(['status' => 'success', 'message' => 'Deleted Successfully']);
    }

    public function changeStatus(Request $request){
        $subCategory = SubCategory::findOrFail($request->id);
        $subCategory->status = $request->status == 'true' ? 1 : 0;
        $subCategory->save();

        return response(['message' => 'status updated successfully']);
    }
}
