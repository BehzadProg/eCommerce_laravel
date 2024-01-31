<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function belogDetail(string $slug) {
        $blog = Blog::where('slug' , $slug)->firstOrFail();

        $relatedBlogs = Blog::where('slug', '!=' , $slug)->where(['category_id' => $blog->category_id , 'status' => 1])->orderByDesc('id')->take(5)->get();

        $recentBlogs = Blog::where('slug', '!=' , $slug)->where('status' , 1)->latest()->take(5)->get();

        $comments = $blog->comments()->paginate(10);

        return view('frontend.pages.blog-detail' , compact('blog' , 'relatedBlogs' , 'comments' , 'recentBlogs'));
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
