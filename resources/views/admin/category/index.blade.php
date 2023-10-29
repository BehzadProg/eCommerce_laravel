@extends('admin.layouts.master')
@section('title' , '- Category')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Main Category</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Categories</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.category.create')}}" class="btn btn-primary">Create New <i class="fas fa-plus"></i></a>
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
@endpush
