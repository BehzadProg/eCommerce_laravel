@extends('admin.layouts.master')
@section('title' , '- Create Footer Social')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.footer-social.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Footer Social</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Footer Social</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.footer-social.store')}}" method="post">
                            @csrf

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Icon</label>
                                <div class="col-sm-12 col-md-7">
                                    <div role="iconpicker" data-rows="3"
                                    data-cols="6" data-align="left" name="icon" data-unselected-class="btn-primary"></div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="name" type="text" value="{{old('name')}}" class="form-control">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">URL</label>
                                <div class="col-sm-12 col-md-7">
                                    <input name="url" type="text" value="{{old('url')}}" class="form-control">
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
