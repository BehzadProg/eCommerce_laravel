@extends('vendor.layouts.master')
@section('title', '- Edit Variant-Item')
@section('content')


    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="back_button">
                        <h3><a href="{{route('vendor.variant-item.index' , ['productId' => $product->id , 'variantId' => $variantItem->product_variant_id])}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Create Variant Item </h3>
                    </div>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="back_button"><h5>Variant Name : {{$variantItem->productVariant->name}}</h5></div>

                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <form action="{{route('vendor.variant-item.update' , $variantItem->id)}}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="name" type="text" value="{{$variantItem->name}}" class="form-control">
                                        </div>
                                    </div>
                                    <input name="product_id" type="hidden" value="{{$product->id}}" class="form-control">
                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price <code>(Set 0 for make it free)</code></label>
                                        <div class="col-sm-12 col-md-7">
                                            <input name="price" type="text" value="{{$variantItem->price}}" class="form-control">
                                        </div>
                                    </div>


                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Default</label>
                                        <div class="col-sm-12 col-md-7">
                                          <select name="is_default" class="form-control selectric">
                                            <option value="">Select</option>
                                            <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="1">Yes</option>
                                            <option {{$variantItem->is_default == 0 ? 'selected' : ''}} value="0">No</option>
                                          </select>
                                        </div>
                                      </div>

                                    <div class="form-group row mb-4 wsus__dash_pro_single">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                          <select name="status" class="form-control selectric">
                                            <option {{$variantItem->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                            <option {{$variantItem->status == 0 ? 'selected' : ''}} value="0">InActive</option>
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


