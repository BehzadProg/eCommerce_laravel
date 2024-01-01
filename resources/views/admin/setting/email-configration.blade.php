<div class="tab-pane fade {{session()->has('setting_list_style') && session()->get('setting_list_style') == 'profile' ? 'show active' : ''}}" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.email-configration-update')}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="email" type="text" value="{{$emailConfigration->email}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mail Host</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="host" type="text" value="{{$emailConfigration->host}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mail Username</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="username" type="text" value="{{$emailConfigration->username}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mail Password</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="password" type="text" value="{{$emailConfigration->password}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mail Port</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="port" type="text" value="{{$emailConfigration->port}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mail Encription</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="encription" class="form-control">
                        <option {{$emailConfigration->encription == 'tls' ? 'selected' : ''}} value="tls">TLS</option>
                        <option {{$emailConfigration->encription == 'ssl' ? 'selected' : ''}} value="ssl">SSL</option>
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
