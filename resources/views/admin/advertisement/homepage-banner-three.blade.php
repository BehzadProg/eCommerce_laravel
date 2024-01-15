<div class="tab-pane fade {{session()->has('advertisement_list_style') && session()->get('advertisement_list_style') == 'messages' ? 'show active' : ''}}" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.homepage-banner-section-three')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4>Banner One</h4>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <img width="200px" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').@$homepage_banner_section_three->banner_one->banner_image)}}" alt="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_image_one" type="file" class="form-control">
                        <input type="hidden" name="old_banner_image_one" value="{{@$homepage_banner_section_three->banner_one->banner_image}}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Url</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_url_one" type="text" value="{{@$homepage_banner_section_three->banner_one->banner_url}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="status_one" class="form-control">
                        <option value="">Select</option>
                        <option {{@$homepage_banner_section_three->banner_one->status == 1 ? 'selected' : ''}}  value="1">Active</option>
                        <option {{@$homepage_banner_section_three->banner_one->status == 0 ? 'selected' : ''}}  value="0">InActive</option>
                      </select>
                    </div>
                  </div>
              <br>
              <h4>Banner Two</h4>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <img width="200px" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').@$homepage_banner_section_three->banner_two->banner_image)}}" alt="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_image_two" type="file" class="form-control">
                        <input type="hidden" name="old_banner_image_two" value="{{@$homepage_banner_section_three->banner_two->banner_image}}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Url</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_url_two" type="text" value="{{@$homepage_banner_section_three->banner_two->banner_url}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="status_two" class="form-control">
                        <option value="">Select</option>
                        <option {{@$homepage_banner_section_three->banner_two->status == 1 ? 'selected' : ''}}  value="1">Active</option>
                        <option {{@$homepage_banner_section_three->banner_two->status == 0 ? 'selected' : ''}}  value="0">InActive</option>
                      </select>
                    </div>
                </div>
              <br>
              <h4>Banner Three</h4>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <img width="200px" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').@$homepage_banner_section_three->banner_three->banner_image)}}" alt="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_image_three" type="file" class="form-control">
                        <input type="hidden" name="old_banner_image_three" value="{{@$homepage_banner_section_three->banner_three->banner_image}}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Url</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_url_three" type="text" value="{{@$homepage_banner_section_three->banner_three->banner_url}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="status_three" class="form-control">
                        <option value="">Select</option>
                        <option {{@$homepage_banner_section_three->banner_three->status == 1 ? 'selected' : ''}}  value="1">Active</option>
                        <option {{@$homepage_banner_section_three->banner_three->status == 0 ? 'selected' : ''}}  value="0">InActive</option>
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
