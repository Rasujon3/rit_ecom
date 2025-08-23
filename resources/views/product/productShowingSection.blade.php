@if(!$product || empty($product['title']))
    <p>Nothing found.</p>
@else
    
    <div class="swiper-wrapper row cols-1 gutter-no">
    <div class="swiper-slide">
        <figure class="product-image">
            <img
                src="{{ config('api.url') .  $product['image'] }}"
                data-zoom-image="{{ config('api.url') . $product['image'] }}"
                alt="{{ $product['title'] ?? '' }}"
                width="800"
                height="900"
            />
        </figure>
    </div>
</div>
@endif



