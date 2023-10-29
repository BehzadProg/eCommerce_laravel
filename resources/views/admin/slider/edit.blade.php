@extends('admin.layouts.master')
@section('title', '- Edit Slider')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.slider.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit Slider</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Slider</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.slider.update', $slider->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="type" type="text" value="{{ $slider->type }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="title" type="text" value="{{ $slider->title }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Starting
                                        Price</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="starting_price" type="text" value="{{ $slider->starting_price }}"
                                            class="form-control">
                                    </div>
                                </div>

                                @if ($slider->banner)
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                            Banner</label>
                                        <div class="col-sm-12 col-md-7">
                                            <img class="w-25" src="{{asset(env('SLIDER_IMAGE_UPLOAD_PATH').$slider->banner)}}" alt="">
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button Text</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="btn_text" type="text" value="{{ $slider->btn_text }}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button URL</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="btn_url" type="text" value="{{ $slider->btn_url }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Priority</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="priority" type="text" value="{{ $slider->priority }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">
                                            <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>InActive
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
