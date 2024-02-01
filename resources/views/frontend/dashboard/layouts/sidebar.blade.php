<div class="dashboard_sidebar">
    <span class="close_icon">
      <i class="far fa-bars dash_bar"></i>
      <i class="far fa-times dash_close"></i>
    </span>
    <a href="{{route('user.dashboard')}}" class="dash_logo"><img src="{{asset('frontend/images/logo.png')}}" alt="logo" class="img-fluid"></a>
    <ul class="dashboard_link">
      <li><a class="{{setActive(['user.dashboard'])}}" href="{{route('user.dashboard')}}"><i class="fas fa-tachometer"></i>Dashboard</a></li>
      <li><a  href="{{url('/')}}"><i class="fas fa-home"></i>Go To Home Page</a></li>
      @if (Auth()->user()->role === 'vendor')

      <li><a  href="{{route('vendor.dashboard')}}"><i class="fas fa-tachometer"></i>Your Vendor Dashboard</a></li>
      @endif
      @if (Auth()->user()->role === 'admin')

      <li><a class="{{setActive(['admin.dashboard'])}}" href="{{route('admin.dashboard')}}"><i class="fas fa-tachometer"></i>Your Admin Dashboard</a></li>
      @endif
      <li><a class="{{setActive(['user.order.*'])}}" href="{{route('user.order.index')}}"><i class="fas fa-list-ul"></i> Orders</a></li>
      <li><a class="{{setActive(['user.review.index'])}}" href="{{route('user.review.index')}}"><i class="far fa-star"></i> Reviews</a></li>
      <li><a class="{{setActive(['user.profile'])}}" href="{{route('user.profile')}}"><i class="far fa-user"></i> My Profile</a></li>
      <li><a class="{{setActive(['user.address.*'])}}" href="{{route('user.address.index')}}"><i class="fal fa-gift-card"></i> Addresses</a></li>
        @if (Auth()->user()->role !== 'vendor')
        <li><a class="{{setActive(['user.vendor-request.index'])}}" href="{{route('user.vendor-request.index')}}"><i class="fal fa-user"></i> Request to be vendor</a></li>
        @endif
      <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{route('logout')}}" onclick="event.preventDefault();
            this.closest('form').submit();"><i class="far fa-sign-out-alt"></i> Log out</a>
        </form>
    </li>
    </ul>
  </div>
