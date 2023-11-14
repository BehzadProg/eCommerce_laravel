@extends('admin.layouts.master')
@section('title' , '- Create Coupon')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.coupons.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Coupon</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Coupon</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.coupons.store')}}" method="post">
                            @csrf

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{old('name')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Code</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="code" type="text" value="{{old('code')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Quantity</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="quantity" type="text" value="{{old('quantity')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Max use per person</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="max_use" type="text" value="{{old('max_use')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Date</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="start_date" type="text"  class="form-control datepicker">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Date</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="end_date" type="text" class="form-control datepicker">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Discount Type</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="discount_type" class="form-control selectric">
                                    <option value="">Select</option>
                                    <option value="percent">Percentage (%)</option>
                                    <option value="amount">Amount {{$settings->currency_icon}}</option>
                                  </select>
                                </div>
                              </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Discount Value</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="discount" type="text" value="{{old('discount')}}" class="form-control">
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
