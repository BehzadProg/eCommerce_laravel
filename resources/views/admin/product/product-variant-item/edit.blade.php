@extends('admin.layouts.master')
@section('title' , '- Edit Product-Variant-Item')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.variant-item.index' , ['productId' => $product->id , 'variantId' => $variantItem->product_variant_id])}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Variant Item</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Variant Name : {{$variantItem->productVariant->name}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.variant-item.update' , $variantItem->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Item Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{$variantItem->name}}" class="form-control">
                                </div>
                            </div>
                            <input name="product_id" type="hidden" value="{{$product->id}}" class="form-control">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Price <code>(Set 0 for make it free)</code></label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="price" type="text" value="{{$variantItem->price}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Is Default</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="is_default" class="form-control selectric">
                                    <option value="">Select</option>
                                    <option {{$variantItem->is_default == 1 ? 'selected' : ''}} value="1">Yes</option>
                                    <option {{$variantItem->is_default == 0 ? 'selected' : ''}} value="0">No</option>
                                  </select>
                                </div>
                              </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="status" class="form-control selectric">
                                    <option {{$variantItem->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$variantItem->status == 0 ? 'selected' : ''}} value="0">InActive</option>
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
