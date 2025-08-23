<div
    class="swiper-container swiper-theme intro-banner appear-animate"
    data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2,
                            'spaceBetween': 15
                        },
                        '992': {
                            'slidesPerView': 3
                        }
                    }
                }"
>
    <div class="swiper-wrapper row cols-lg-3 cols-sm-2 cols-1">
        <div class="swiper-slide">
            <figure class="banner banner-fixed br-sm">
                <img
{{--                    src="assets/images/demos/demo3/categories/1.jpg"--}}
                    src="{{ asset('assets/images/demos/demo3/categories/1.jpg') }}"
                    alt="Category Banner"
                    width="400"
                    height="200"
                    style="background-color: #3c3c3c"
                />
                <div class="banner-content y-50">
                    <h5
                        class="banner-subtitle text-primary text-uppercase font-weight-bold ls-25"
                    >
                        Top Products
                    </h5>
                    <h3 class="banner-title text-white font-weight-bold">
                        Tranding NIKE<br />Sneaker
                    </h3>
                    <a
                        href="{{ route('shopFullwidthBanner', ['category' => 'Mens Products']) }}"
                        class="btn btn-white btn-link btn-underline btn-icon-right"
                    >
                        Shop Now<i class="w-icon-long-arrow-right"></i>
                    </a>
                </div>
            </figure>
        </div>

        <div class="swiper-slide">
            <figure class="banner banner-fixed br-sm">
                <img
{{--                    src="assets/images/demos/demo3/categories/2.jpg"--}}
                    src="{{ asset('assets/images/demos/demo3/categories/2.jpg') }}"
                    alt="Category Banner"
                    width="400"
                    height="200"
                    style="background-color: #e1e1e1"
                />
                <div class="banner-content y-50">
                    <h5
                        class="banner-subtitle text-primary text-uppercase font-weight-bold ls-25"
                    >
                        New Arrivals
                    </h5>
                    <h3 class="banner-title ls-25">
                        Vegan Friendly<br />Makeup
                    </h3>
                    <a
                        href="{{ route('shopFullwidthBanner', ['category' => 'Health & Beauty']) }}"
                        class="btn btn-dark btn-link btn-underline btn-icon-right"
                    >
                        Shop Now<i class="w-icon-long-arrow-right"></i>
                    </a>
                </div>
            </figure>
        </div>

        <div class="swiper-slide">
            <figure class="banner banner-fixed br-sm">
                <img
{{--                    src="assets/images/demos/demo3/categories/3.jpg"--}}
                    src="{{ asset('assets/images/demos/demo3/categories/3.jpg') }}"
                    alt="Category Banner"
                    width="400"
                    height="200"
                    style="background-color: #57585d"
                />
                <div class="banner-content y-50">
                    <h5
                        class="banner-subtitle text-primary text-uppercase font-weight-bold ls-25"
                    >
                        Best Seller
                    </h5>
                    <h3 class="banner-title text-white font-weight-bold ls-15">
                        Fashion Apple<br />Accessories
                    </h3>
                    <a
                        href="{{ route('shopFullwidthBanner', ['category' => 'Accessories']) }}"
                        class="btn btn-white btn-link btn-underline btn-icon-right"
                    >
                        Shop Now<i class="w-icon-long-arrow-right"></i>
                    </a>
                </div>
            </figure>
        </div>
    </div>
    <div class="swiper-pagination"></div>
</div>

<div
    class="swiper-container swiper-theme icon-box-wrapper appear-animate br-sm mt-6 mb-10"
    data-swiper-options="{
                    'slidesPerView': 1,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 4
                        }
                    }
                }"
>
    <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
        <div class="swiper-slide icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-shipping">
                  <i class="w-icon-truck"></i>
                </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-1 ls-normal">
                    Free Shipping & Returns
                </h4>
                <p class="text-default">For all orders over $99</p>
            </div>
        </div>
        <div class="swiper-slide icon-box icon-box-side text-dark">
                <span class="icon-box-icon icon-payment">
                  <i class="w-icon-bag"></i>
                </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-1 ls-normal">Secure Payment</h4>
                <p class="text-default">We ensure secure payment</p>
            </div>
        </div>
        <div
            class="swiper-slide icon-box icon-box-side text-dark icon-box-money"
        >
                <span class="icon-box-icon icon-money">
                  <i class="w-icon-money"></i>
                </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-1 ls-normal">
                    Money Back Guarantee
                </h4>
                <p class="text-default">Any back within 30 days</p>
            </div>
        </div>
        <div
            class="swiper-slide icon-box icon-box-side text-dark icon-box-chat"
        >
                <span class="icon-box-icon icon-chat">
                  <i class="w-icon-chat"></i>
                </span>
            <div class="icon-box-content">
                <h4 class="icon-box-title mb-1 ls-normal">
                    Customer Support
                </h4>
                <p class="text-default">Call or email us 24/7</p>
            </div>
        </div>
    </div>
</div>
