@extends('frontend.layouts.master')
@section('title')
    {{ $settings->site_name }} || Wish-list
@endsection
@section('content')
    <!--============================
        BREADCRUMB START
    ==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>wishlist</h4>
                        <ul>
                            <li><a href="{{route('home')}}">home</a></li>
                            <li><a href="#">wishlist</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        BREADCRUMB END
    ==============================-->


    <!--============================
        CART VIEW PAGE START
    ==============================-->
    <section id="wsus__cart_view">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="wsus__cart_list wishlist">
                        <div class="table-responsive">
                            <table>
                                <tbody id="wishlist_empty">
                                    <tr class="d-flex">
                                        <th class="wsus__pro_img">
                                            product item
                                        </th>

                                        <th class="wsus__pro_name">
                                            product details
                                        </th>

                                        <th class="wsus__pro_status">
                                            category
                                        </th>

                                        <th class="wsus__pro_select">
                                            Brand
                                        </th>

                                        <th class="wsus__pro_tk">
                                            price
                                        </th>

                                        <th class="wsus__pro_icon">
                                            action
                                        </th>
                                    </tr>
                                    @foreach ($wishlist as $item)

                                    <tr class="d-flex" id="wishlist-cart_{{$item->id}}">
                                        <td class="wsus__pro_img"><img src="{{asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH').$item->product->thumb_image)}}" alt="{{$item->product->name}}"
                                                class="img-fluid w-100">
                                            <a href="" class="remove-wishlist" data-id="{{$item->id}}"><i class="far fa-times"></i></a>
                                        </td>

                                        <td class="wsus__pro_name">
                                            <p>{{$item->product->name}}</p>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <p>{{$item->product->category->name}}</p>
                                        </td>

                                        <td class="wsus__pro_select">
                                            <p>{{$item->product->brand->name}}</p>
                                        </td>

                                        <td class="wsus__pro_tk">
                                            <h6>{{$settings->currency_icon}} @if(checkDiscount($item->product))
                                                {{$item->product->offer_price}}
                                            @else
                                                {{$item->product->price}}

                                            @endif</h6>
                                        </td>

                                        <td class="wsus__pro_icon">
                                            <a class="common_btn" href="{{route('product-detail' , $item->product->slug)}}">view product</a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
        CART VIEW PAGE END
    ==============================-->

@endsection
