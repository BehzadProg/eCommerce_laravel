@extends('admin.layouts.master')
@section('title' , '- Slider')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Main Slider</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>All Sliders</h4>
                        <div class="card-header-action">
                            <a href="{{route('admin.slider.create')}}" class="btn btn-primary">Create New <i class="fas fa-plus"></i></a>
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
