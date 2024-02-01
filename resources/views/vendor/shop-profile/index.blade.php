@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} - Shop Profile
@endsection
@section('content')


    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>Shop profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                    <form action="{{route('vendor.shop-profile.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        @if ($vendor->banner)
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                                Banner</label>
                                            <div class="col-sm-12 col-md-7">
                                                <img class="w-100" src="{{asset(env('VENDOR_SHOP_PROFILE_BANNER_UPLOAD_PATH').$vendor->banner)}}" alt="">
                                            </div>
                                        </div>
                                    @endif
                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner
                                                Image</label>
                                            <div class="col-sm-12 col-md-7">
                                                <div class="custom-file">
                                                    <input type="file" name="banner" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Shop Name</label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input name="shop_name" type="text" value="{{$vendor->shop_name}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                            <div class="col-sm-12 col-md-7 ">
                                                <input name="phone" type="text" value="{{$vendor->phone}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input name="email" type="text" value="{{$vendor->email}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input name="address" type="text" value="{{$vendor->address}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Descripton</label>
                                            <div class="col-sm-12 col-md-7">
                                              <textarea name="description" class="summernote">{!!$vendor->description!!}</textarea>
                                            </div>
                                          </div>

                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input name="fb_link" type="text" value="{{$vendor->fb_link}}" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input name="insta_link" type="text" value="{{$vendor->insta_link}}" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">twitter</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input name="tw_link" type="text" value="{{$vendor->tw_link}}" class="form-control">
                                            </div>
                                        </div>


                                        <div class="form-group row mb-4 wsus__dash_pro_single">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary">Update</button>
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

