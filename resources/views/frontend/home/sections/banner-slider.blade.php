<section id="wsus__banner">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__banner_content">
                    <div class="row banner_slider">
                        @foreach ($sliders as $slider)
                            <div class="col-xl-12">
                                <div class="wsus__single_slider" style="background: url({{$slider->banner}});">
                                    <div class="wsus__single_slider_text">
                                        {{-- <h3>new arrivals</h3> --}}
                                        {{-- <h1>men's fashion</h1> --}}
                                        {{-- <h6>start at $99.00</h6> --}}
                                        {{-- <a class="common_btn" href="#">shop now</a> --}}
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
