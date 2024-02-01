@extends('frontend.dashboard.layouts.master')
@section('title')
{{$settings->site_name}} - Dashboard
@endsection
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
            <h3>User Dashboard</h3>
            <hr>
          <div class="dashboard_content">
            <div class="wsus__dashboard">
              <div class="row">
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item blue" href="{{route('user.order.index')}}">
                    <i class="far fa-shopping-cart"></i>
                    <h4 style="color:#fff">{{$totalOrders}}</h4>
                    <p style="font-size: 13px !important">Total Orders</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                    <a class="wsus__dashboard_item orange" href="{{route('user.order.index')}}">
                      <i class="far fa-shopping-cart"></i>
                      <h4 style="color:#fff">{{$pendingOrders}}</h4>
                      <p>Pending</p>
                    </a>
                  </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item green" href="{{route('user.order.index')}}">
                    <i class="far fa-shopping-cart"></i>
                    <h4 style="color:#fff">{{$completeOrders}}</h4>
                    <p>Complete</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item sky" href="{{route('user.review.index')}}">
                    <i class="fas fa-star"></i>
                    <h4 style="color:#fff">{{$reviews}}</h4>
                    <p>review</p>
                  </a>
                </div>
                <div class="col-xl-2 col-6 col-md-4">
                  <a target="_blank" class="wsus__dashboard_item red" href="{{route('user.wishlist.index')}}">
                    <i class="far fa-heart"></i>
                    <h4 style="color:#fff">{{$wishList}}</h4>
                    <p>wishlist</p>
                  </a>
                </div>              
                <div class="col-xl-2 col-6 col-md-4">
                  <a class="wsus__dashboard_item purple" href="{{route('user.profile')}}">
                    <i class="fal fa-user-shield"></i>
                    <p style="margin-top: 30px;">Profile</p>
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
