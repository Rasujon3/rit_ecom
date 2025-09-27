<div class="social-links-wrapper">
    <div class="social-links">
        <div class="social-icons social-no-color border-thin">
            <a
                href="#"
                class="social-icon social-facebook w-icon-facebook"
            ></a>
            <a
                href="#"
                class="social-icon social-twitter w-icon-twitter"
            ></a>
            <a
                href="#"
                class="social-icon social-pinterest fab fa-pinterest-p"
            ></a>
            <a
                href="#"
                class="social-icon social-whatsapp fab fa-whatsapp"
            ></a>
            <a
                href="#"
                class="social-icon social-youtube fab fa-linkedin-in"
            ></a>
        </div>
    </div>
    <span class="divider d-xs-show"></span>
{{--    <div class="product-link-wrapper d-flex">--}}
{{--        <a--}}
{{--            href="javascript:void(0);"--}}
{{--            class="btn-product-icon btn-wishlist w-icon-heart add-to-wishlist"--}}
{{--            data-id="{{ $productId }}"--}}
{{--            data-title="{{ $product['title'] }}"--}}
{{--            data-image="{{ config('api.url') . $product['image'] }}"--}}
{{--            data-price="{{ $product['price'] }}"--}}
{{--            data-point="{{ $product['point'] ?? 0 }}"--}}
{{--        ><span></span--}}
{{--            ></a>--}}
{{--        <a--}}
{{--            href="javascript:void(0);"--}}
{{--            class="btn-product-icon btn-icon-left w-icon-cart add-to-cart"--}}
{{--            data-id="{{ $productId }}"--}}
{{--            data-title="{{ $product['title'] }}"--}}
{{--            data-image="{{ config('api.url') . $product['image'] }}"--}}
{{--            data-price="{{ $product['price'] }}"--}}
{{--            data-point="{{ $product['point'] ?? 0 }}"--}}
{{--        ><span></span--}}
{{--            ></a>--}}
{{--    </div>--}}
    <a href="javascript:void(0);"
       class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart add-to-cart"
       data-id="{{ $productId }}"
       data-title="{{ $product['title'] }}"
       data-image="{{ config('api.url') . $product['image'] }}"
       data-price="{{ $product['price'] }}"
       data-point="{{ $product['point'] ?? 0 }}"
    >
        Add to cart
    </a>
    {{--    <div class="product-link-wrapper d-flex">--}}
    {{--        <a--}}
    {{--            href="javascript:void(0);"--}}
    {{--            class="btn-product-icon btn-wishlist w-icon-heart add-to-wishlist"--}}
    {{--            data-id="{{ $productId }}"--}}
    {{--            data-title="{{ $product['title'] }}"--}}
    {{--            data-image="{{ config('api.url') . $product['image'] }}"--}}
    {{--            data-price="{{ $product['price'] }}"--}}
    {{--            data-point="{{ $product['point'] ?? 0 }}"--}}
    {{--        ><span></span--}}
    {{--            ></a>--}}
    {{--        <a--}}
    {{--            href="javascript:void(0);"--}}
    {{--            class="btn-product-icon btn-icon-left w-icon-cart add-to-cart"--}}
    {{--            data-id="{{ $productId }}"--}}
    {{--            data-title="{{ $product['title'] }}"--}}
    {{--            data-image="{{ config('api.url') . $product['image'] }}"--}}
    {{--            data-price="{{ $product['price'] }}"--}}
    {{--            data-point="{{ $product['point'] ?? 0 }}"--}}
    {{--        ><span></span--}}
    {{--            ></a>--}}
    {{--    </div>--}}
    <a href="javascript:void(0);"
       class="btn btn-dark btn-rounded btn-sm ml-lg-2"
       id="add_to_cart"
       data-id="{{ $productId }}"
       data-title="{{ $product['title'] }}"
       data-image="{{ config('api.url') . $product['image'] }}"
       data-price="{{ $product['price'] }}"
       data-point="{{ $product['point'] ?? 0 }}"
    >
        Add to cart
    </a>
</div>
