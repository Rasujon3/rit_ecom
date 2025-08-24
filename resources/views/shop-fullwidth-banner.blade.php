@extends('layouts.app')

@section('content')
    <main class="main">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb bb-no">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('home') }}">Shop</a></li>
                    <li>Fullwidth</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content mb-10">
{{--            @include('shop.shopBanner')--}}
            <!-- End of Shop Banner -->
            <div class="container-fluid">
                <!-- Start of Shop Content -->
                <div class="shop-content">
                    <!-- Start of Shop Main Content -->
                    <div class="main-content">
                        {{-- @include('partials.shop_banner_nav') --}}
                        <div
                            class="product-wrapper row cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2"
                        >
                            @if(empty($products))
                                <div class="alert alert-warning">No products found for this category.</div>
                            @else
                                @foreach($products as $product)
                                    <div class="product-wrap">
                                        <div class="product text-center">
                                            <figure class="product-media">
                                                <a href="{{ route('product-details', ['product_id' => $product['Id']]) }}">
                                                    <img
                                                        src="{{ config('api.url') . $product['Image'] }}"
                                                        alt="{{ $product['Title'] }}"
                                                        width="300"
                                                        height="338"
                                                    />
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

                                                    <a href="javascript:void(0);"
                                                       class="btn-product-icon btn-wishlist w-icon-heart add-to-wishlist"
                                                       data-id="{{ $product['Id'] }}"
                                                       data-title="{{ $product['Title'] }}"
                                                       data-image="{{ config('api.url') . $product['Image'] }}"
                                                       data-price="{{ $product['Price'] }}"
                                                       data-point="{{ $product['point'] ?? 0 }}"
                                                       title="Wishlist"></a>
{{--                                                    <a href="#" class="btn-product-icon btn-compare w-icon-compare" title="Compare"></a>--}}
                                                    <a href="{{ route('product-details', ['product_id' => $product['Id']]) }}" class="btn-product-icon btn-quickview w-icon-search" title="Quick View"></a>
                                                </div>
                                            </figure>
                                            <div class="product-details">
                                                <div class="product-cat">
                                                    <a href="#">{{ $category ?? 'Category' }}</a>
                                                </div>
                                                <h3 class="product-name">
                                                    <a href="{{ route('product-details', ['product_id' => $product['Id']]) }}">{{ $product['Title'] }}</a>
                                                </h3>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 100%"></span>
                                                        <span class="tooltiptext tooltip-top">5.0</span>
                                                    </div>
                                                    <a href="#" class="rating-reviews">(0 reviews)</a>
                                                </div>
                                                <div class="product-pa-wrapper">
                                                    <div class="product-price">৳ {{ $product['Price'] }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!--
                        <div class="toolbox toolbox-pagination justify-content-between">
                            <p class="showing-info mb-2 mb-sm-0">
                                Showing<span>1-12 of 60</span>Products
                            </p>
                            <ul class="pagination">
                                <li class="prev disabled">
                                    <a
                                        href="#"
                                        aria-label="Previous"
                                        tabindex="-1"
                                        aria-disabled="true"
                                    >
                                        <i class="w-icon-long-arrow-left"></i>Prev
                                    </a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="next">
                                    <a href="#" aria-label="Next">
                                        Next<i class="w-icon-long-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        -->
                    </div>
                    <!-- End of Shop Main Content -->

                    <!-- Start of Sidebar, Shop Sidebar -->
                    <aside
                        class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper"
                    >
                        <!-- Start of Sidebar Overlay -->
                        <div class="sidebar-overlay"></div>
                        <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                        <!-- Start of Sidebar Content -->
                        <div class="sidebar-content scrollable">
                            <div class="filter-actions">
                                <label>Filter :</label>
                                <a href="#" class="btn btn-dark btn-link filter-clean"
                                >Clean All</a
                                >
                            </div>
                            <!-- Start of Collapsible widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>All Categories</span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Babies</a></li>
                                    <li><a href="#">Beauty</a></li>
                                    <li><a href="#">Decoration</a></li>
                                    <li><a href="#">Electronics</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Food</a></li>
                                    <li><a href="#">Furniture</a></li>
                                    <li><a href="#">Kitchen</a></li>
                                    <li><a href="#">Medical</a></li>
                                    <li><a href="#">Sports</a></li>
                                    <li><a href="#">Watches</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Price</span></h3>
                                <div class="widget-body">
                                    <ul class="filter-items search-ul">
                                        <li><a href="#">$0.00 - $100.00</a></li>
                                        <li><a href="#">$100.00 - $200.00</a></li>
                                        <li><a href="#">$200.00 - $300.00</a></li>
                                        <li><a href="#">$300.00 - $500.00</a></li>
                                        <li><a href="#">$500.00+</a></li>
                                    </ul>
                                    <form class="price-range">
                                        <input
                                            type="number"
                                            name="min_price"
                                            class="min_price text-center"
                                            placeholder="$min"
                                        /><span class="delimiter">-</span
                                        ><input
                                            type="number"
                                            name="max_price"
                                            class="max_price text-center"
                                            placeholder="$max"
                                        /><a href="#" class="btn btn-primary btn-rounded">Go</a>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Size</span></h3>
                                <ul class="widget-body filter-items item-check mt-1">
                                    <li><a href="#">Extra Large</a></li>
                                    <li><a href="#">Large</a></li>
                                    <li><a href="#">Medium</a></li>
                                    <li><a href="#">Small</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Brand</span></h3>
                                <ul class="widget-body filter-items item-check mt-1">
                                    <li><a href="#">Elegant Auto Group</a></li>
                                    <li><a href="#">Green Grass</a></li>
                                    <li><a href="#">Node Js</a></li>
                                    <li><a href="#">NS8</a></li>
                                    <li><a href="#">Red</a></li>
                                    <li><a href="#">Skysuite Tech</a></li>
                                    <li><a href="#">Sterling</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Color</span></h3>
                                <ul class="widget-body filter-items item-check">
                                    <li><a href="#">Black</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Green</a></li>
                                    <li><a href="#">Grey</a></li>
                                    <li><a href="#">Orange</a></li>
                                    <li><a href="#">Yellow</a></li>
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </aside>
                    <!-- End of Shop Sidebar -->
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

