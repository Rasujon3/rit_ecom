@if(count($arrivalProducts) == 0)
    <p>No arrival products found.</p>
@else
    @php
        $chunks = collect($arrivalProducts)->chunk(4);
    @endphp

    <div class="col-lg-3">
        <div class="widget widget-products widget-products-bordered h-100">
            <div class="widget-body br-sm pb-2 h-100">
                <h4 class="title-sm title-underline font-weight-bolder ls-normal mb-2">Recommend</h4>
                <div class="swiper">
                    <div class="swiper-container swiper-theme nav-top"
                         data-swiper-options="{
                        'slidesPerView': 1,
                        'spaceBetween': 20,
                        'navigation': true,
                        'breakpoints': {
                            '576': {
                                'slidesPerView': 1
                            },
                            '992': {
                                'slidesPerView': 1
                            }
                        }
                     }">
                        <div class="swiper-wrapper row cols-lg-1 cols-md-3">
                            @foreach($chunks as $chunk)
                                <div class="swiper-slide product-widget-wrap">
                                    @foreach($chunk as $product)
                                        <div class="product product-widget bb-no">
                                            <figure class="product-media">
                                                <a href="{{ route('product-details', ['product_id' => $product['Id']]) }}">
                                                    <img
                                                        src="{{ config('api.url') . $product['Image'] }}"
                                                        alt="{{ $product['Title'] }}"
                                                        width="105"
                                                        height="118"
                                                    />
                                                </a>
                                            </figure>
                                            <div class="product-details">
                                                <h4 class="product-name">
                                                    <a href="{{ route('product-details', ['product_id' => $product['Id']]) }}">
                                                        {{ $product['Title'] }}
                                                    </a>
                                                </h4>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 80%"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                </div>
                                                <div class="product-price">
                                                    <ins class="new-price">৳ {{ $product['Price'] }}</ins>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                        @if(count($arrivalProducts) > 4)
                            <button class="swiper-button-next"></button>
                            <button class="swiper-button-prev"></button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
