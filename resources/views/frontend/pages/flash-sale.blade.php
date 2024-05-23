@extends('frontend.layouts.master')

@section('title')
{{$settings->site_name}} || Flash Sale
@endsection

@section('content')

<!--============================
    BREADCRUMB START
==============================-->
<section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>offer detaila</h4>
                        <ul>
                            <li><a href="#">daily deals</a></li>
                            <li><a href="#">offer details</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--============================
    BREADCRUMB END
==============================-->


<!--============================
    DAILY DEALS DETAILS START
==============================-->
<section id="wsus__daily_deals">
        <div class="container">
            <div class="wsus__offer_details_area">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="wsus__section_header rounded-0">
                            <h3>flash sell</h3>
                            <div class="wsus__offer_countdown">
                                <span class="end_text">ends time :</span>
                                <div class="simply-countdown simply-countdown-one"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row flash_sell_slider" >
                    @foreach ($flashSaleItems as $item)
                    @php
                        $product = \App\Models\Product::find($item->product_id);
                    @endphp

                        <div class="col-xl-3 col-sm-6 col-lg-4">
                            <div class="wsus__product_item">
                                <span class="wsus__new">{{productType($product->product_type)}}</span>
                                @if (checkDiscount($product))
                                    <span class="wsus__minus">{{calculateDiscount($product->price,$product->offer_price)}}%</span>
                                @endif
                                <a class="wsus__pro_link" href="{{route('product-details',['slug'=>$product->slug])}}">
                                    <img src="{{asset($product->thumb_image)}}" alt="product" class="img-fluid w-100 img_1" />
                                    <img src="
                                    @if(isset($product->productImageGalleries[0]->image))
                                        {{asset($product->productImageGalleries[0]->image)}}
                                    @else
                                        {{asset($product->thumb_image)}}
                                    @endif
                                    " alt="product" class="img-fluid w-100 img_2" />
                                </a>
                                <ul class="wsus__single_pro_icon">
                                    <li><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                class="far fa-eye"></i></a></li>
                                    <li><a href="#"><i class="far fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a>
                                </ul>
                                <div class="wsus__product_details">
                                    <a class="wsus__category" href="#">{{$product->category->name}} </a>
                                    <p class="wsus__pro_rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                        <span>(133 review)</span>
                                    </p>
                                    <a class="wsus__pro_name" href="{{route('product-details','product->slug')}}">{{$product->name}}</a>
                                    @if (checkDiscount($product))
                                        <p class="wsus__price">{{number_format($product->offer_price)}}<del>{{number_format($product->price)}}</del></p>
                                    @else
                                        <p class="wsus__price">{{number_format($product->price)}}</p>
                                    @endif
                                    <a class="add_cart" href="#">add to cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if($flashSaleItems->hasPages())
                    {{$flashSaleItems->links()}}
                @endif
            </div>
        </div>
</section>
<!--============================
    DAILY DEALS DETAILS END
==============================-->



<!--============================
    PRODUCT MODAL VIEW START
==============================-->

{{-- @foreach ($flashSaleItems as $item)
@php
    $product = \App\Models\Product::find($item->product_id);
@endphp


@endforeach --}}
<section class="product_popup_modal">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                    <div class="row">
                        <div class="col-xl-6 col-12 col-sm-10 col-md-8 col-lg-6 m-auto display">
                            <div class="wsus__quick_view_img">
                                <a class="venobox wsus__pro_det_video" data-autoplay="true" data-vbtype="video"
                                    href="https://youtu.be/7m16dFI1AF8">
                                    <i class="fas fa-play"></i>
                                </a>
                                <div class="row modal_slider">
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="images/zoom1.jpg" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="images/zoom2.jpg" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="images/zoom3.jpg" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="modal_slider_img">
                                            <img src="images/zoom4.jpg" alt="product" class="img-fluid w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="wsus__pro_details_text">
                                <a class="title" href="#"></a>
                                <p class="wsus__stock_area"><span class="in_stock">in stock</span> (167 item)</p>
                                <h4>$50.00 <del>$60.00</del></h4>
                                <p class="review">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span>20 review</span>
                                </p>
                                <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

                                <div class="wsus_pro_hot_deals">
                                    <h5>offer ending time : </h5>
                                    <div class="simply-countdown simply-countdown-one"></div>
                                </div>
                                <div class="wsus_pro_det_color">
                                    <h5>color :</h5>
                                    <ul>
                                        <li><a class="blue" href="#"><i class="far fa-check"></i></a></li>
                                        <li><a class="orange" href="#"><i class="far fa-check"></i></a></li>
                                        <li><a class="yellow" href="#"><i class="far fa-check"></i></a></li>
                                        <li><a class="black" href="#"><i class="far fa-check"></i></a></li>
                                        <li><a class="red" href="#"><i class="far fa-check"></i></a></li>
                                    </ul>
                                </div>
                                <div class="wsus_pro__det_size">
                                    <h5>size :</h5>
                                    <ul>
                                        <li><a href="#">S</a></li>
                                        <li><a href="#">M</a></li>
                                        <li><a href="#">L</a></li>
                                        <li><a href="#">XL</a></li>
                                    </ul>
                                </div>
                                <div class="wsus__quentity">
                                    <h5>quentity :</h5>
                                    <form class="select_number">
                                        <input class="number_area" type="text" min="1" max="100" value="1" />
                                    </form>
                                    <h3>$50.00</h3>
                                </div>
                                <div class="wsus__selectbox">
                                    <div class="row">
                                        <div class="col-xl-6 col-sm-6">
                                            <h5 class="mb-2">select:</h5>
                                            <select class="select_2" name="state">
                                                <option>default select</option>
                                                <option>select 1</option>
                                                <option>select 2</option>
                                                <option>select 3</option>
                                                <option>select 4</option>
                                            </select>
                                        </div>
                                        <div class="col-xl-6 col-sm-6">
                                            <h5 class="mb-2">select:</h5>
                                            <select class="select_2" name="state">
                                                <option>default select</option>
                                                <option>select 1</option>
                                                <option>select 2</option>
                                                <option>select 3</option>
                                                <option>select 4</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <ul class="wsus__button_area">
                                    <li><a class="add_cart" href="#">add to cart</a></li>
                                    <li><a class="buy_now" href="#">buy now</a></li>
                                    <li><a href="#"><i class="fal fa-heart"></i></a></li>
                                    <li><a href="#"><i class="far fa-random"></i></a></li>
                                </ul>
                                <p class="brand_model"><span>model :</span> 12345670</p>
                                <p class="brand_model"><span>brand :</span> The Northland</p>
                                <div class="wsus__pro_det_share">
                                    <h5>share :</h5>
                                    <ul class="d-flex">
                                        <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li><a class="whatsapp" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a class="instagram" href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!--==========================
  PRODUCT MODAL VIEW END
===========================-->

@endsection

@push('scripts')

<script>
        $(document).ready(function(){
        simplyCountdown(".simply-countdown-one", {
            year: {{date('Y', strtotime($flashSaleDate->end_date))}},
            month: {{date('m', strtotime($flashSaleDate->end_date))}},
            day: {{date('d', strtotime($flashSaleDate->end_date))}},
        });
    })
</script>

@endpush
