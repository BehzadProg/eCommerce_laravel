<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        @foreach ($sliders as $slider)

                        <div class="col-xl-12">
                            <div class="wsus__single_slider" style="background: url({{env('SLIDER_IMAGE_UPLOAD_PATH').$slider->banner}});">
                                <div class="wsus__single_slider_text">
                                    <h3>{!!$slider->type!!}</h3>
                                    <h1>{!!$slider->title!!}</h1>
                                    <h6>start at ${{$slider->starting_price}}</h6>
                                    @if($slider->btn_url && $slider->btn_text)
                                    <a class="common_btn" href="{{$slider->btn_url}}">{{$slider->btn_text}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
