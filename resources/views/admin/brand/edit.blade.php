@extends('admin.layouts.master')
@section('title', '- Edit Brand')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.brand.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Brand</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Brand</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.brand.update', $brand->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                @if ($brand->logo)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                            Logo</label>
                                        <div class="col-sm-12 col-md-7">
                                            <img class="w-25"
                                                src="{{ asset(env('BRAND_IMAGE_UPLOAD_PATH') . $brand->logo) }}"
                                                alt="">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand
                                        Logo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="name" type="text" value="{{ $brand->name }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Featured</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="is_featured" class="form-control selectric">
                                            <option value="">Select</option>
                                            <option {{ $brand->is_featured == 1 ? 'selected' : '' }} value="1">Yes
                                            </option>
                                            <option {{ $brand->is_featured == 0 ? 'selected' : '' }} value="0">No
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">
                                            <option {{ $brand->status == 1 ? 'selected' : '' }} value="1" selected>
                                                Active</option>
                                            <option {{ $brand->status == 0 ? 'selected' : '' }} value="0">InActive
                                            </option>
                                        </select>
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
