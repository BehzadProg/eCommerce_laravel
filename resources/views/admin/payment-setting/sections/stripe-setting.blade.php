<div class="tab-pane fade show" id="list-stripe" role="tabpanel" aria-labelledby="list-stripe-list">

    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.stripe-setting.update' , 1)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stripe Status</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="status" class="form-control">
                            <option {{$stripe->status === 1 ? 'selected' : ''}} value="1">Enable</option>
                            <option {{$stripe->status === 0 ? 'selected' : ''}} value="0">Disable</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stripe Mode</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="mode" class="form-control">
                            <option {{$stripe->mode === 0 ? 'selected' : ''}} value="0">Sandbox</option>
                            <option {{$stripe->mode === 1 ? 'selected' : ''}} value="1">Live</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Country Name</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="country_name" class="form-control select2">
                            <option value="">Select</option>
                            @foreach (config('setting.country_list') as $country)
                                <option {{$country == $stripe->country_name ? 'selected' : ''}} value="{{ $country }}">{{ $country }}</option>
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
                                <option {{$currency == $stripe->currency_name ? 'selected' : ''}} value="{{ $currency }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Currency Rate (Per {{$settings->currency_name}})</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="currency_rate" type="text" value="{{$stripe->currency_rate}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stripe Client Id</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="client_id" type="text" value="{{$stripe->client_id}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Stripe Secret Key</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="secret_key" type="text" value="{{$stripe->secret_key}}" class="form-control">
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
