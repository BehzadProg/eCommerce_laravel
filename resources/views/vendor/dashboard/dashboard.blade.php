@extends('vendor.layouts.master')
@section('title')
{{$settings->site_name}} - Vendor Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('vendor.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <h3>Vendor Dashboard</h3>
            <hr>
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                <div class="col-xl-2 col-6 col-md-4">
                    <a class="wsus__dashboard_item purple" href="{{route('vendor.products.index')}}">
                      <i class="fas fa-box"></i>        
                      <h4 style="color: #fff">{{$totalProduct}}</h4>
                      <p>Total Products</p>
                    </a>
                  </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="{{route('vendor.order.index')}}">
                    <i class="far fa-shopping-cart"></i>
                    <h4 style="color: #fff">{{$todayOrder}}</h4>
                    <p>Today orders</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="{{route('vendor.order.index')}}">
                    <i class="far fa-shopping-cart"></i>
                    <h4 style="color: #fff">{{$todayPendingOrder}}</h4>
                    <p>Today pendings</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="{{route('vendor.order.index')}}">
                    <i class="far fa-shopping-cart"></i>
                    <h4 style="color: #fff">{{$totalOrder}}</h4>
                    <p>Total Orders</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="{{route('vendor.order.index')}}">
                    <i class="far fa-shopping-cart"></i>
                    <h4 style="color: #fff">{{$totalPendingOrder}}</h4>
                    <p>Total pendings</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="{{route('vendor.order.index')}}">
                    <i class="far fa-shopping-cart"></i>
                    <h4 style="color: #fff">{{$totalCompletedOrder}}</h4>
                    <p>Total Complete</p>
                  </a>
                </div>             
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item green" href="javascript:;">
                    <i class="far fa-money-bill"></i>
                    <h4 style="color: #fff">{{$settings->currency_icon}}{{$todayEarning}}</h4>
                    <p>Today's Earning</p>
                  </a>
                </div>             
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item green" href="javascript:;">
                    <i class="far fa-money-bill"></i>
                    <h4 style="color: #fff">{{$settings->currency_icon}}{{$thisMonthEarning}}</h4>
                    <p>This Month Earning</p>
                  </a>
                </div>             
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item green" href="javascript:;">
                    <i class="far fa-money-bill"></i>
                    <h4 style="color: #fff">{{$settings->currency_icon}}{{$thisYearEarning}}</h4>
                    <p>This Year Earning</p>
                  </a>
                </div>             
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item green" href="javascript:;">
                    <i class="far fa-money-bill"></i>
                    <h4 style="color: #fff">{{$settings->currency_icon}}{{$totalEarning}}</h4>
                    <p>Total Earning</p>
                  </a>
                </div>             
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item sky" href="{{route('vendor.review.index')}}">
                    <i class="fas fa-star"></i>
                    <h4 style="color: #fff">{{$reviews}}</h4>
                    <p>Product review</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                    <a class="wsus__dashboard_item orange" href="{{route('vendor.shop-profile.index')}}">
                      <i class="fas fa-user-shield"></i>
                      <p style="margin-top:28px">Shop profile</p>
                      <h4 style="color: #fff">-</h4>
                    </a>
                  </div>       
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
