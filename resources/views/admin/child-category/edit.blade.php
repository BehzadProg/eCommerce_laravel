@extends('admin.layouts.master')
@section('title' , '- Edit Child-Category')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.child-category.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Child Category</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Child Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.child-category.update' , $childCategory->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Main Categories</label>
                                <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2 main-category" name="category">
                                            <option value="">Select</option>
                                            @foreach ($category as $cat)

                                            <option {{$childCategory->category_id == $cat->id ? 'selected' : ''}} value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Categories</label>
                                <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2 sub-category" name="sub_category">
                                            @foreach ($subCategory as $sub)
                                            <option {{$childCategory->sub_category_id == $sub->id ? 'selected' : ''}} value="{{$sub->id}}">{{$sub->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{$childCategory->name}}" class="form-control">
                                </div>
                            </div>



                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="status" class="form-control selectric">
                                    <option value="1" {{$childCategory->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$childCategory->status == 0 ? 'selected' : ''}}>InActive</option>
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
            $('body').on('change' , '.main-category' , function(e){
                let id = $(this).val();
                $.ajax({
                    method:'GET',
                    url: "{{route('admin.get-subcategories')}}",
                    data:{
                        id: id
                    },
                    success: function(data){
                        console.log(data);
                        $('.sub-category').html(`<option value="">Select</option>`)
                        $.each(data , function(i , item){
                            $('.sub-category').append(`<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
