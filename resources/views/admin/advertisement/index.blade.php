@extends('admin.layouts.master')
@section('title' , '- Advertisement')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Advertisement</h1>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-3">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action {{session()->has('advertisement_list_style') && session()->get('advertisement_list_style') == 'home' ? 'active' : ''}} list-view {{ !session()->has('advertisement_list_style') ? 'active' : '' }}" data-id="home" id="list-home-list" data-toggle="list" href="#list-home" role="tab">HomePage Banner Section One</a>
                            <a class="list-group-item list-group-item-action {{session()->has('advertisement_list_style') && session()->get('advertisement_list_style') == 'profile' ? 'active' : ''}} list-view" data-id="profile" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab">HomePage Banner Section Two</a>
                            <a class="list-group-item list-group-item-action {{session()->has('advertisement_list_style') && session()->get('advertisement_list_style') == 'messages' ? 'active' : ''}} list-view" data-id="messages" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab">HomePage Banner Section Three</a>
                            <a class="list-group-item list-group-item-action {{session()->has('advertisement_list_style') && session()->get('advertisement_list_style') == 'settings' ? 'active' : ''}} list-view" data-id="settings" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">HomePage Banner Section Four</a>
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="tab-content" id="nav-tabContent">
                            @include('admin.advertisement.homepage-banner-one')

                            @include('admin.advertisement.homepage-banner-two')

                            @include('admin.advertisement.homepage-banner-three')

                            @include('admin.advertisement.homepage-banner-four')
                          </div>
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
<script>
    $(document).ready(function(){
        $('.list-view').on('click', function() {
                let style = $(this).data('id');

                $.ajax({
                    method: 'Get',
                    url: "{{ route('admin.advertisement-change-view-list') }}",
                    data: {
                        style: style
                    },
                    success: function(data) {

                    }
                })

            })
    })
</script>
@endpush
