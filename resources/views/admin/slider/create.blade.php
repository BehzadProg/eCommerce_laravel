@extends('admin.layouts.master')
@section('title' , '- Create Slider')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Create Slider</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Slider</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="type" type="text" value="{{old('type')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="title" type="text" value="{{old('title')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Starting Price</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="starting_price" type="text" value="{{old('starting_price')}}" class="form-control">
                                </div>
                            </div>

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
                                    <input name="btn_text" type="text" value="{{old('btn_text')}}" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Button URL</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="btn_url" type="text" value="{{old('btn_url')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Priority</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="priority" type="text" value="{{old('priority')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="status" class="form-control selectric">
                                    <option value="1" selected>Active</option>
                                    <option value="0">InActive</option>
                                  </select>
                                </div>
                              </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Create</button>
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
