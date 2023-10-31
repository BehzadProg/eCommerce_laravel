@extends('admin.layouts.master')
@section('title' , '- Edit Sub-Category')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.sub-category.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Sub Category</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Sub Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.sub-category.update' , $subCategory->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Main Categories</label>
                                <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2" name="category">
                                            <option value="">Select</option>
                                            @foreach ($category as $cat)

                                            <option {{$subCategory->category_id == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{$subCategory->name}}" class="form-control">
                                </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="status" class="form-control selectric">
                                    <option value="1" {{$subCategory->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$subCategory->status == 0 ? 'selected' : ''}}>InActive</option>
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
