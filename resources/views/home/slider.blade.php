<div class="intro-wrapper mb-4">
    @if (empty($slides))
        <div class="alert alert-warning text-center">No slides available at the moment.</div>
    @else
        <div
            class="swiper-container swiper-theme nav-inner swiper-nav-md animation-slider"
            data-swiper-options="{
                'autoplay': {
                    'delay': 8000,
                    'disableOnInteraction': false
                }
            }"
        >
            <div class="swiper-wrapper row cols-1 gutter-no">
                @foreach ($slides as $index => $slide)
                    <div
                        class="swiper-slide banner banner-fixed intro-slide intro-slide{{ $index + 1 }} br-sm"
                        style="background-image: url('{{ config('api.url') . $slide['Image'] ?? 'default-image.jpg' }}'); background-color: #f5f5f5;"
                    >
                        <div class="banner-content y-50 x-50 w-100 text-center">
                            <h5
                                class="banner-subtitle text-primary font-weight-normal text-capitalize font-secondary ls-25 slide-animate"
                                data-animation-options="{'name': 'fadeInDownShorter', 'duration': '.8s'}"
                            >
                                Featured
                            </h5>
                            <h3
                                class="banner-title text-white text-capitalize ls-25 lh-1 slide-animate"
                                data-animation-options="{'name': 'fadeInRightShorter', 'duration': '.5s', 'delay': '.5s'}"
                            >
                                {{ $slide['Title'] ?? 'Untitled' }}
                            </h3>
                            <a
                                href="{{ route('shop-banner-sidebar') }}"
                                class="btn btn-white btn-outline btn-rounded btn-icon-right slide-animate"
                                data-animation-options="{'name': 'fadeInUpShorter', 'duration': '.5s', 'delay': '.5s'}"
                            >
                                Shop Now <i class="w-icon-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="swiper-button-next"></button>
            <button class="swiper-button-prev"></button>
        </div>
    @endif
</div>
