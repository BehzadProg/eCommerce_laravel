<div class="tab-pane fade {{session()->has('setting_list_style') && session()->get('setting_list_style') == 'home' ? 'show active' : ''}} {{ !session()->has('setting_list_style') ? 'show active' : '' }}" id="list-home" role="tabpanel" aria-labelledby="list-home-list">

    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.general-setting-update')}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Site Name</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="site_name" type="text" value="{{@$generalSetting->site_name}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Layout</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="layout" class="form-control selectric">
                        <option {{@$generalSetting->layout == 'LTR' ? 'selected' : ''}} value="LTR">LTR</option>
                        <option {{@$generalSetting->layout == 'RTL' ? 'selected' : ''}} value="RTL">RTL</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Email</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="contact_email" type="text" value="{{@$generalSetting->contact_email}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Phone</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="contact_phone" type="text" value="{{@$generalSetting->contact_phone}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Contact Address</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="contact_address" type="text" value="{{@$generalSetting->contact_address}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Google Map Url</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="map" type="text" value="{{@$generalSetting->map}}" class="form-control">
                    </div>
                </div>
                <hr>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Default Currency Name</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="currency_name" class="form-control selectric select2">
                        <option value="">Select</option>
                        @foreach (config('setting.currency_name') as $currency)

                        <option {{$generalSetting->currency_name == $currency ? 'selected' : ''}} value="{{$currency}}">{{$currency}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Currency Icon</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="currency_icon" type="text" value="{{@$generalSetting->currency_icon}}" class="form-control">
                    </div>
                </div>

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Time Zone</label>
                    <div class="col-sm-12 col-md-7">
                        <select name="time_zone" class="form-control selectric select2">
                            <option value="">Select</option>
                            @foreach (config('setting.time_zone') as $key => $timeZone)

                            <option {{$generalSetting->time_zone == $key ? 'selected' : ''}} value="{{$key}}">{{$key}}</option>
                            @endforeach
                          </select>
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
