@extends('admin.layouts.master')
@section('title' , '- Create Product-Variant-Item')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.variant-item.index' , ['productId' => $product->id , 'variantId' => $variant->id])}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Variant Item</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Variant Name : {{$variant->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.variant-item.store')}}" method="post">
                            @csrf

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{old('name')}}" class="form-control">
                                </div>
                            </div>

                            <input name="variant_id" type="hidden" value="{{$variant->id}}" class="form-control">
                            <input name="product_id" type="hidden" value="{{$product->id}}" class="form-control">

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price <code>(Set 0 for make it free)</code></label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="price" type="text" value="{{old('price')}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Default</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="is_default" class="form-control selectric">
                                    <option value="">Select</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
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
