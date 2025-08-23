<h2 class="title text-left appear-animate mb-5">Featured Products</h2>
<div class="row banner-product-wrapper appear-animate mb-7">
    <div class="col-lg-9 mb-4 mb-lg-0">
        <div class="banner banner-fixed br-sm appear-animate">
            <figure>
                <img
{{--                    src="assets/images/demos/demo3/banners/3.jpg"--}}
                    src="{{ asset('assets/images/demos/demo3/banners/3.jpg') }}"
                    alt="banner"
                    width="925"
                    height="298"
                    style="background-color: #56575c"
                />
            </figure>
            <div class="banner-content y-50">
                <h5
                    class="banner-subtitle text-primary font-weight-bold text-uppercase ls-25"
                >
                    Office Electronics
                </h5>
                <h3
                    class="banner-title font-weight-bold text-uppercase text-white ls-25"
                >
                    Wonderful Long Weekend<br /><strong class="text-capitalize"
                    >Apple Drones</strong
                    >
                </h3>
                <a
                    href="{{ route('shopFullwidthBanner', ['category' => 'Accessories']) }}"
                    class="btn btn-white btn-outline btn-rounded"
                >Shop Now</a
                >
            </div>
        </div>
        <div
            class="swiper-container swiper-theme mt-4"
            data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 2,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 3
                                },
                                '768': {
                                    'slidesPerView': 4
                                }
                            }
                        }"
        >
            <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-2">
                @foreach($featuredProducts as $featuredProduct)
                    <div class="swiper-slide product-wrap">
                        <div class="product product-simple text-center">
                            <figure class="product-media">
                                <a href="{{ route('product-details', ['product_id' => $featuredProduct['Id']]) }}">
                                    <img
                                        src="{{ config('api.url') . $featuredProduct['Image'] }}"
                                        alt="{{ $featuredProduct['Title'] }}"
                                        width="330"
                                        height="338"
                                    />
                                </a>
                                <div class="product-action-vertical">
                                    <a
                                        href="#"
                                        class="btn-product-icon btn-wishlist w-icon-heart"
                                        title="Add to wishlist"
                                    ></a>
                                    <a
                                        href="#"
                                        class="btn-product-icon btn-compare w-icon-compare"
                                        title="Add to Compare"
                                    ></a>
                                </div>
                                <div class="product-action">
                                    <a
                                        href="{{ route('product-details', ['product_id' => $featuredProduct['Id']]) }}"
                                        class="btn-product btn-quickview"
                                        title="Quick View"
                                    >Quick View</a
                                    >
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="{{ route('product-details', ['product_id' => $featuredProduct['Id']]) }}">{{ $featuredProduct['Title'] }}</a>
                                </h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ route('product-details', ['product_id' => $featuredProduct['Id']]) }}" class="rating-reviews"
                                    >(3 reviews)</a
                                    >
                                </div>
                                <div class="product-pa-wrapper">
                                    <div class="product-price">
                                        <ins class="new-price">৳ {{ $featuredProduct['Price'] }}</ins>
                                    </div>
                                    <div class="product-action">
                                        <a
                                            href="#"
                                            class="btn-cart btn-product btn btn-icon-right btn-link btn-underline"
                                        >Add To Cart</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- End of Product Wrap -->
            </div>
        </div>
    </div>
    @include('home.featureProductsRec')
</div>
