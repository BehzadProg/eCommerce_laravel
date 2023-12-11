<div class="tab-pane fade show" id="list-payir" role="tabpanel" aria-labelledby="list-payir-list">

    <div class="card boarder">
        <div class="card-body"></div>
            <form action="{{route('admin.payir-setting.update' , 1)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Payir Status</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="status" class="form-control">
                            <option {{$payir->status === 1 ? 'selected' : ''}} value="1">Enable</option>
                            <option {{$payir->status === 0 ? 'selected' : ''}} value="0">Disable</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Country Name</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="country_name" class="form-control select2">
                            <option value="">Select</option>
                            @foreach (config('setting.country_list') as $country)
                                <option {{$country == $payir->country_name ? 'selected' : ''}} value="{{ $country }}">{{ $country }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Currency Name</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="currency_name" class="form-control select2">
                            <option value="">Select</option>
                            @foreach (config('setting.currency_name') as $key => $currency)
                                <option {{$currency == $payir->currency_name ? 'selected' : ''}} value="{{ $currency }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Currency Rate (Per {{$settings->currency_name}})</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="currency_rate" type="text" value="{{$payir->currency_rate}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">PayIR API Key</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="payir_api_key" type="text" value="{{$payir->payir_api_key}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>


</div>
