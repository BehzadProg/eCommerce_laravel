@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} - Product-Variant-Item
@endsection
@section('content')


    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="back_button">
                        <h3><a href="{{route('vendor.product-variants.index' , ['product' => $product->id])}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a> Product Variant Items </h3>
                    </div>
                    <div class="dashboard_content mt-2 mt-md-0">
                        <div class="create_button">
                            <a href="{{route('vendor.variant-item.create' , ['productId' => $product->id , 'variantId' => $variant->id])}}" class="btn btn-primary">Create Variant Item <i class="fas fa-plus"></i></a>
                            <h5 style="text-align: left">Variant Name : {{$variant->name}}</h5>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                {{ $dataTable->table() }}
                            </div>
                        </div>
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
                    url: "{{route('vendor.variant-item.change-status')}}",
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
