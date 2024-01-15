<div class="tab-pane fade {{session()->has('advertisement_list_style') && session()->get('advertisement_list_style') == 'product' ? 'show active' : ''}}" id="list-product" role="tabpanel" aria-labelledby="list-product-list">

    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.product-page-banner')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <img width="200px" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').@$productpage_banner_section->banner_one->banner_image)}}" alt="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Image</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_image" type="file" value="" class="form-control">
                        <input type="hidden" name="old_banner_image" value="{{@$productpage_banner_section->banner_one->banner_image}}">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Banner Url</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="banner_url" type="text" value="{{@$productpage_banner_section->banner_one->banner_url}}" class="form-control">
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                    <div class="col-sm-12 col-md-7">
                      <select name="status" class="form-control">
                        <option value="">Select</option>
                        <option {{@$productpage_banner_section->banner_one->status == 1 ? 'selected' : ''}}  value="1">Active</option>
                        <option {{@$productpage_banner_section->banner_one->status == 0 ? 'selected' : ''}}  value="0">InActive</option>
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