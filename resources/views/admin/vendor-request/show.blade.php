@extends('admin.layouts.master')
@section('title', '- Vendor Request')
@section('content')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{route('admin.vendor-request.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Vendor Request</h1>
        </div>

        <div class="section-body">
            <div class="invoice">
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <td>User Name</td>
                          <td>{{$vendor->user->name}}</td>
                        </tr>
                        <tr>
                          <td>User Email</td>
                          <td>{{$vendor->user->email}}</td>
                        </tr>
                        <tr>
                          <td>Shop Name</td>
                          <td>{{$vendor->shop_name}}</td>
                        </tr>
                        <tr>
                          <td>Shop Email</td>
                          <td>{{$vendor->email}}</td>
                        </tr>
                        <tr>
                          <td>Shop Phone</td>
                          <td>{{$vendor->phone}}</td>
                        </tr>
                        <tr>
                          <td>Shop Address</td>
                          <td>{{$vendor->address}}</td>
                        </tr>
                        <tr>
                          <td>Description</td>
                          <td>{{$vendor->description}}</td>
                        </tr>

                      </table>
                    </div>
                    <div class="row mt-4">
                      <div class="col-lg-8">
                       <div class="col-md-4">
                        <form action="{{route('admin.vendor-request.change-status' , $vendor->id)}}" method="POST">
                           @csrf
                           @method('PUT')
                           <div class="form-group">
                               <label>Action</label>
                               <select name="status" class="form-control">
                                   <option {{$vendor->status == 0 ? 'selected' : ''}} value="0">pending</option>
                                   <option {{$vendor->status == 1 ? 'selected' : ''}} value="1">active</option>
                               </select>
                           </div>
                           <button class="btn btn-primary" type="submit">Update</button>
                        </form>

                       </div>
                      </div>

                    </div>
                  </div>
                </div>

            </div>
          </div>
    </section>
@endsection
