@extends('admin.layouts.master')
@section('title' , '- Footer Info')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Footer Info</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Footer Info</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.footer-info.update' , 1)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($footerInfo->logo)
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                    Logo</label>
                                <div class="col-sm-12 col-md-7">
                                    <img class="w-25"
                                        src="{{ asset(env('FOOTER_LOGO_UPLOAD_PATH') . $footerInfo->logo) }}"
                                        alt="">
                                </div>
                            </div>
                        @endif
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Logo</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="logo" type="file"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="phone" type="text" value="{{$footerInfo->phone}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="email" type="text" value="{{$footerInfo->email}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="address" type="text" value="{{$footerInfo->address}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Copy Right</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="copyright" type="text" value="{{$footerInfo->copyright}}" class="form-control">
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
