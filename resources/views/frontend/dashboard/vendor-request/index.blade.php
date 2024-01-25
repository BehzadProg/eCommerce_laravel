@extends('frontend.dashboard.layouts.master')
@section('title')
{{$settings->site_name}} - Request to be vendor
@endsection
@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Become A Vendor Today</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area mb-3">
                                <h4>Vendor Terms & Conditions</h4>
                                {!!@$condition->content!!}
                            </div>
                            <div class="wsus__dash_pro_area">
                                <h4>basic information</h4>

                                <form action="{{route('user.vendor-request.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="col-md-8 mt-3">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-user-tie"></i>
                                                <input type="file" name="shop_image">
                                            </div>
                                        </div>
                                        <div class="col-md-8 mt-3">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-user-tie"></i>
                                                <input type="text" name="shop_name" placeholder="Shop Name">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fas fa-user-tie"></i>
                                                    <input type="text" name="shop_phone" placeholder="Shop Phone">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mt-3">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fal fa-envelope-open"></i>
                                                    <input type="email" name="shop_email" placeholder="Shop Email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fal fa-envelope-open"></i>
                                                <input type="text" name="shop_address" placeholder="Shop Address">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="wsus__dash_pro_single">

                                                <textarea name="about" cols="20" rows="5" placeholder="About You"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <button class="common_btn mb-4 mt-2" type="submit">submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
