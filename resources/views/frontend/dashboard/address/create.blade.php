@extends('frontend.dashboard.layouts.master')
@section('title' , '- User Address')
@section('content')
<section id="wsus__dashboard">
    <div class="container-fluid">
        @include('frontend.dashboard.layouts.sidebar')

        <div class="row">
            <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
              <div class="dashboard_content mt-2 mt-md-0">
                <h3><i class="fal fa-gift-card"></i>create address</h3>
                <div class="wsus__dashboard_add wsus__add_address">
                  <form action="{{route('user.address.store')}}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>name <b>*</b></label>
                          <input type="text" placeholder="Name" name="name">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>email</label>
                          <input type="email" placeholder="Email" name="email">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>phone <b>*</b></label>
                          <input type="text" placeholder="Phone" name="phone">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>country <b>*</b></label>
                          <div class="wsus__topbar_select">
                            <select class="select_2" name="country">
                              <option>Country</option>
                                @foreach (config('setting.country_list') as $country)
                                <option value="{{$country}}">{{$country}}</option>
                                @endforeach
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>State <b>*</b></label>
                          <input type="text" placeholder="State" name="state">
                        </div>
                      </div>
                      <div class="col-xl-6 col-md-6">
                        <div class="wsus__add_address_single">
                          <label>City <b>*</b></label>
                          <input type="text" placeholder="city" name="city">
                        </div>
                      </div>

                      <div class="col-xl-12">
                        <div class="wsus__add_address_single">
                          <label>address</label>
                          <textarea cols="3" rows="5" placeholder="Type Your Comment" name="address"></textarea>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <button type="submit" class="common_btn">create</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
    </div>
  </section>
@endsection
