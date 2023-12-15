@php
    $address = json_decode($order->order_address);
@endphp
@extends('vendor.layouts.master')
@section('title')
    {{ $settings->site_name }} - Show Orders
@endsection
@section('content')
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="fas fa-box"></i>Orders Details</h3>
                        <div class="back_button">
                            <a href="{{ route('vendor.order.index') }}" class="btn btn-primary"><i
                                    class="fas fa-arrow-left"></i> Back</a>
                        </div>
                        <div class="wsus__dashboard_profile">
                            <!--============================
                                    INVOICE PAGE START
                                ==============================-->
                            <section id="" class="invoice-print">
                                <div class="">
                                    <div class="wsus__invoice_area">
                                        <div class="wsus__invoice_header">
                                            <div class="wsus__invoice_content">
                                                <div class="row">
                                                    <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                        <div class="wsus__invoice_single">
                                                            <h5>Billing Information</h5>
                                                            <h6>{{ $address->name }}</h6>
                                                            <p>{{ $address->email }}</p>
                                                            <p>{{ $address->phone }}</p>
                                                            <p>{{ $address->country }} , {{ $address->state }} ,
                                                                {{ $address->city }}</p>
                                                            <p>{{ $address->address }}</p>

                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-4 mb-5 mb-md-0">
                                                        <div class="wsus__invoice_single text-md-center">
                                                            <h5>shipping information</h5>
                                                            <h6>{{ $address->name }}</h6>
                                                            <p>{{ $address->email }}</p>
                                                            <p>{{ $address->phone }}</p>
                                                            <p>{{ $address->country }} , {{ $address->state }} ,
                                                                {{ $address->city }}</p>
                                                            <p>{{ $address->address }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-md-4">
                                                        <div class="wsus__invoice_single text-md-end">
                                                            <h5>Order Id : #{{ $order->invocie_id }}</h5>
                                                            <h6>Order Status : {{ config('order_status.order_status_admin')[$order->order_status]['status'] }}</h6>
                                                            <p>Payment Method: {{ $order->payment_method }}</p>
                                                            <p>Payment Status:
                                                                {{ $order->payment_status === 1 ? 'complete' : 'pending' }}
                                                            </p>
                                                            <p>Transaction Id: {{ $order->transaction->transaction_id }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wsus__invoice_description">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>

                                                            <th class="name">
                                                                product
                                                            </th>

                                                            <th class="amount">
                                                                shop name
                                                            </th>

                                                            <th class="amount">
                                                                amount
                                                            </th>

                                                            <th class="quentity">
                                                                quentity
                                                            </th>
                                                            <th class="total">
                                                                total
                                                            </th>
                                                        </tr>
                                                        @php
                                                            $total = 0;
                                                        @endphp
                                                        @foreach ($order->orderProducts as $product)
                                                            @if ($product->vendor_id === Auth::user()->vendor->id)
                                                                @php
                                                                    $variants = json_decode($product->variants);
                                                                    $total += ($product->unit_price * $product->qty) + ($product->variant_total * $product->qty)
                                                                    @endphp
                                                                <tr>
                                                                    <td class="name">
                                                                        <p>{{ $product->product_name }}</p>
                                                                        @foreach ($variants as $key => $item)
                                                                            <span>{{ $key }} :
                                                                                {{ $item->name }}
                                                                                ({{ $order->currency_icon }}{{ $item->price }})
                                                                            </span>
                                                                        @endforeach
                                                                    </td>
                                                                    <td class="amount">
                                                                         {{$product->vendor->shop_name}}
                                                                    </td>

                                                                    <td class="amount">
                                                                        {{ $order->currency_icon }} {{$product->unit_price}}
                                                                    </td>

                                                                    <td class="quentity">
                                                                        {{$product->qty}}
                                                                    </td>
                                                                    <td class="total">
                                                                        {{ $order->currency_icon }}{{number_format(($product->unit_price * $product->qty) + ($product->variant_total * $product->qty))}}
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wsus__invoice_footer">
                                            <p><span>Total Amount:</span> {{ $order->currency_icon }} {{number_format($total)}} </p>
                                        </div>

                                    </div>
                                </div>
                            </section>
                            <!--============================
                                    INVOICE PAGE END
                                ==============================-->
                                <div class="wsus__invoice_area">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <form action="{{route("vendor.order.status" , $order->id)}}">
                                                <div class="form-group mt-3">
                                                    <label for="" class="mb-2">Order Status</label>
                                                    <select name="status" class="form-control">
                                                        @foreach (config('order_status.order_status_vendor') as $key => $orderStatus)

                                                        <option {{$key === $order->order_status ? 'selected' : ''}} value="{{$key}}" >{{$orderStatus['status']}}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="btn btn-primary mt-2">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mt-5 float-end">
                                                <button class="btn btn-warning print_invoice">Print</button>
                                            </div>
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
@push('scripts')
<script>
     $('.print_invoice').on('click' , function(){
            let printBody = $('.invoice-print');
            let originalContents = $('body').html()

            $('body').html(printBody.html())

            window.print()

            $('body').html(originalContents)
        })
</script>
@endpush
