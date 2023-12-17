@php
    $popularCategory = json_decode($popularCategorySection->value);
@endphp
<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
    <div class="card boarder">
        <div class="card-body">
            <form action="{{route('admin.popular-category-section')}}" method="post">
                @csrf
                @method('PUT')
                <h6>Category 1</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                              <select name="cat_one" class="form-control selectric select2 main-category ">
                                <option  value="">Select</option>
                                @foreach ($categories as $category)

                                <option {{$category->id == $popularCategory[0]->category ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id' , $popularCategory[0]->category)->get()
                            @endphp
                            <label>Sub Category</label>
                              <select name="sub_cat_one" class="form-control selectric select2 sub-category">
                                  <option  value="">Select</option>
                                @foreach ($subCategories as $subCat)
                                  <option {{$subCat->id == $popularCategory[0]->sub_category ? 'selected' : ''}}  value="{{$subCat->id}}">{{$subCat->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                            $childCategories = \App\Models\ChildCategory::where('sub_category_id' , $popularCategory[0]->sub_category)->get()
                            @endphp
                            <label>Child Category</label>
                              <select name="child_cat_one" class="form-control selectric select2 child-category">
                                <option  value="">Select</option>
                                @foreach ($childCategories as $childCat)

                                <option {{$childCat->id == $popularCategory[0]->child_category ? 'selected' : ''}}  value="{{$childCat->id}}">{{$childCat->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                </div>
                <h6>Category 2</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                              <select name="cat_two" class="form-control selectric select2 main-category">
                                <option  value="">Select</option>
                                @foreach ($categories as $category)

                                <option {{$category->id == $popularCategory[1]->category ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                            $subCategories = \App\Models\SubCategory::where('category_id' , $popularCategory[1]->category)->get()
                        @endphp
                            <label>Sub Category</label>
                              <select name="sub_cat_two" class="form-control selectric select2 sub-category">
                                <option  value="">Select</option>
                                @foreach ($subCategories as $subCat)
                                <option {{$subCat->id == $popularCategory[1]->sub_category ? 'selected' : ''}}  value="{{$subCat->id}}">{{$subCat->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                            $childCategories = \App\Models\ChildCategory::where('sub_category_id' , $popularCategory[1]->sub_category)->get()
                            @endphp
                            <label>Child Category</label>
                              <select name="child_cat_two" class="form-control selectric select2 child-category">
                                <option  value="">Select</option>
                                @foreach ($childCategories as $childCat)

                                <option {{$childCat->id == $popularCategory[1]->child_category ? 'selected' : ''}}  value="{{$childCat->id}}">{{$childCat->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                </div>
                <h6>Category 3</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                              <select name="cat_three" class="form-control selectric select2 main-category">
                                <option  value="">Select</option>
                                @foreach ($categories as $category)

                                <option {{$category->id == $popularCategory[2]->category ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                            $subCategories = \App\Models\SubCategory::where('category_id' , $popularCategory[2]->category)->get()
                           @endphp
                            <label>Sub Category</label>
                              <select name="sub_cat_three" class="form-control selectric select2 sub-category">
                                <option  value="">Select</option>
                                @foreach ($subCategories as $subCat)
                                <option {{$subCat->id == $popularCategory[2]->sub_category ? 'selected' : ''}}  value="{{$subCat->id}}">{{$subCat->name}}</option>
                              @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                            $childCategories = \App\Models\ChildCategory::where('sub_category_id' , $popularCategory[2]->sub_category)->get()
                            @endphp
                            <label>Child Category</label>
                              <select name="child_cat_three" class="form-control selectric select2 child-category">
                                <option  value="">Select</option>
                                @foreach ($childCategories as $childCat)

                                <option {{$childCat->id == $popularCategory[2]->child_category ? 'selected' : ''}}  value="{{$childCat->id}}">{{$childCat->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                </div>
                <h6>Category 4</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                              <select name="cat_four" class="form-control selectric select2 main-category">
                                <option  value="">Select</option>
                                @foreach ($categories as $category)

                                <option {{$category->id == $popularCategory[3]->category ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                            $subCategories = \App\Models\SubCategory::where('category_id' , $popularCategory[3]->category)->get()
                           @endphp
                            <label>Sub Category</label>
                              <select name="sub_cat_four" class="form-control selectric select2 sub-category">
                                <option  value="">Select</option>
                                @foreach ($subCategories as $subCat)
                                <option {{$subCat->id == $popularCategory[3]->sub_category ? 'selected' : ''}}  value="{{$subCat->id}}">{{$subCat->name}}</option>
                              @endforeach
                              </select>
                          </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                            $childCategories = \App\Models\ChildCategory::where('sub_category_id' , $popularCategory[3]->sub_category)->get()
                            @endphp
                            <label>Child Category</label>
                              <select name="child_cat_four" class="form-control selectric select2 child-category">
                                <option  value="">Select</option>
                                @foreach ($childCategories as $childCat)

                                <option {{$childCat->id == $popularCategory[3]->child_category ? 'selected' : ''}}  value="{{$childCat->id}}">{{$childCat->name}}</option>
                                @endforeach
                              </select>
                          </div>
                    </div>
                </div>

                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('change', '.main-category', function(e) {
                let id = $(this).val();
                let row = $(this).closest('.row')
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.get-subcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        let selector = row.find('.sub-category');
                        console.log(data);
                        selector.html(`<option value="">Select</option>`)
                        $.each(data, function(i, item) {
                            selector.append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
            $('body').on('change', '.sub-category', function(e) {
                let id = $(this).val();
                let row = $(this).closest('.row')
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.get-childcategories') }}",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        let selector = row.find('.child-category');
                        console.log(data);
                        selector.html(`<option value="">Select</option>`)
                        $.each(data, function(i, item) {
                            selector.append(
                                `<option value="${item.id}">${item.name}</option>`)
                        })
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
