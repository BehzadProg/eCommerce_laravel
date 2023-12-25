@extends('admin.layouts.master')
@section('title' , '- Footer Grid Two')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Footer Grid Two</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Footer Grid Two Title</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.footer-grid-two-title.update')}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Footer Title
                                </label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" name="title" class="form-control" value="{{$footerTitle->footer_grid_two_title}}">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                    <button class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Footer Grid Two</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.footer-grid-two.create')}}" class="btn btn-primary">Create New <i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $dataTable->table() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function(){
            $('body').on('click' , '.change-status' , function(){
                let ischecked = $(this).is(':checked');
                let id = $(this).data('id');

                $.ajax({
                    url: "{{route('admin.footer-grid-two.change-status')}}",
                    method: 'PUT',
                    data:{
                        status: ischecked,
                        id: id
                    },
                    success: function(data){
                        toastr.success(data.message)
                    },
                    error: function(xhr, status, error){
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
