@extends('layouts.app')

@section('content')
<main class="main mb-10 pb-1">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">
          <ul class="breadcrumb bb-no">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Products</li>
          </ul>
          <ul class="product-nav list-style-none">
            <li class="product-nav-prev">
              <a href="#">
                <i class="w-icon-angle-left"></i>
              </a>
              <span class="product-nav-popup">
                <img
                  src="{{ asset('assets/images/products/product-nav-prev.jpg') }}"
                  alt="Product"
                  width="110"
                  height="110"
                />
                <span class="product-name">Soft Sound Maker</span>
              </span>
            </li>
            <li class="product-nav-next">
              <a href="#">
                <i class="w-icon-angle-right"></i>
              </a>
              <span class="product-nav-popup">
                <img
                  src="{{ asset('assets/images/products/product-nav-next.jpg') }}"
                  alt="Product"
                  width="110"
                  height="110"
                />
                <span class="product-name">Fabulous Sound Speaker</span>
              </span>
            </li>
          </ul>
        </nav>
        <!-- End of Breadcrumb -->

        @if($product)
            <!-- Start of Page Content -->
            <div class="page-content">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="main-content">
                            <div class="product product-single row">
                                <div class="col-md-6 mb-6">
                                    <div class="product-gallery product-gallery-sticky">
                                        <div
                                            class="swiper-container product-single-swiper swiper-theme nav-inner"
                                            data-swiper-options="{
                                                'navigation': {
                                                    'nextEl': '.swiper-button-next',
                                                    'prevEl': '.swiper-button-prev'
                                                }
                                            }"
                                        >
                                            <!--@include('product.productShowingSection')-->

                                            <button class="swiper-button-next"></button>
                                            <button class="swiper-button-prev"></button>
                                            <a
                                                href="#"
                                                class="product-gallery-btn product-image-full"
                                            ><i class="w-icon-zoom"></i>
                                            </a>
                                        </div>
                                        <div
                                            class="product-thumbs-wrap swiper-container"
                                            data-swiper-options="{
                                                'navigation': {
                                                    'nextEl': '.swiper-button-next',
                                                    'prevEl': '.swiper-button-prev'
                                                }
                                            }"
                                        >
                                            {{--                        @include('product.productVarients')--}}
                                        </div>
                                    </div>
                                </div>
                                @if(!$product || empty($product['title']))
                                    <p>Nothing found.</p>
                                @else
                                    <div class="col-md-6 mb-4 mb-md-6">
                                        <div
                                            class="product-details"
                                            data-sticky-options="{'minWidth': 767}"
                                        >
                                            <h1 class="product-title">
                                                {{ $product['title'] }}
                                            </h1>
                                            <div class="product-bm-wrapper">
                                                <figure class="brand">
                                                    <img
                                                        src="{{ config('api.url') .$product['image'] }}"
                                                        alt="Brand"
                                                        width="102"
                                                        height="48"
                                                    />
                                                </figure>
                                                <div class="product-meta">
                                                    <div class="product-categories">
                                                        Category:
                                                        <span class="product-category"
                                                        ><a href="#">{{ $product['category'] }}</a></span
                                                        >
                                                    </div>
                                                    <!--
                                                  <div class="product-sku">
                                                    SKU: <span>MS46891340</span>
                                                  </div>
                                                    -->
                                                </div>
                                            </div>

                                            <hr class="product-divider" />

                                            <div class="product-price">
                                                <ins class="new-price">৳ {{ $product['price'] }}</ins>
                                            </div>

                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <a
                                                    href="#"
                                                    class="rating-reviews scroll-to"
                                                >(3 Reviews)</a
                                                >
                                            </div>
                                            @if(isset($product['point']))
                                                <div class="product-price">
                                                    PB: <ins class="new-price">৳ {{ $product['point'] }}</ins>
                                                </div>
                                            @endif

                                            <div class="product-short-desc">
                                                {{ $product['details'] }}
                                            </div>

                                            <hr class="product-divider" />

                                            <!--
                                          <div
                                            class="product-form product-variation-form product-color-swatch"
                                          >
                                            <label>Color:</label>
                                            <div
                                              class="d-flex align-items-center product-variations"
                                            >
                                              <a
                                                href="#"
                                                class="color"
                                                style="background-color: #ffcc01"
                                              ></a>
                                              <a
                                                href="#"
                                                class="color"
                                                style="background-color: #ca6d00"
                                              ></a>
                                              <a
                                                href="#"
                                                class="color"
                                                style="background-color: #1c93cb"
                                              ></a>
                                              <a
                                                href="#"
                                                class="color"
                                                style="background-color: #ccc"
                                              ></a>
                                              <a
                                                href="#"
                                                class="color"
                                                style="background-color: #333"
                                              ></a>
                                            </div>
                                          </div>
                                          <div
                                            class="product-form product-variation-form product-size-swatch"
                                          >
                                            <label class="mb-1">Size:</label>
                                            <div
                                              class="flex-wrap d-flex align-items-center product-variations"
                                            >
                                              <a href="#" class="size">Small</a>
                                              <a href="#" class="size">Medium</a>
                                              <a href="#" class="size">Large</a>
                                              <a href="#" class="size">Extra Large</a>
                                            </div>
                                            <a href="#" class="product-variation-clean"
                                              >Clean All</a
                                            >
                                          </div>
                                            -->

                                            {{--                      <div class="product-variation-price">--}}
                                            {{--                        <span>{{ $product['price'] }}</span>--}}
                                            {{--                      </div>--}}

                                            @include('product.productSocialLinks')
                                        </div>
                                    </div>
                                @endif


                            </div>
                            {{--                  @include('product.frequentlyBrought')--}}
                            @include('product.tabProducts')

                            {{--                @include('product.vendorProductSection')--}}
                            {{--                @include('product.relatedProductSection')--}}
                        </div>
                        <!-- End of Main Content -->
                        @include('product.productSidebar')
                        <!-- End of Sidebar -->
                    </div>
                </div>
            </div>
            <!-- End of Page Content -->
        @endif
      </main>
