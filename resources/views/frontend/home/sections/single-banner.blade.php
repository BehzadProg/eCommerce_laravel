@if ($homepage_banner_section_two->banner_one->status == 1 or $homepage_banner_section_two->banner_two->status == 1)
    
<section id="wsus__single_banner" class="wsus__single_banner_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6">
                @if ($homepage_banner_section_two->banner_one->status == 1)
                <div class="wsus__single_banner_content">
                       
                        <a href="{{$homepage_banner_section_two->banner_one->banner_url}}" target="_blank">
                            <img class="img-fluid" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$homepage_banner_section_two->banner_one->banner_image)}}" alt="banner">
                        </a>
                </div>
                @endif
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="wsus__single_banner_content single_banner_2">
                    @if ($homepage_banner_section_two->banner_two->status == 1)
                    <div class="wsus__single_banner_content">
                           
                            <a href="{{$homepage_banner_section_two->banner_two->banner_url}}" target="_blank">
                                <img class="img-fluid" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$homepage_banner_section_two->banner_two->banner_image)}}" alt="banner">
                            </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
