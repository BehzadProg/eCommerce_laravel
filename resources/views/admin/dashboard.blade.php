@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.customer.index')}}">

                <div class="card card-statistic-1">
                  <div class="card-icon bg-secondary">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Active Users</h4>
                    </div>
                    <div class="card-body">
                      {{$totalActiveUser}}
                    </div>
                  </div>
                </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.vendor.index')}}">

                <div class="card card-statistic-1">
                  <div class="card-icon bg-secondary">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Active Vendor</h4>
                    </div>
                    <div class="card-body">
                      {{$totalActiveVendor}}
                    </div>
                  </div>
                </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.admin-list.index')}}">

                <div class="card card-statistic-1">
                  <div class="card-icon bg-secondary">
                    <i class="fas fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Active Admin</h4>
                    </div>
                    <div class="card-body">
                      {{$totalActiveAdmin}}
                    </div>
                  </div>
                </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="fas fa-ban"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Ban Users</h4>
                </div>
                <div class="card-body">
                  {{$banUsers}}
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.vendor-request.index')}}">

                <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                    <i class="fas fa-circle"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Request to become vendor</h4>
                    </div>
                    <div class="card-body">
                      {{$requestToBeVendor}}
                    </div>
                  </div>
                </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.product.index')}}">

                <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                    <i class="fas fa-shopping-bag"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Products</h4>
                    </div>
                    <div class="card-body">
                      {{$totalProduct}}
                    </div>
                  </div>
                </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.blog.index')}}">

                <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>Total Blogs</h4>
                    </div>
                    <div class="card-body">
                      {{$totalBlogs}}
                    </div>
                  </div>
                </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <a href="{{route('admin.subscriber.index')}}">

                <div class="card card-statistic-1">
                  <div class="card-icon bg-info">
                    <i class="far fa-newspaper"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4>News Letter Subscriber</h4>
                    </div>
                    <div class="card-body">
                      {{$subscribers}}
                    </div>
                  </div>
                </div>
            </a>
          </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.order.index')}}">

            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-shopping-cart"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Today's Orders</h4>
                </div>
                <div class="card-body">
                    {{$todayOrder}}
                </div>
              </div>
            </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.order-pending')}}">

            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-shopping-cart"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Todays Pending Orders</h4>
                </div>
                <div class="card-body">
                  {{$todayPendingOrder}}
                </div>
              </div>
            </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.order.index')}}">

            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-shopping-cart"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Orders</h4>
                </div>
                <div class="card-body">
                  {{$totalOrder}}
                </div>
              </div>
            </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.order-pending')}}">

            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-shopping-cart"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Pending Orders</h4>
                </div>
                <div class="card-body">
                  {{$totalPendingOrder}}
                </div>
              </div>
            </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.order-delivered')}}">

            <div class="card card-statistic-1">
              <div class="card-icon bg-primary">
                <i class="far fa-shopping-cart"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Complete Orders</h4>
                </div>
                <div class="card-body">
                  {{$totalCompletedOrder}}
                </div>
              </div>
            </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.order-canceled')}}">

            <div class="card card-statistic-1">
              <div class="card-icon bg-danger">
                <i class="far fa-shopping-cart"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Total Canceled Orders</h4>
                </div>
                <div class="card-body">
                  {{$totalCanceledOrder}}
                </div>
              </div>
            </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.review.index')}}">
            <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-star"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                <h4>Pending Reviews</h4>
                </div>
                <div class="card-body">
                {{$pendingReviews}}
                </div>
            </div>
            </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <a href="{{route('admin.review.index')}}">
            <div class="card card-statistic-1">
              <div class="card-icon bg-warning">
                <i class="far fa-star"></i>
              </div>
              <div class="card-wrap">
                <div class="card-header">
                  <h4>Active Reviews</h4>
                </div>
                <div class="card-body">
                  {{$totalActiveReview}}
                </div>
              </div>
            </div>
        </a>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-money-bill"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Today's Earnigs</h4>
            </div>
            <div class="card-body">
              {{$settings->currency_icon}}{{$todayEarning}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-money-bill"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>This Month Earnigs</h4>
            </div>
            <div class="card-body">
              {{$settings->currency_icon}}{{$thisMonthEarning}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-money-bill"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>This Year Earnigs</h4>
            </div>
            <div class="card-body">
              {{$settings->currency_icon}}{{$thisYearEarning}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-money-bill"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Earnigs</h4>
            </div>
            <div class="card-body">
              {{$settings->currency_icon}}{{$totalEarning}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
