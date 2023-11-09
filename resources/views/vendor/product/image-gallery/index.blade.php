@extends('vendor.layouts.master')
@section('title', '- Product-Gallery')
@section('content')


    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="fas fa-images"></i>Product Gallery </h3>
                        <div class="back_button">
                            <a href="{{route('vendor.products.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4>Product : {{$product->name}}</h4>
                                <form action="{{route('vendor.product-image-gallery.store')}}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><code>(Multi Select Image Supported!)</code>
                                            Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="custom-file">
                                                <input type="file" name="image[]" class="form-control" multiple>
                                                <input type="hidden" name="product" value="{{$product->id}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-primary">Upload</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="wsus__dash_pro_area" style="margin-top: 10px">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

