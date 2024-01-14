<div class="tab-pane fade {{session()->has('advertisement_list_style') && session()->get('advertisement_list_style') == 'profile' ? 'show active' : ''}}" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.email-configration-update')}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                    <div class="col-sm-12 col-md-7">
                        <input name="email" type="text" value="" class="form-control">
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
