@extends('admin.layouts.master')
@section('title' , '- Edit Coupon')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.coupons.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Coupon</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Coupon</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.coupons.update' , $coupon->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{$coupon->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Code</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="code" type="text" value="{{$coupon->code}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quantity</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="quantity" type="text" value="{{$coupon->quantity}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Max use per person</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="max_use" type="text" value="{{$coupon->max_use}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Date</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="start_date" type="text" value="{{$coupon->start_date}}"  class="form-control datepicker">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="end_date" type="text" value="{{$coupon->end_date}}" class="form-control datepicker">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Discount Type</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="discount_type" class="form-control selectric">
                                    <option value="">Select</option>
                                    <option {{$coupon->discount_type == 'percent' ? 'selected' : ''}} value="percent">Percentage (%)</option>
                                    <option {{$coupon->discount_type == 'amount' ? 'selected' : ''}} value="amount">Amount {{$settings->currency_icon}}</option>
                                  </select>
                                </div>
                              </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Discount Value</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="discount" type="text" value="{{$coupon->discount}}" class="form-control">
                                </div>
                              </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="status" class="form-control selectric">
                                    <option {{$coupon->status == 1 ? 'selected' : ''}} value="1" selected>Active</option>
                                    <option {{$coupon->status == 0 ? 'selected' : ''}} value="0">InActive</option>
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
