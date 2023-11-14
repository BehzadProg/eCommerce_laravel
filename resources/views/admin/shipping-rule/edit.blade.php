@extends('admin.layouts.master')
@section('title' , '- Edit Shipping Rule')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.shipping-rule.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Shipping Rule</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Shipping Rule</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.shipping-rule.update' , $shippingRule->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{$shippingRule->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="type" class="form-control selectric shipping-type">
                                    <option value="">Select</option>
                                    <option {{$shippingRule->type == 'flat_cost' ? 'selected' : ''}} value="flat_cost">Flat Cost</option>
                                    <option {{$shippingRule->type == 'min_cost' ? 'selected' : ''}} value="min_cost">Minimum Order Amount</option>
                                  </select>
                                </div>
                              </div>

                            <div class="form-group row mb-4 min_cost {{$shippingRule->type == 'min_cost' ? '' : 'd-none'}}">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Minimum Amount</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="min_cost" type="text" value="{{$shippingRule->min_cost}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cost</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="cost" type="text" value="{{$shippingRule->cost}}" class="form-control">
                                </div>
                              </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="status" class="form-control selectric">
                                    <option value="">Select</option>
                                    <option {{$shippingRule->status == 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$shippingRule->status == 0 ? 'selected' : ''}} value="0">InActive</option>
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

@push('scripts')
<script>
    $(document).ready(function(){
        $('body').on('change', '.shipping-type', function(){
            let value = $(this).val();

            if(value != 'min_cost'){
                $('.min_cost').addClass('d-none')
            }else {
                $('.min_cost').removeClass('d-none')
            }
        })
    })
</script>
@endpush
