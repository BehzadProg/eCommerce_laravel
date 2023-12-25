@extends('admin.layouts.master')
@section('title' , '- Edit Footer Social')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.footer-social.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Footer Social</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Footer Social</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.footer-social.update' , $footerSocial->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon</label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary" data-icon="{{$footerSocial->icon}}" data-selected-class="btn-danger"
                                        data-unselected-class="btn-primary" role="iconpicker" name="icon" ></button>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{$footerSocial->name}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">URL</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="url" type="text" value="{{$footerSocial->url}}" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                <div class="col-sm-12 col-md-7">
                                  <select name="status" class="form-control selectric">
                                    <option {{$footerSocial->status === 1 ? 'selected' : ''}} value="1">Active</option>
                                    <option {{$footerSocial->status === 0 ? 'selected' : ''}} value="0">InActive</option>
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
