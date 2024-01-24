@extends('frontend.layouts.master')
@section('title')
    {{ $settings->site_name }} - Vendors Page
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
                        <h4>vendors</h4>
                        <ul>
                            <li><a href="{{url('/')}}">home</a></li>
                            <li><a href="javascript:;">vendors</a></li>
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
      VENDORS START
    ==============================-->
    <section id="wsus__product_page" class="wsus__vendors">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-8">
                    <div class="row">
                        @foreach ($vendors as $vendor)

                        <div class="col-xl-6 col-md-6">
                            <div class="wsus__vendor_single">
                                <img src="{{asset(env('VENDOR_SHOP_PROFILE_BANNER_UPLOAD_PATH').$vendor->banner)}}" alt="vendor" class="img-fluid w-100">
                                <div class="wsus__vendor_text">
                                    <div class="wsus__vendor_text_center">
                                        <h4>{{$vendor->shop_name}}</h4>

                                        <a href="javascript:;"><i class="far fa-phone-alt"></i>
                                            {{$vendor->phone}}</a>
                                        <a href="javascript:;"><i class="fal fa-envelope"></i>
                                            {{$vendor->email}}</a>
                                        <a href="{{route('vendor-product.index' , $vendor->id)}}" class="common_btn">visit store</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-xl-12 mt-5" style="display: flex; justify-content: center">
                    @if ($vendors->hasPages())
                        {{ $vendors->links() }}
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================
       VENDORS END
    ==============================-->
@endsection
