<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function belogDetail(string $slug) {
        $blog = Blog::where('slug' , $slug)->firstOrFail();

        $relatedBlogs = Blog::where('slug', '!=' , $slug)->where(['category_id' => $blog->category_id , 'status' => 1])->orderByDesc('id')->take(5)->get();

        return view('frontend.pages.blog-detail' , compact('blog' , 'relatedBlogs'));
    }
}
