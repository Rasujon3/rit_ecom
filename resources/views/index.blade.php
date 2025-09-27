@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Start of Intro Wrapper (Slider) -->
    @include('home.slider', ['slides' => $slides])
    <!-- End of Intro Wrapper (Slider) -->

    <!-- Start of Iocn Box Wrapper -->
{{--    @include('home.iconBox')--}}
{{--    @include('home.iconBox2')--}}
    <!-- End of Iocn Box Wrapper -->

    <!-- End of Category Wrapper (brands) -->
    @include('home.brands')
    <!-- End of Category Wrapper (brands) -->

    <!-- End of Deals Wrapper (hotDeals) -->
{{--    @include('home.hotDeals')--}}
    <!-- End of Deals Wrapper (hotDeals) -->

    <!-- Start Banner Product Wrapper -->
    @include('home.productBanner', ['arrivalProducts' => $arrivalProducts])
    <!-- End Banner Product Wrapper -->

    <!-- Start of Category Accessories -->
{{--    @include('home.categoryAccessories')--}}
    <!-- End of Category Accessories -->

    <!-- Start Banner Product Wrapper 2 -->
    @include('home.productBanner2', ['featuredProducts' => $featuredProducts])
    <!-- End Banner Product Wrapper 2 -->

    <!-- Start of Tab Content (popularCategories) -->
{{--    @include('home.popularCategories')--}}
    <!-- End of Tab Content (popularCategories) -->

    <!--Start of Blogs -->
{{--    @include('home.blogs')--}}
    <!--End of Blogs -->
</div>
<!-- End of Main -->
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

        $('.add-to-cart').one('click', function (e) {
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
                            toastr.success('✔️ ' + 'Added to cart!');
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
