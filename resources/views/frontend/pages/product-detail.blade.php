@extends('frontend.layouts.master')
@section('title')
    {{ $settings->site_name }} || {{ $product->slug }} - Product-detail
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
                        <h4>products details</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">product details</a></li>
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
                        PRODUCT DETAILS START
                    ==============================-->
    <section id="wsus__product_details">
        <div class="container">
            <div class="wsus__details_bg">
                <div class="row">
                    <div class="col-xl-4 col-md-5 col-lg-5" style="z-index: 10">
                        <div id="sticky_pro_zoom">
                            <div class="exzoom hidden" id="exzoom">
                                <div class="exzoom_img_box">
                                    @if ($product->video_link)
                                        <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                            href="{{ $product->video_link }}">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    @endif
                                    <ul class='exzoom_img_ul'>

                                        <li><img class="zoom ing-fluid w-100"
                                                src="{{ asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH') . $product->thumb_image) }}"
                                                alt="product"></li>

                                        @foreach ($product->productImageGalleries as $productImage)
                                            <li><img class="zoom ing-fluid w-100"
                                                    src="{{ asset(env('ADMIN_PRODUCT_GALLERY_IMAGE_UPLOAD_PATH') . $productImage->image) }}"
                                                    alt="product"></li>
                                        @endforeach

                                    </ul>
                                </div>
                                <div class="exzoom_nav"></div>
                                <p class="exzoom_btn">
                                    <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="far fa-chevron-left"></i> </a>
                                    <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="far fa-chevron-right"></i> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-md-7 col-lg-7">
                        <div class="wsus__pro_details_text">
                            <a class="title" href="javascript:void(0)">{{ $product->name }}</a>
                            @if ($product->qty > 0)
                                <p class="wsus__stock_area"><span class="in_stock">in stock</span> ({{ $product->qty }}
                                    item)</p>
                            @elseif ($product->qty === 0)
                                <p class="wsus__stock_area"><span class="in_stock">stock out</span> ({{ $product->qty }}
                                    item)</p>
                            @endif
                            @if (checkDiscount($product))
                                <h4>{{ $settings->currency_icon }}{{ $product->offer_price }}
                                    <del>{{ $settings->currency_icon }}{{ $product->price }}</del>
                                </h4>
                            @else
                                <h4>{{ $settings->currency_icon }}{{ $product->price }}</h4>
                            @endif
                            <p class="review">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>20 review</span>
                            </p>
                            <p class="description">{!! $product->short_description !!}</p>

                            <form class="shopping-cart-form">

                                <div class="wsus__selectbox">
                                    <div class="row">
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @foreach ($product->variants as $variant)
                                            @if ($variant->status != 0)
                                                <div class="col-xl-6 col-sm-6">
                                                    <h5 class="mb-2">{{ $variant->name }}:</h5>
                                                    <select class="select_2" name="variant_items[]">
                                                        @foreach ($variant->productVariantItems as $variantItem)
                                                            @if ($variantItem->status != 0)
                                                                <option value="{{ $variantItem->id }}"
                                                                    {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                    {{ $variantItem->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>

                                <div class="wsus__quentity">
                                    <h5>quentity :</h5>
                                    <div class="select_number">
                                        <input class="number_area" type="text" name="qty" min="1"
                                            max="100" value="1" />
                                    </div>

                                </div>

                                <ul class="wsus__button_area">
                                    <li><button type="submit" class="add_cart" href="#">add to cart</button></li>
                                    <li><a class="buy_now" href="#">buy now</a></li>
                                    <li><a href="#" data-id="{{ $product->id }}" class="add_to_wishlist"><i
                                                class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a></li>
                                </ul>
                            </form>
                            <p class="brand_model"><span>Category :</span> {{ $product->category->name }}</p>
                            <p class="brand_model"><span>Brand :</span> {{ $product->brand->name }}</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-12 mt-md-5 mt-lg-0">
                        <div class="wsus_pro_det_sidebar" id="sticky_sidebar">
                            <ul>
                                <li>
                                    <span><i class="fal fa-truck"></i></span>
                                    <div class="text">
                                        <h4>Return Available</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                                <li>
                                    <span><i class="far fa-shield-check"></i></span>
                                    <div class="text">
                                        <h4>Secure Payment</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                                <li>
                                    <span><i class="fal fa-envelope-open-dollar"></i></span>
                                    <div class="text">
                                        <h4>Warranty Available</h4>
                                        <!-- <p>Lorem Ipsum is simply dummy text of the printing</p> -->
                                    </div>
                                </li>
                            </ul>
                            @if ($productDetails_page_banner_section->banner_one->status == 1)
                                <div class="wsus__det_sidebar_banner">
                                    <a href="{{ $productDetails_page_banner_section->banner_one->banner_url }}"
                                        target="_blank">
                                        <img class="img-fluid"
                                            src="{{ asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH') . $productDetails_page_banner_section->banner_one->banner_image) }}"
                                            alt="img">
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__pro_det_description">
                        <div class="wsus__details_bg">
                            <ul class="nav nav-pills mb-3" id="pills-tab3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{session()->has('description_list_style') && session()->get('description_list_style') === 'description' ? 'active' : ''}} {{!session()->has('description_list_style') ? 'active' : ''}} list-view" data-id="description" id="pills-home-tab7" data-bs-toggle="pill"
                                        data-bs-target="#pills-home22" type="button" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Description</button>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{session()->has('description_list_style') && session()->get('description_list_style') === 'vendorInfo' ? 'active' : ''}} list-view" data-id="vendorInfo" id="pills-contact-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact" type="button" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">Vendor Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{session()->has('description_list_style') && session()->get('description_list_style') === 'review' ? 'active' : ''}} list-view" data-id="review" id="pills-contact-tab2" data-bs-toggle="pill"
                                        data-bs-target="#pills-contact2" type="button" role="tab"
                                        aria-controls="pills-contact2" aria-selected="false">Reviews</button>
                                </li>


                            </ul>
                            <div class="tab-content" id="pills-tabContent4">
                                <div class="tab-pane fade {{session()->has('description_list_style') && session()->get('description_list_style') === 'description' ? 'show active' : ''}} {{!session()->has('description_list_style') ? 'show active' : ''}}" id="pills-home22" role="tabpanel"
                                    aria-labelledby="pills-home-tab7">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="wsus__description_area">
                                                {!! $product->long_description !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade {{session()->has('description_list_style') && session()->get('description_list_style') === 'vendorInfo' ? 'show active' : ''}}" id="pills-contact" role="tabpanel"
                                    aria-labelledby="pills-contact-tab">
                                    <div class="wsus__pro_det_vendor">
                                        <div class="row">
                                            <div class="col-xl-6 col-xxl-5 col-md-6">
                                                <div class="wsus__vebdor_img">
                                                    <img src="{{ asset(env('VENDOR_SHOP_PROFILE_BANNER_UPLOAD_PATH') . $product->vendor->banner) }}"
                                                        alt="vensor" class="img-fluid w-100">
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-xxl-7 col-md-6 mt-4 mt-md-0">
                                                <div class="wsus__pro_det_vendor_text">
                                                    <h4>{{ $product->vendor->user->username }}</h4>
                                                    <p class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>(41 review)</span>
                                                    </p>
                                                    <p><span>Store Name:</span> {{ $product->vendor->shop_name }}</p>
                                                    <p><span>Address:</span> {{ $product->vendor->address }}</p>
                                                    <p><span>Phone:</span> {{ $product->vendor->phone }}</p>
                                                    <p><span>mail:</span> {{ $product->vendor->email }}</p>
                                                    <a href="vendor_details.html" class="see_btn">visit store</a>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="wsus__vendor_details">
                                                    {!! $product->vendor->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{session()->has('description_list_style') && session()->get('description_list_style') === 'review' ? 'show active' : ''}}" id="pills-contact2" role="tabpanel"
                                    aria-labelledby="pills-contact-tab2">
                                    <div class="wsus__pro_det_review">
                                        @php
                                            $is_bought = false;
                                            $orders = \App\Models\Order::where(['user_id' => @Auth()->user()->id, 'order_status' => 'delivered'])->get();
                                            foreach ($orders as $key => $order) {
                                                $existItem = $order
                                                    ->orderProducts()
                                                    ->where('product_id', $product->id)
                                                    ->first();

                                                if ($existItem) {
                                                    $is_bought = true;
                                                }
                                            }
                                        @endphp
                                        <div class="wsus__pro_det_review_single">
                                            <div class="row">
                                                <div class="{{ $is_bought === false ? 'col-xl-12' : 'col-xl-8' }} col-lg-7">
                                                    @if (count($productReview) > 0)

                                                    <div class="wsus__comment_area">
                                                        <h4>Reviews <span>{{count($productReview)}}</span></h4>
                                                        @foreach ($productReview as $review)

                                                        <div class="wsus__main_comment">
                                                            <div class="wsus__comment_img">
                                                                <img src="{{asset(env('PROFILE_IMAGE_UPLOAD_PATH').$review->user->image)}}" alt="user"
                                                                    class="img-fluid w-100">
                                                            </div>
                                                            <div class="wsus__comment_text reply">
                                                                <h6>{{$review->user->name}} <span>{{$review->productReviewRate->rate}} <i
                                                                            class="fas fa-star"></i></span></h6>
                                                                <span>{{date('d M Y' , strtotime($review->created_at))}}</span>
                                                                <p>
                                                                    {!! $review->review !!}
                                                                </p>
                                                                <ul class="">
                                                                    @if ($review->productReviewGalleries)
                                                                    @foreach ($review->productReviewGalleries as $image)

                                                                    <li><img src="{{asset(env('REVIEW_GALLERY_IMAGE_UPLOAD_PATH').$image->image)}}" alt="product"
                                                                            class="img-fluid w-100"></li>
                                                                    @endforeach
                                                                    @endif
                                                                </ul>

                                                            </div>
                                                        </div>
                                                        @endforeach

                                                        <div class="mt-5">
                                                            @if ($productReview->hasPages())
                                                            {{$productReview->links()}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="wsus__comment_area">
                                                        <h4>Reviews <span>{{count($productReview)}}</span></h4>
                                                        <div class="wsus__main_comment">
                                                            <p class="text-center">There isn't any review for this product</p>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                                <div class="col-xl-4 col-lg-5 mt-4 mt-lg-0">

                                                    @if ($is_bought === true)
                                                        <div class="wsus__post_comment rev_mar" id="sticky_sidebar3">
                                                            <h4>write a Review</h4>
                                                            <form action="{{ route('user.review.store') }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-2" data-rating-stars="5"
                                                                    data-rating-value="0" data-rating-input="#rate-input">
                                                                    select your rating : </div>

                                                                <div class="row">
                                                                    <div class="col-xl-12">
                                                                        <div class="col-xl-12">
                                                                            <div class="wsus__single_com">
                                                                                <textarea cols="3" rows="3" name="review" placeholder="Write your review"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input id="rate-input" type="hidden" name="rate"
                                                                        value="0">
                                                                </div>
                                                                <div class="img_upload">
                                                                    <div class="gallery">
                                                                        <input type="file" name="image[]" multiple>
                                                                    </div>
                                                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                                                    <input type="hidden" name="vendor_id" value="{{$product->vendor_id}}">
                                                                </div>
                                                                <button class="common_btn" type="submit">submit
                                                                    review</button>
                                                            </form>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--============================
                        PRODUCT DETAILS END
                    ==============================-->


    <!--============================
        RELATED PRODUCT START
    ==============================-->
        @if (count($relatedProducts) > 0)

        <section id="wsus__flash_sell">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__section_header">
                            <h3>Related Products</h3>

                            @if (count($relatedProducts) > 8)

                            <a class="see_btn" target="_blank" href="{{route('product.index' , ['category' => $relatedProducts->first()->category->slug])}}">see more <i class="fas fa-caret-right"></i></a>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="row flash_sell_slider">
                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        @foreach ($relatedProducts as $product)

                        <div class="wsus__product_item">
                            <span class="wsus__new">{{ productType($product->product_type) }}</span>
                            @if (checkDiscount($product))
                                <span class="wsus__minus">-
                                    {{ calculateDiscountPercend($product->price, $product->offer_price) }} %
                                </span>
                            @endif
                            <a class="wsus__pro_link" href="{{ route('product-detail', $product->slug) }}">
                                <img src="{{ asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH') . $product->thumb_image) }}"
                                    alt="product" class="img-fluid w-100 img_1" />
                                <img src="
                            @if (isset($product->productImageGalleries[0]->image)) {{ asset(env('ADMIN_PRODUCT_GALLERY_IMAGE_UPLOAD_PATH') . $product->productImageGalleries[0]->image) }}
                            @else
                            {{ asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH') . $product->thumb_image) }} @endif
                            "
                                    alt="product" class="img-fluid w-100 img_2" />
                            </a>
                            <ul class="wsus__single_pro_icon">
                                <li><a href="#" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal-{{ $product->id }}"><i
                                            class="far fa-eye"></i></a></li>
                                <li><a href="#" data-id="{{$product->id}}" class="add_to_wishlist"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-random"></i></a>
                            </ul>
                            <div class="wsus__product_details">
                                <a class="wsus__category" href="{{route('product.index', ['category' => $product->category->slug])}}">{{ $product->category->name }} </a>
                                <p class="wsus__pro_rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(133 review)</span>
                                </p>
                                <a class="wsus__pro_name"
                                    href="{{ route('product-detail', $product->slug) }}">{{ limitText($product->name , 52) }}</a>
                                @if (checkDiscount($product))
                                    <p class="wsus__price">
                                        {{ $settings->currency_icon }}{{ $product->offer_price }}<del>{{ $settings->currency_icon }}{{ $product->price }}</del>
                                    </p>
                                @else
                                    <p class="wsus__price">{{ $settings->currency_icon }}{{ $product->price }}</p>
                                @endif

                                <form class="shopping-cart-form">

                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    @foreach ($product->variants as $variant)

                                            <select class="d-none" name="variant_items[]">
                                                @foreach ($variant->productVariantItems as $variantItem)
                                                        <option value="{{ $variantItem->id }}"
                                                            {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                            {{ $variantItem->name }}</option>
                                                @endforeach
                                            </select>

                                    @endforeach

                                    <input type="hidden" name="qty" min="1" max="10" value="1" />

                                    <button type="submit" class="add_cart" href="#">add to cart</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>
        @endif
    <!--============================
         RELATED PRODUCT END
     ==============================-->
         <!--==========================
      PRODUCT MODAL VIEW START
    ===========================-->
@foreach ($relatedProducts as $product)
<section class="product_popup_modal">
    <div class="modal fade" id="exampleModal-{{ $product->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                    <div class="row">
                        <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                            <div class="wsus__quick_view_img">
                                @if ($product->video_link)
                                    <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                        href="{{ $product->video_link }}">
                                        <i class="fas fa-play"></i>
                                    </a>
                                @endif
                                <div class="row modal_slider">
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="{{ asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH') . $product->thumb_image) }}"
                                                alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>

                                    @if (count($product->productImageGalleries) == 0)
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="{{ asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH') . $product->thumb_image) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                    @endif
                                    @foreach ($product->productImageGalleries as $imageGallery)
                                        <div class="col-xl-12">
                                            <div class="modal_slider_img">
                                                <img src="{{ asset(env('ADMIN_PRODUCT_GALLERY_IMAGE_UPLOAD_PATH') . $imageGallery->image) }}"
                                                    alt="product" class="img-fluid w-100">
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="wsus__pro_details_text">
                                <a class="title"
                                    href="{{ route('product-detail', $product->slug) }}">{{ limitText($product->name , 52) }}</a>
                                <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>
                                @if (checkDiscount($product))
                                    <h4>{{ $settings->currency_icon }}{{ $product->offer_price }}<del>{{ $settings->currency_icon }}{{ $product->price }}</del>
                                    </h4>
                                @else
                                    <h4>{{ $settings->currency_icon }}{{ $product->price }}</h4>
                                @endif
                                <p class="review">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>20 review</span>
                                </p>
                                <p class="description">{!! $product->short_description !!}</p>

                                <form class="shopping-cart-form">

                                    <div class="wsus__selectbox">
                                        <div class="row">
                                            <input type="hidden" name="product_id"
                                                value="{{ $product->id }}">
                                            @foreach ($product->variants as $variant)
                                                @if ($variant->status != 0)
                                                    <div class="col-xl-6 col-sm-6">
                                                        <h5 class="mb-2">{{ $variant->name }}:</h5>
                                                        <select class="select_2" name="variant_items[]">
                                                            @foreach ($variant->productVariantItems as $variantItem)
                                                                @if ($variantItem->status != 0)
                                                                    <option value="{{ $variantItem->id }}"
                                                                        {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                                        {{ $variantItem->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="wsus__quentity">
                                        <h5>quentity :</h5>
                                        <div class="select_number">
                                            <input class="number_area" type="text" name="qty"
                                                min="1" max="10" value="1" />
                                        </div>

                                    </div>

                                    <ul class="wsus__button_area">
                                        <li><button type="submit" class="add_cart" href="#">add to
                                                cart</button></li>
                                        <li><a class="buy_now" href="#">buy now</a></li>
                                        <li><a href="#" data-id="{{$product->id}}" class="add_to_wishlist"><i class="fal fa-heart"></i></a></li>
                                        <li><a href="#"><i class="far fa-random"></i></a></li>
                                    </ul>
                                </form>
                                <p class="brand_model"><span>Category :</span>
                                    {{ $product->category->name }}</p>
                                <p class="brand_model"><span>Brand :</span> {{ $product->brand->name }}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
<!--==========================
  PRODUCT MODAL VIEW END
===========================-->
@endsection
@push('scripts')
<script>
          $(document).ready(function(){
        $('.list-view').on('click', function() {
                let style = $(this).data('id');

                $.ajax({
                    method: 'Get',
                    url: "{{ route('description-view-change') }}",
                    data: {
                        style: style
                    },
                    success: function(data) {

                    }
                })

            })
    })
</script>
@endpush
