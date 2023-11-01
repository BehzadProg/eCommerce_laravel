@extends('admin.layouts.master')
@section('title' , '- Vendor Profile')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Vendor Profile</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Vendor Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.vendor-profile.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            @if ($vendor->banner)
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                    Banner</label>
                                <div class="col-sm-12 col-md-7">
                                    <img class="w-25" src="{{asset(env('ADMIN_VENDOR_PROFILE_BANNER_UPLOAD_PATH').$vendor->banner)}}" alt="">
                                </div>
                            </div>
                        @endif
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner
                                    Image</label>
                                <div class="col-sm-12 col-md-7">
                                    <div class="custom-file">
                                        <input type="file" name="banner" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="phone" type="text" value="{{$vendor->phone}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="email" type="text" value="{{$vendor->email}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
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

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="fb_link" type="text" value="{{$vendor->fb_link}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="insta_link" type="text" value="{{$vendor->insta_link}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">twitter</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="tw_link" type="text" value="{{$vendor->tw_link}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row mb-4">
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
</section>
@endsection
