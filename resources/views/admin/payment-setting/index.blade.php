@extends('admin.layouts.master')
@section('title' , '- Setting')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Setting</h1>
    </div>
    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-3">
                          <div class="list-group" id="list-tab" role="tablist">
                            <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab">Paypal</a>
                            <a class="list-group-item list-group-item-action" id="list-stripe-list" data-toggle="list" href="#list-stripe" role="tab">Stripe</a>
                            <a class="list-group-item list-group-item-action" id="list-payir-list" data-toggle="list" href="#list-payir" role="tab">PayIr</a>
                            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab">Settings</a>
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="tab-content" id="nav-tabContent">
                            @include('admin.payment-setting.sections.paypal-setting')

                            @include('admin.payment-setting.sections.stripe-setting')

                            @include('admin.payment-setting.sections.payir-setting')

                            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
                              Lorem ipsum culpa in ad velit dolore anim labore incididunt do aliqua sit veniam commodo elit dolore do labore occaecat laborum sed quis proident fugiat sunt pariatur. Cupidatat ut fugiat anim ut dolore excepteur ut voluptate dolore excepteur mollit commodo.
                            </div>
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
