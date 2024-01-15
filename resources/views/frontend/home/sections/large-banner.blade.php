@if ($homepage_banner_section_four->banner_one->status == 1)
<section id="wsus__large_banner">
    <div class="container">
        <div class="row">
            <div class="cl-xl-12">
                <a href="{{$homepage_banner_section_four->banner_one->banner_url}}" target="_blank">
                    <img class="img-fluid" src="{{asset(env('ADVERTISEMENT_BANNER_IMAGE_UPLOAD_PATH').$homepage_banner_section_four->banner_one->banner_image)}}" alt="img">
                </a>  
            </div>
        </div>
    </div>
</section>
@endif