@endsection

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.add-to-wishlist').on('click', function (e) {
            e.preventDefault();
            let el = $(this);
            let product_id = el.data('id');

            $.ajax({
                url: '{{ route("wishlist.add") }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: product_id,
                    title: el.data('title'),
                    image: el.data('image'),
                    price: el.data('price'),
                    point: el.data('point')
                },
                success: function (response) {
                    if (response.status) {
                        // alert('✔️ ' + response.message);
                        toastr.success('✔️ ' + response.message);
                        el.addClass('disabled').css('pointer-events', 'none');
                    } else {
                        // alert('⚠️ ' + response.message);
                        toastr.error('⚠️ ' + response.message);
                    }
                },
                error: function (xhr) {
                    // alert('❌ Failed to add to wishlist.');
                    toastr.error('❌ Failed to add to wishlist.');
                }
            });
        });

        function updateCartDropdown() {
            $.ajax({
                url: "{{ route('cart.html') }}",
                type: "GET",
                success: function (res) {
                    if (res.status) {
                        $('#cart-dropdown-box').html($(res.html).find('#cart-dropdown-box').html());
                        $('#cart-count').text($(res.html).find('#cart-count').text());
                    }
                },
                error: function () {
                    console.error("Failed to update cart.");
                }
            });
        }

        // $('.add_to_cart').one('click', function (e) {
        $('#add_to_cart').one('click', function (e) {
            // e.preventDefault();
            let el = $(this);
            let product_id = el.data('id');

            try {
                $.ajax({
                    url: '{{ route("cart.add") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: product_id,
                        title: el.data('title'),
                        image: el.data('image'),
                        price: el.data('price'),
                        point: el.data('point')
                    },
                    success: function (response) {
                        if (response.status === true) {
                            console.log('dfasdf', response);
                            // alert('✔️ ' + response.message);
                            toastr.success('Added to cart!');
                            el.addClass('disabled').css('pointer-events', 'none');
                            updateCartDropdown();
                        }
                        if (response.status === false) {
                            console.log('false', response);
                            // alert('✔️ ' + response.message);
                            toastr.error(response.message);
                        }
                    },
                    error: function (xhr) {
                        // alert('❌ Failed to add to cart.');
                        toastr.error('Failed to add to cart.');
                    }
                });
            } catch (error) {
                // alert('Something went wrong!!!');
                toastr.error('Something went wrong!!!');
            }
        });
    });
</script>
