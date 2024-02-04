<div class="tab-pane fade {{session()->has('setting_list_style') && session()->get('setting_list_style') == 'settings' ? 'show active' : ''}}" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"">

    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.logo-setting-update')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if (@$logoSetting->logo)

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                        Logo</label>
                    <div class="col-sm-12 col-md-7">
                        <img class="w-25" src="{{asset(env('SITE_LOGO_IMAGE_UPLOAD_PATH').$logoSetting->logo)}}" alt="">
                    </div>
                </div>
                @endif

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        Logo</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                            <input type="file" name="logo" class="form-control">
                        </div>
                    </div>
                </div>
                @if (@$logoSetting->favicon)

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview
                        favicon</label>
                    <div class="col-sm-12 col-md-7">
                        <img class="w-25" src="{{asset(env('SITE_LOGO_IMAGE_UPLOAD_PATH').$logoSetting->favicon)}}" alt="">
                    </div>
                </div>
                @endif

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">
                        favicon</label>
                    <div class="col-sm-12 col-md-7">
                        <div class="custom-file">
                            <input type="file" name="favicon" class="form-control">
                        </div>
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
