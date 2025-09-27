<div class="col-lg-9 mb-4 mb-lg-0">
    <div class="banner banner-fixed br-sm appear-animate">
        <figure>
            <img
                src="{{ asset('assets/images/demos/demo3/banners/2.jpg') }}"
                alt="banner"
                width="925"
                height="298"
                style="background-color: #ecede8"
            />
        </figure>
        <div class="banner-content y-50">
            <h5
                class="banner-subtitle text-primary font-weight-bold text-uppercase ls-25"
            >
                Season Lifestyle
            </h5>
            <h3
                class="banner-title font-weight-bold text-uppercase ls-25"
            >
                Wonderful Long Weekend<br /><strong class="text-capitalize"
                >Women's Style</strong
                >
            </h3>
            <a
                href="{{ route('shopFullwidthBanner', ['category' => 'Mobile']) }}"
                class="btn btn-dark btn-outline btn-rounded"
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
            @if(!empty($arrivalProducts))
                @foreach($arrivalProducts as $arrivalProduct)
                    <div class="swiper-slide product-wrap">
                        <div class="product product-simple text-center">
                            <figure class="product-media">
                                <a href="{{ route('product-details', ['product_id' => $arrivalProduct['Id']]) }}">
                                    <img
                                        src="{{ config('api.url') . $arrivalProduct['Image'] }}"
                                        alt="{{ $arrivalProduct['Title'] }}"
                                        width="330"
                                        height="338"
                                    />
                                </a>
                                <div class="product-action-vertical">
                                    <a
                                        href="javascript:void(0);"
                                        class="btn-product-icon btn-wishlist w-icon-heart add-to-wishlist"
                                        title="Add to wishlist"
                                        data-id="{{ $arrivalProduct['Id'] }}"
                                        data-title="{{ $arrivalProduct['Title'] }}"
                                        data-image="{{ config('api.url') . $arrivalProduct['Image'] }}"
                                        data-price="{{ $arrivalProduct['Price'] }}"
                                        data-point="{{ $arrivalProduct['point'] ?? 0 }}"
                                    ></a>
                                    {{--                                        <a--}}
                                    {{--                                            href="#"--}}
                                    {{--                                            class="btn-product-icon btn-compare w-icon-compare"--}}
                                    {{--                                            title="Add to Compare"--}}
                                    {{--                                        ></a>--}}
                                </div>
                                <div class="product-action">
                                    <a
                                        href="{{ route('product-details', ['product_id' => $arrivalProduct['Id']]) }}"
                                        class="btn-product"
                                        title="Quick View"
                                    >Quick View</a
                                    >
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name">
                                    <a href="{{ route('product-details', ['product_id' => $arrivalProduct['Id']]) }}"
                                    >{{ $arrivalProduct['Title'] }}</a
                                    >
                                </h4>
                                <div class="ratings-container">
                                    <div class="ratings-full">
                                        <span class="ratings" style="width: 100%"></span>
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <a href="{{ route('product-details', ['product_id' => $arrivalProduct['Id']]) }}" class="rating-reviews"
                                    >(3 reviews)</a
                                    >
                                </div>
                                @if(isset($arrivalProduct['point']))
                                    <div class="product-price">
                                        PB: <ins class="new-price">৳ {{ $arrivalProduct['point'] }}</ins>
                                    </div>
                                @endif
                                <div class="product-pa-wrapper">
                                    <div class="product-price">
                                        <ins class="new-price">৳ {{ $arrivalProduct['Price'] }}</ins>
                                    </div>
                                    <div class="product-action">
                                        <a
                                            href="javascript:void(0);"
                                            class="btn-cart btn-product btn btn-icon-right btn-link btn-underline add-to-cart"
                                            data-id="{{ $arrivalProduct['Id'] }}"
                                            data-title="{{ $arrivalProduct['Title'] }}"
                                            data-image="{{ config('api.url') . $arrivalProduct['Image'] }}"
                                            data-price="{{ $arrivalProduct['Price'] }}"
                                            data-point="{{ $arrivalProduct['point'] ?? 0 }}"
                                        >Add To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <!-- End of Product Wrap -->
        </div>
    </div>
</div>
