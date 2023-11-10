@extends('vendor.layouts.master')
@section('title', '- Edit Product-Variant')
@section('content')


    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="back_button">
                        <h3><a href="{{route('vendor.product-variants.index' , ['product' => $product->id])}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Edit Variant for : {{$product->name}} </h3>
                    </div>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">

                                <form action="{{route('vendor.product-variants.update', $productVariant->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="name" type="text" value="{{$productVariant->name}}" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                          <select name="status" class="form-control selectric">
                                            <option value="1" {{$productVariant->status == 1 ? 'selected' : ''}}>Active</option>
                                            <option value="0" {{$productVariant->status == 0 ? 'selected' : ''}}>InActive</option>
                                          </select>
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
