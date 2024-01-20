@php
    $productSliderSectionThree = json_decode($productSliderSectionThree->value, true);

@endphp
<section id="wsus__weekly_best" class="home2_wsus__weekly_best_2 ">
    <div class="container">
        <div class="row">
            @foreach ($productSliderSectionThree as $productSectionThree)
                @php
                    $lastKey = [];
                    foreach ($productSectionThree as $key => $sectionThreeCat) {
                        if ($sectionThreeCat === null) {
                            break;
                        }
                        $lastKey = [$key => $sectionThreeCat];
                    }
                    if (array_keys($lastKey)[0] === 'category') {
                        $category = \App\Models\Category::find($lastKey['category']);
                        $products = \App\Models\Product::with('productReviews')->where('category_id', $category->id)
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get();
                    } elseif (array_keys($lastKey)[0] === 'sub_category') {
                        $category = \App\Models\SubCategory::find($lastKey['sub_category']);
                        $products = \App\Models\Product::with('productReviews')->where('sub_category_id', $category->id)
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get();
                    } else {
                        $category = \App\Models\ChildCategory::find($lastKey['child_category']);
                        $products = \App\Models\Product::with('productReviews')->where('child_category_id', $category->id)
                            ->orderBy('id', 'DESC')
                            ->take(6)
                            ->get();
                    }
                @endphp
                <div class="col-xl-6 col-sm-6 category-{{$key}}">
                    <div class="wsus__section_header">
                        <h3>{{$category->name}}</h3>
                    </div>
                    <div class="row weekly_best2">
                        @foreach ($products as $item)

                        <div class="col-xl-4 col-lg-4">
                            <a target="_blank" class="wsus__hot_deals__single" href="{{route('product-detail', $item->slug)}}">
                                <div class="wsus__hot_deals__single_img">
                                    <img src="{{asset(env('ADMIN_PRODUCT_IMAGE_UPLOAD_PATH').$item->thumb_image)}}" alt="{{$item->name}}" class="img-fluid w-100">
                                </div>
                                <div class="wsus__hot_deals__single_text mt-2">
                                    <h5>{!! limitText($item->name , 15) !!}</h5>
                                    <p class="wsus__rating">
                                        @php
                                        $avgRating = ceil($item->productReviews->avg('rate'));
                                        @endphp
                                        @for ($i = 1; $i <= 5; $i++)
                                           @if ($i <= $avgRating)
                                              <i class="fas fa-star"></i>
                                           @else
                                               <i class="far fa-star"></i>
                                           @endif
                                         @endfor

                                    </p>
                                    @if (checkDiscount($item))

                                    <p class="wsus__tk">{{$settings->currency_icon}} {{$item->offer_price}} <del>{{$settings->currency_icon}} {{$item->price}}</del></p>
                                    @else
                                    <p class="wsus__tk">{{$settings->currency_icon}} {{$item->price}}</p>
                                    @endif
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
