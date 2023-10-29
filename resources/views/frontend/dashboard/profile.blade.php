@extends('frontend.dashboard.layouts.master')
@section('title', '- My Profile')
@section('content')
    <!--=============================
                DASHBOARD START
              ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('frontend.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i>user profile</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4>basic information</h4>

                                <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-12">
                                        <div class="col-md-2">
                                            <div class="wsus__dash_pro_img">
                                                <img src="{{ Auth::user()->image ? asset(env('USER_PROFILE_IMAGE_UPLOAD_PATH').Auth::user()->image) : asset('frontend/images/avatar-1.png')}}" alt="img"
                                                    class="img-fluid w-100">
                                                <input type="file" name="image">
                                            </div>
                                        </div>
                                        <div class="col-md-8 mt-3">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-user-tie"></i>
                                                <input type="text" name="name" placeholder="Name" value="{{Auth::user()->name}}">
                                            </div>
                                        </div>

                                        <div class="col-md-8 mt-3">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-user-tie"></i>
                                                <input type="text" name="username" placeholder="User Name" value="{{Auth::user()->username}}">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fal fa-envelope-open"></i>
                                                <input type="email" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <button class="common_btn mb-4 mt-2" type="submit">upload</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="wsus__dash_pass_change mt-2">
                                    <form action="{{route('user.password.update')}}" method="post">
                                        @csrf
                                    <div class="row">
                                        <h4>Update Password</h4>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-unlock-alt"></i>
                                                <input type="password" placeholder="Current Password" name="current_password">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-lock-alt"></i>
                                                <input type="password" placeholder="New Password" name="password">
                                            </div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="wsus__dash_pro_single">
                                                <i class="fas fa-lock-alt"></i>
                                                <input type="password" placeholder="Confirm Password" name="password_confirmation">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <button class="common_btn" type="submit">upload</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--=============================
                DASHBOARD START
              ==============================-->
@endsection