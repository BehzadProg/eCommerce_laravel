@php
    $productSliderSectionOne = json_decode($productSliderSectionOne->value);

@endphp
<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
    <div class="card boarder">
        <div class="card-body">
            <form action="{{ route('admin.product-slider-section-one') }}" method="post">
                @csrf
                @method('PUT')
                <h6>Category</h6>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control select2 main-category ">
                                <option value="">Select</option>
                                @foreach ($categories as $category)
                                    <option {{ $category->id == $productSliderSectionOne->category ? 'selected' : '' }}
                                        value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                                $subCategories = \App\Models\SubCategory::where('category_id', $productSliderSectionOne->category)->get();
                            @endphp
                            <label>Sub Category</label>
                            <select name="sub_category" class="form-control select2 sub-category">
                                <option value="">Select</option>
                                @foreach ($subCategories as $subCat)
                                <option {{$subCat->id == $productSliderSectionOne->sub_category ? 'selected' : ''}}  value="{{$subCat->id}}">{{$subCat->name}}</option>
                              @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            @php
                            $childCategories = \App\Models\ChildCategory::where('sub_category_id' , $productSliderSectionOne->sub_category)->get()
                            @endphp
                            <label>Child Category</label>
                            <select name="child_category" class="form-control select2 child-category">
                                <option value="">Select</option>
                                @foreach ($childCategories as $childCat)

                                <option {{$childCat->id == $productSliderSectionOne->child_category ? 'selected' : ''}}  value="{{$childCat->id}}">{{$childCat->name}}</option>
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
