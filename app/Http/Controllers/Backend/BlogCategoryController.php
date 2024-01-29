<?php

namespace App\Http\Controllers\Backend;

use Str;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\BlogCategoryDataTable;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blog.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
                'name' => 'required|max:200|unique:blog_categories,name'
            ],
            [
                'name.unique' => 'Category already exists!'
            ]
       );

       $category = new BlogCategory();
       $category->name = $request->name;
       $category->slug = Str::slug($request->name);
       $category->status = $request->status;
       $category->save();

       toastr('Created Successfully' , 'success');
       return redirect()->route('admin.blog-category.index');
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
        $category = BlogCategory::findOrFail($id);
        return view('admin.blog.categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'name' => 'required|max:200|unique:blog_categories,name,'.$id
            ],
            [
                'name.unique' => 'Category already exists!'
            ]
        );

        $category = BlogCategory::findOrFail($id);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->status = $request->status;
        $category->save();

        toastr('Updated Successfully' , 'success');
        return redirect()->route('admin.blog-category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = BlogCategory::findOrFail($id);
        $blogCount =  $category->blogs()->count();
        if($blogCount > 0){
            return response(['status' => 'error' , 'message' => 'This Category can\'t be deleted because it contains blogs']);
        }
        $category->delete();
        return response(['status' => 'success' , 'Deleted Successfully']);
    }

    public function changeStatus(Request $request){
        $category = BlogCategory::findOrFail($request->id);
        $category->status = $request->status == 'true' ? 1 : 0;
        $category->save();

        return response(['message' => 'status updated successfully']);
    }
}
