@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} - Edit Product
@endsection
@section('content')


    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-edit"></i>Edit Product </h3>
                        <div class="back_button">
                            <a href="{{route('vendor.products.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{ route('vendor.products.update' , $products->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    @if ($products->thumb_image)
                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                                            Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <img class="w-25" src="{{asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH').$products->thumb_image)}}" alt="">
                                        </div>
                                    </div>
                                @endif
                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Primary
                                            Image</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div class="custom-file">
                                                <input type="file" name="thumb_image" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="name" type="text" value="{{ $products->name }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Main
                                            Categories</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control select2 main-category" name="category">
                                                <option value="">Select</option>
                                                @foreach ($category as $cat)
                                                    <option {{$products->category_id == $cat->id ? 'selected' : ''}} value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub
                                            Categories</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control select2 sub-category" name="sub_category">
                                                <option value="">Select</option>
                                                @foreach ($subCategory as $sub)

                                                <option {{$sub->id == $products->sub_category_id ? 'selected' : ''}} value="{{$sub->id}}">{{$sub->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Child
                                            Categories</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control select2 child-category" name="child_category">
                                                <option value="">Select</option>
                                                @foreach ($childCategory as $child)

                                                <option {{$child->id == $products->child_category_id ? 'selected' : ''}} value="{{$child->id}}">{{$child->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand
                                        </label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control select2" name="brand">
                                                <option value="">Select</option>
                                                @foreach ($brands as $brand)
                                                    <option {{$products->brand_id == $brand->id ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SKU</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="sku" type="text" value="{{ $products->sku }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="price" type="text" value="{{ $products->price }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Offer Price</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="offer_price" type="text" value="{{ $products->offer_price }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Offer Start
                                            Date</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="offer_start_date" value="{{ $products->offer_start_date }}" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Offer End
                                            Date</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" name="offer_end_date" value="{{ $products->offer_end_date }}" class="form-control datepicker">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock Quantity</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="qty" type="text" value="{{ $products->qty }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Link</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="video_link" type="text" value="{{ $products->video_link }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Short Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="short_description" class="form-control">{!!$products->short_description!!}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Long Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="long_description" class="summernote">{!!$products->long_description!!}</textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Type</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="product_type" class="form-control selectric">
                                                <option value="">Select</option>
                                                <option value="new_arrival" {{$products->product_type == 'new_arrival' ? 'selected' : ''}}>New Arrival</option>
                                                <option value="featured_product" {{$products->product_type == 'featured_product' ? 'selected' : ''}}>Featured</option>
                                                <option value="best_product" {{$products->product_type == 'best_product' ? 'selected' : ''}}>Best Product</option>
                                                <option value="top_product" {{$products->product_type == 'top_product' ? 'selected' : ''}}>Top Product</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select name="status" class="form-control selectric">
                                                <option value="1" {{$products->status == 1 ? 'selected' : ''}}>Active</option>
                                                <option value="0" {{$products->status == 0 ? 'selected' : ''}}>InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="seo_title" type="text" value="{{ $products->seo_title }}"
                                                class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo Description</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="seo_description" class="form-control">{!!$products->seo_description!!}</textarea>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        $('.sub-category').html(`<option value="">Select</option>`)
                        $.each(data, function(i, item) {
                            $('.sub-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('vendor.get-childcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        console.log(data);
                        $('.child-category').html(`<option value="">Select</option>`)
                        $.each(data, function(i, item) {
                            $('.child-category').append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush

