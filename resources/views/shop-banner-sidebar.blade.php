@extends('layouts.app')

@section('content')
<main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
          <div class="container">
            <ul class="breadcrumb bb-no">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li>Shop</li>
            </ul>
          </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
          <div class="container">
            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg mb-10">
              <!-- Start of Sidebar, Shop Sidebar -->
              @include('shop.aside')
              <!-- End of Shop Sidebar -->

              <!-- Start of Shop Main Content -->
              <div class="main-content">
{{--                  @include('shop.nav')--}}
                  <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                      @forelse($products as $product)
                          <div class="product-wrap">
                              <div class="product text-center">
                                  <figure class="product-media">
                                      <a href="{{ route('product-details', ['product_id' => $product['Id']]) }}">
                                          <img src="{{ config('api.url') . $product['Image'] }}"
                                               alt="{{ $product['Title'] }}"
                                               width="300"
                                               height="338" />
                                      </a>
                                      <div class="product-action-horizontal">
                                          <a href="javascript:void(0);"
                                             class="btn-product-icon btn-cart w-icon-cart add-to-cart"
                                             data-id="{{ $product['Id'] }}"
                                             data-title="{{ $product['Title'] }}"
                                             data-image="{{ config('api.url') . $product['Image'] }}"
                                             data-price="{{ $product['Price'] }}"
                                             data-point="{{ $product['point'] ?? 0 }}"
                                             title="Add to cart"></a>
                                          <a href="#"
                                             class="btn-product-icon btn-wishlist w-icon-heart add-to-wishlist"
                                             data-id="{{ $product['Id'] }}"
                                             data-title="{{ $product['Title'] }}"
                                             data-image="{{ config('api.url') . $product['Image'] }}"
                                             data-price="{{ $product['Price'] }}"
                                             data-point="{{ $product['point'] ?? 0 }}"
                                             title="Wishlist"></a>
{{--                                          <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>--}}
                                          <a href="#" class="btn-product-icon btn-quickview w-icon-search" title="Quick View"></a>
                                      </div>
                                  </figure>
                                  <div class="product-details">
                                      <div class="product-cat">
                                          <a href="#">{{ $selectedCategory }}</a>
                                      </div>
                                      <h3 class="product-name">
                                          <a href="{{ route('product-details', ['product_id' => $product['Id']]) }}">
                                              {{ Str::limit($product['Title'], 40) }}
                                          </a>
                                      </h3>
                                      <div class="ratings-container">
                                          <div class="ratings-full">
                                              <span class="ratings" style="width: 100%"></span>
                                          </div>
                                      </div>
                                      <div class="product-pa-wrapper">
                                          <div class="product-price">
                                              ৳{{ $product['Price'] }}
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @empty
                          <p class="text-danger">No products found for {{ $selectedCategory }}</p>
                      @endforelse
                  </div>

{{--                  @include('shop.paginate')--}}
              </div>
              <!-- End of Shop Main Content -->
            </div>
            <!-- End of Shop Content -->
          </div>
        </div>
        <!-- End of Page Content -->
      </main>
@endsection

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.add-to-wishlist').on('click', function () {
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
                    // console.error("Failed to update cart.");
                    toastr.error('Failed to update cart.');
                }
            });
        }

        $('.add-to-cart').one('click', function () {
            e.preventDefault();
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
                        if (response.status) {
                            // alert('✔️ ' + response.message);
                            toastr.success('✔️ ' + response.message);
                            el.addClass('disabled').css('pointer-events', 'none');
                            updateCartDropdown();
                        } else {
                            // alert('⚠️ ' + response.message);
                            toastr.error('⚠️ ' + response.message);
                        }
                    },
                    error: function (xhr) {
                        // alert('❌ Failed to add to cart.');
                        toastr.error('❌ Failed to add to cart.');
                    }
                });
            } catch (error) {
                // alert('Something went wrong!!!');
                toastr.error('Something went wrong!!!');
            }
        });
    });
</script>
