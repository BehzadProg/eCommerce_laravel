@extends('frontend.layouts.master')
@section('title')
    {{ $settings->site_name }} - Blog Details
@endsection
@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Blog Details</h4>
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li><a href="javascript:;">Blog Details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->

    <!--============================
        BLOGS DETAILS START
    ==============================-->
    <section id="wsus__blog_details">
        <div class="container">
            <div class="row">
                <div class="col-xxl-9 col-xl-8 col-lg-8">
                    <div class="wsus__main_blog">
                        <div class="wsus__main_blog_img">
                            <img src="{{asset(env('BLOG_IMAGE_UPLOAD_PATH').$blog->image)}}" alt="blog" class="img-fluid w-100">
                        </div>
                        <p class="wsus__main_blog_header">
                            <span><i class="fas fa-user-tie"></i> by {{$blog->user->name}}</span>
                            <span><i class="fal fa-calendar-alt"></i> {{date('M d Y' , strtotime($blog->created_at))}}</span>
                        </p>
                        <div class="wsus__description_area">
                            <h1>{!!$blog->title!!}</h1>
                            {!!$blog->description!!}
                        </div>
                        <div class="wsus__share_blog">
                            <p>share:</p>
                            <ul>
                                <li><a target="_blank" class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{url()->current()}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a target="_blank" class="twitter" href="https://twitter.com/share?url={{url()->current()}}&text={{$blog->title}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a target="_blank" class="linkedin" href="https://www.linkedin.com/shareArticle?url={{url()->current()}}&title={{$blog->title}}&summary={{limitText($blog->description , 40)}}"><i class="fab fa-linkedin-in"></i></a></li>
                            </ul>
                        </div>
                        <div class="wsus__related_post">
                            @if (count($relatedBlogs) != 0)

                            <div class="row">
                                <div class="col-xl-12">
                                    <h5>related post</h5>
                                </div>
                            </div>
                            @endif
                            <div class="row blog_det_slider">
                                @foreach ($relatedBlogs as $relatedblog)

                                <div class="col-xl-3">
                                    <div class="wsus__single_blog wsus__single_blog_2">
                                        <a class="wsus__blog_img" href="{{route('blog-details' , $relatedblog->slug)}}">
                                            <img src="{{asset(env('BLOG_IMAGE_UPLOAD_PATH').$relatedblog->image)}}" alt="blog" class="img-fluid w-100">
                                        </a>
                                        <div class="wsus__blog_text">
                                            <a class="blog_top red" href="{{route('blog' , ['category' => $relatedblog->category->slug])}}">{{$relatedblog->category->name}}</a>
                                            <div class="wsus__blog_text_center">
                                                <a href="{{route('blog-details' , $relatedblog->slug)}}">{!!limitText($relatedblog->title , 45)!!}</a>
                                                <p class="date">{{date('M d Y' , strtotime($relatedblog->created_at))}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="wsus__comment_area">
                            <h4>comment <span>{{$comments->total()}}</span></h4>
                            @if (count($comments) === 0)
                            <div style="text-align: center;color:#7a8c95">
                                Be a first one to comment
                            </div>
                            @else

                                @foreach ($comments as $comment)

                                <div class="wsus__main_comment">
                                    <div class="wsus__comment_img">
                                        <img src="{{asset(env('PROFILE_IMAGE_UPLOAD_PATH').$comment->user->image)}}" alt="user" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__comment_text replay">
                                        <h6>{{$comment->user->name}} <span>{{date('d M Y' , strtotime($comment->created_at))}}</span></h6>
                                        <p>{{$comment->comment}}</p>

                                    </div>
                                </div>
                                @endforeach

                            @endif

                            <div id="pagination">
                                <div class="mt-5">
                                    @if ($comments->hasPages())
                                    {{$comments->withQueryString()->links()}}
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="wsus__post_comment">
                            <h4>post a comment</h4>
                            <form action="{{route('user.blog-comment')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="wsus__single_com">
                                            <textarea rows="5" placeholder="Your Comment" name="comment"></textarea>
                                            <input type="hidden" name="blog_id" value="{{$blog->id}}">
                                        </div>
                                    </div>
                                </div>
                                <button class="common_btn" type="submit">post comment</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-xl-4 col-lg-4">
                    <div class="wsus__blog_sidebar" id="sticky_sidebar">
                        <div class="wsus__blog_search">
                            <h4>search</h4>
                            <form action="{{route('blog')}}" method="GET">
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit" class="common_btn"><i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="wsus__blog_category">
                            <h4>Categories</h4>
                            <ul>
                                @foreach ($categories as $category)

                                <li><a href="{{route('blog' , ['category' => $category->slug])}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="wsus__blog_post">
                            <h4>Recent Post</h4>
                            @foreach ($recentBlogs as $recentBlog)

                            <div class="wsus__blog_post_single">
                                <a href="{{route('blog-details' , $recentBlog->slug)}}" class="wsus__blog_post_img">
                                    <img src="{{asset(env('BLOG_IMAGE_UPLOAD_PATH').$recentBlog->image)}}" alt="blog" class="imgofluid w-100">
                                </a>
                                <div class="wsus__blog_post_text">
                                    <a href="{{route('blog-details' , $recentBlog->slug)}}">{{limitText($recentBlog->title)}}</a>
                                    <p> <span>{{date('M d Y' , strtotime($recentBlog->created_at))}}</span> {{$recentBlog->comments->count()}} Comment </p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BLOGS DETAILS END
    ==============================-->

@endsection
