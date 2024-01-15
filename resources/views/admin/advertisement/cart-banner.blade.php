<div class="tab-pane fade {{session()->has('advertisement_list_style') && session()->get('advertisement_list_style') == 'cart' ? 'show active' : ''}}" id="list-cart" role="tabpanel" aria-labelledby="list-cart-list">

    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.cart-view-banner')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h4>Banner One</h4>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <img width="200px" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').@$cartview_banner_section->banner_one->banner_image)}}" alt="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_image_one" type="file" class="form-control">
                        <input type="hidden" name="old_banner_image_one" value="{{@$cartview_banner_section->banner_one->banner_image}}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Url</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_url_one" type="text" value="{{@$cartview_banner_section->banner_one->banner_url}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="status_one" class="form-control">
                        <option value="">Select</option>
                        <option {{@$cartview_banner_section->banner_one->status == 1 ? 'selected' : ''}}  value="1">Active</option>
                        <option {{@$cartview_banner_section->banner_one->status == 0 ? 'selected' : ''}}  value="0">InActive</option>
                      </select>
                    </div>
                  </div>
              <br>
              <h4>Banner Two</h4>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <img width="200px" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').@$cartview_banner_section->banner_two->banner_image)}}" alt="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_image_two" type="file" class="form-control">
                        <input type="hidden" name="old_banner_image_two" value="{{@$cartview_banner_section->banner_two->banner_image}}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Url</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_url_two" type="text" value="{{@$cartview_banner_section->banner_two->banner_url}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="status_two" class="form-control">
                        <option value="">Select</option>
                        <option {{@$cartview_banner_section->banner_two->status == 1 ? 'selected' : ''}}  value="1">Active</option>
                        <option {{@$cartview_banner_section->banner_two->status == 0 ? 'selected' : ''}}  value="0">InActive</option>
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
