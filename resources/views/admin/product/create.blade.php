@extends('admin.layouts.master')
@section('title', '- Create Product')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.product.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Create Product</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Primary
                                        Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file" name="thumb_image" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="name" type="text" value="{{ old('name') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Main
                                        Categories</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2 main-category" name="category">
                                            <option value="">Select</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub
                                        Categories</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2 sub-category" name="sub_category">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Child
                                        Categories</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2 child-category" name="child_category">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Brand
                                    </label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2" name="brand">
                                            <option value="">Select</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">SKU</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="sku" type="text" value="{{ old('sku') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="price" type="text" value="{{ old('price') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Offer Price</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="offer_price" type="text" value="{{ old('offer_price') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Offer Start
                                        Date</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="offer_start_date" value="{{ old('offer_start_date') }}" class="form-control datepicker">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Offer End
                                        Date</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="offer_end_date" value="{{ old('offer_end_date') }}" class="form-control datepicker">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stock Quantity</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="qty" type="text" value="{{ old('qty') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Link</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="video_link" type="text" value="{{ old('video_link') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Short Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="short_description" class="form-control">{{old('short_description')}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Long Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="long_description" class="summernote">{{old('long_description')}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Product Type</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="product_type" class="form-control selectric">
                                            <option value="">Select</option>
                                            <option value="new_arrival">New Arrival</option>
                                            <option value="featured_product">Featured</option>
                                            <option value="best_product">Best Product</option>
                                            <option value="top_product">Top Product</option>

                                        </select>
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
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input name="seo_title" type="text" value="{{ old('seo_title') }}"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo Description</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea name="seo_description" class="form-control">{{old('seo_description')}}</textarea>
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

@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.get-subcategories') }}",
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
                    url: "{{ route('admin.get-childcategories') }}",
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
