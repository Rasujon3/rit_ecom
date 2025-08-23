<h2 class="title text-left pt-1 mb-5 appear-animate">
    Most Popular Brand
</h2>
<div class="swiper">
    <div
        class="swiper-container category-wrapper swiper-theme appear-animate"
        data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 2,
                        'breakpoints': {
                            '576': {
                                'slidesPerView': 3
                            },
                            '768': {
                                'slidesPerView': 4
                            },
                            '992': {
                                'slidesPerView': 5
                            },
                            '1200': {
                                'slidesPerView': 6
                            }
                        }
                    }"
    >
        <div
            class="swiper-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
        >
            @foreach($categories as $cat)
            <div class="swiper-slide category category-ellipse">
                <figure class="category-media">
                    <a href="{{ route('shopFullwidthBanner', ['category' => ($cat['Category'])]) }}">
                        <img
                            src="{{  config('api.url') . $cat['Image'] }}" alt="{{ $cat['Category'] }}"
                            width="190"
                            height="190"
                            style="background-color: #5c92c0"
                        />
                    </a>
                </figure>
                <div class="category-content">
                    <h4 class="category-name">
                        <a href="{{ route('shopFullwidthBanner', ['category' => ($cat['Category'])]) }}">{{ $cat['Category'] }}</a>
                    </h4>
                </div>
            </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
