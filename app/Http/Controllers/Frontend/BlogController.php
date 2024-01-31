<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blog(Request $request)
    {
        if($request->has('search'))
        {
            $blogs = Blog::with(['category'])->where('status' , 1)
            ->where('title' , 'like' , '%'.$request->search.'%')
            ->latest()->paginate(12);
        }elseif($request->has('category')){
            $category = BlogCategory::where(['slug' => $request->category , 'status' => 1])->firstOrFail();
            $blogs = Blog::with(['category'])->where('status' , 1)
            ->where('category_id' , $category->id)
            ->latest()->paginate(12);
        }else{

            $blogs = Blog::with(['category'])->where('status' , 1)->latest()->paginate(12);
        }

        return view('frontend.pages.blog' , compact('blogs'));
    }

    public function belogDetail(string $slug) {
        $blog = Blog::where('slug' , $slug)->firstOrFail();

        $relatedBlogs = Blog::where('slug', '!=' , $slug)->where(['category_id' => $blog->category_id , 'status' => 1])->orderByDesc('id')->take(5)->get();

        $recentBlogs = Blog::where('slug', '!=' , $slug)->where('status' , 1)->latest()->take(5)->get();

        $comments = $blog->comments()->paginate(10);

        $categories = BlogCategory::where('status' , 1)->get();

        return view('frontend.pages.blog-detail' , compact('blog' , 'relatedBlogs' , 'comments' , 'recentBlogs' , 'categories'));
    }

    public function comment(Request $request)
    {
        $request->validate([
            'comment' => 'required|max:1000'
        ]);

        $blogComment = new BlogComment();
        $blogComment->user_id = Auth::user()->id;
        $blogComment->blog_id = $request->blog_id;
        $blogComment->comment = $request->comment;
        $blogComment->save();

        toastr('Comment Added Successfully' , 'success');
        return redirect()->back();
    }
}
