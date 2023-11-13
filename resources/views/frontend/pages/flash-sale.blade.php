@extends('frontend.layouts.master')
@section('title' , '- Flash Sale Page')
@section('content')
 <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>Flash Sale</h4>
                        <ul>
                            <li><a href="{{route('home')}}">Home</a></li>
                            <li><a href="javascript:void(0)">Flash Sale</a></li>
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
        DAILY DEALS DETAILS START
    ==============================-->
    <section id="wsus__daily_deals">
        <div class="container">
            <div class="wsus__offer_details_area">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__offer_details_banner">
                            <img src="{{asset('frontend/images/offer_banner_2.png')}}" alt="offrt img" class="img-fluid w-100">
                            <div class="wsus__offer_details_banner_text">
                                <p>apple watch</p>
                                <span>up 50% 0ff</span>
                                <p>for all poduct</p>
                                <p><b>today only</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__offer_details_banner">
                            <img src="{{asset('frontend/images/offer_banner_3.png')}}" alt="offrt img" class="img-fluid w-100">
                            <div class="wsus__offer_details_banner_text">
                                <p>xiaomi power bank</p>
                                <span>up 37% 0ff</span>
                                <p>for all poduct</p>
                                <p><b>today only</b></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__section_header rounded-0">
                            <h3>flash sell</h3>
                            <div class="wsus__offer_countdown">
                                <span class="end_text">ends time :</span>
                                <div class="simply-countdown simply-countdown-one"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @foreach ($flashSaleItems as $item)

                    <div class="col-xl-3 col-sm-6 col-lg-4">
                        <div class="wsus__product_item">
                            <span class="wsus__new">{{productType($item->product->product_type)}}</span>
                            @if (checkDiscount($item->product))

                            <span class="wsus__minus">- {{calculateDiscountPercend($item->product->price,$item->product->offer_price)}} % </span>
                            @endif
                            <a class="wsus__pro_link" href="{{route('product-detail' , $item->product->slug)}}">
                                <img src="{{asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH'). $item->product->thumb_image)}}" alt="product" class="img-fluid w-100 img_1" />
                                <img src="
                                @if (isset($item->product->productImageGalleries[0]->image))
                                {{asset(env('ADMIN_PRODUCT_GALLERY_IMAGE_UPLOAD_PATH'). $item->product->productImageGalleries[0]->image)}}
                                @else
                                {{asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH'). $item->product->thumb_image)}}
                                @endif
                                " alt="product" class="img-fluid w-100 img_2" />
                            </a>
                            <ul class="wsus__single_pro_icon">
                                <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                            class="far fa-eye"></i></a></li>
                                <li><a href="#"><i class="far fa-heart"></i></a></li>
                                <li><a href="#"><i class="far fa-random"></i></a>
                            </ul>
                            <div class="wsus__product_details">
                                <a class="wsus__category" href="#">{{$item->product->category->name}} </a>
                                <p class="wsus__pro_rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>(133 review)</span>
                                </p>
                                <a class="wsus__pro_name" href="{{route('product-detail' , $item->product->slug)}}">{{$item->product->name}}</a>
                                @if (checkDiscount($item->product))

                                <p class="wsus__price">${{$item->product->offer_price}}<del>${{$item->product->price}}</del></p>

                                @else
                                <p class="wsus__price">${{$item->product->price}}</p>
                                @endif
                                <a class="add_cart" href="#">add to cart</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="mt-5">

                    @if ($flashSaleItems->hasPages())
                    {{$flashSaleItems->links()}}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================
        DAILY DEALS DETAILS END
    ==============================-->

@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        simplyCountdown('.simply-countdown-one', {
        year: {{date('Y' , strtotime($flashSale->end_date))}},
        month: {{date('m' , strtotime($flashSale->end_date))}},
        day: {{date('d' , strtotime($flashSale->end_date))}},
        enableUtc: true
    });
    })
</script>
@endpush
