<section id="wsus__large_banner">
    <img class="img-lagrge" src="{{ asset('frontend/images/img-lagrge.jpg') }}" alt="">

    <div class="container">
        <div class="row">

            <div class="cl-xl-12">
                @if ($homepage_section_banner_two->banner_one->status == 1)
                <div class="wsus__large_banner_content" style="background: url({{asset($homepage_section_banner_two->banner_one->banner_image)}});">
                    <div class="wsus__large_banner_content_overlay">
                        <div class="row">
                            <div class="col-xl-6 col-12 col-md-6">
                                <div class="wsus__large_banner_text">
                                    <h3>This Week's Deal</h3>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repudiandae in
                                        ipsam
                                        nesciunt.</p>
                                    <a class="shop_btn" href="{{route('flash-sale')}}">view more</a>
                                </div>
                            </div>
                            {{-- <div class="col-xl-6 col-12 col-md-6">
                                <div class="wsus__large_banner_text wsus__large_banner_text_right">
                                    <h3>headphones</h3>
                                    <h5>up to 20% off</h5>
                                    <p>Spring's collection has discounted now!</p>
                                    <a class="shop_btn" href="#">shop now</a>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endif


        </div>
    </div>
</section>
