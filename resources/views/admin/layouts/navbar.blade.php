<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
       
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                @if (Auth::user()->image)
                    <img alt="image"
                        src="{{ asset(env('PROFILE_IMAGE_UPLOAD_PATH') . Auth::user()->image) }}"
                        class="rounded-circle mr-1">
                @else
                    <img alt="image" src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"
                        class="rounded-circle mr-1">
                @endif

                <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{url('/')}}" class="dropdown-item has-icon">
                    <i class="fas fa-home"></i> Home Page
                </a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
            this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>
            </div>
        </li>
    </ul>
</nav>
