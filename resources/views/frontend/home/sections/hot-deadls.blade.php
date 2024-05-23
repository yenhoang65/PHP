<section id="wsus__hot_deals" class="wsus__hot_deals_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="wsus__section_header">
                    <h3>hot deals of the day</h3>
                </div>
            </div>
        </div>

        <section id="wsus__single_banner" class="home_2_single_banner">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">

                        @if ($homepage_section_banner_one->banner_one->status == 1)

                        <div class="wsus__single_banner_content banner_1">
                            <div class="wsus__single_banner_img">
                                <img class="img-gluid" src="{{asset($homepage_section_banner_one->banner_one->banner_image)}}" alt="banner" class="img-fluid w-100">
                            </div>
                            <div class="wsus__single_banner_text">
                                <h6>sell on <span>35% off</span></h6>
                                <h3>Tea</h3>
                                <a class="shop_btn" href="{{route('products.index')}}">shop now</a>
                            </div>
                        </div>
                        @endif

                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="row">
                            @if ($homepage_section_banner_one->banner_two->status == 1)
                            <div class="col-12">
                                <div class="wsus__single_banner_content single_banner_2">
                                    <div class="wsus__single_banner_img">
                                        <img src="{{asset($homepage_section_banner_one->banner_two->banner_image)}}" alt="banner" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        {{-- <h6>New Collection</h6> --}}
                                        {{-- <h3>kid's fashion</h3> --}}
                                        {{-- <a class="shop_btn" href="#">shop now</a> --}}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($homepage_section_banner_one->banner_three->status == 1)
                            <div class="col-12 mt-lg-4">
                                <div class="wsus__single_banner_content">
                                    <div class="wsus__single_banner_img">
                                        <img src="{{asset($homepage_section_banner_one->banner_three->banner_image)}}" alt="banner" class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_banner_text">
                                        <h6>sell on <span>42% off</span></h6>
                                        <h3>winter collection</h3>
                                        <a class="shop_btn" href="{{route('products.index')}}">shop now</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="wsus__hot_large_item">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__section_header justify-content-start">
                        <div class="monthly_top_filter2 mb-1">
                            <button class="active auto_click" data-filter=".new_arrival">New Arrival</button>
                            <button data-filter=".featured_product">Featured</button>
                            <button data-filter=".top_product">Top Product</button>
                            <button data-filter=".best_product">Best Product</button>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row grid2">
                @foreach ($typeBaseProduct as $key=>$products)
                @foreach ($products as $product)
                    <div class="col-xl-3 col-sm-6 col-lg-4 {{$key}}">
                    <div class="wsus__product_item">
                        <span class="wsus__new">{{ productType($product->product_type) }}</span>
                        @if (checkDiscount($product))
                            <span
                                class="wsus__minus">{{ calculateDiscount($product->price, $product->offer_price) }}%</span>
                        @endif
                        <a class="wsus__pro_link" href="{{ route('product-details', $product->slug) }}">
                            <img src="{{ asset($product->thumb_image) }}" alt="product"
                                class="img-fluid w-100 img_1" />
                            <img src="
                            @if (isset($product->productImageGalleries[0]->image)) {{ asset($product->productImageGalleries[0]->image) }}
                            @else
                                {{ asset($product->thumb_image) }} @endif
                            "
                                alt="product" class="img-fluid w-100 img_2" />
                        </a>
                        <ul class="wsus__single_pro_icon">
                            <li><a href="#" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $product->id }}"><i class="far fa-eye"></i></a>
                            </li>
                            <li><a href="#"><i class="far fa-heart"></i></a></li>
                            <li><a href="#"><i class="far fa-random"></i></a>
                        </ul>
                        <div class="wsus__product_details">
                            <a class="wsus__category" href="#">{{ $product->category->name }} </a>
                            <p class="wsus__pro_rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span>(133 review)</span>
                            </p>
                            <a class="wsus__pro_name" href="#">{{ $product->name }}</a>
                            @if (checkDiscount($product))
                                <p class="wsus__price">{{ number_format($product->offer_price) }}{{ $settings->currency_icon }}<del>
                                        {{ number_format($product->price) }} {{ $settings->currency_icon }}</del></p>
                            @else
                                <p class="wsus__price">{{ number_format($product->price )}}</p>
                            @endif
                            <form class="shopping-cart-form">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                @foreach ($product->variants as $variant)
                                    <div class="col-xl-6 col-sm-6">

                                        <select class="d-none" name="variants_items[]">
                                            @foreach ($variant->productVariantItems as $variantItem)
                                                <option value="{{ $variantItem->id }}"
                                                    {{ $variantItem->is_default == 1 ? 'selected' : '' }}>
                                                    {{ $variantItem->name }}
                                                    (${{ $variantItem->price }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                                <input name="qty" type="hidden" min="1" max="100" value="1" />
                                <button type="submit" class="add_cart" href="#">add to cart</button>
                            </form>

                        </div>
                    </div>
                    </div>
                @endforeach
                @endforeach


            </div>
        </div>
    </div>
</section>
