<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">
                    Welcome to {{ session('about_us.institute_name') ?? 'RIT Ecommerce' }}
                </p>
            </div>
            <div class="header-right">
                <!-- End of DropDown Menu -->

                <!-- End of Dropdown Menu -->

                <a href="{{ route('contact-us') }}" class="d-lg-show">Contact Us</a>
                @if(Session::has('user_id'))
                    <a
                        href="#"
                        class="d-lg-show"
                    ><i class="w-icon-account"></i>{{ Session::get('name') ?? '' }}</a
                    >
                    <span class="delimiter d-lg-show">/</span>
                    <a
                        href="{{ route('logout') }}"
                        class="ml-0 d-lg-show"
                    >Logout</a
                    >
                @else
                    <a
                        href="{{ route('login') }}"
                        class="d-lg-show"
                    ><i class="w-icon-account"></i>Sign In</a>
                @endif
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a
                    href="#"
                    class="mobile-menu-toggle w-icon-hamburger"
                    aria-label="menu-toggle"
                >
                </a>
                <a href="{{ route('home') }}" class="logo ml-lg-0">
                    <img
                        src="{{ asset('assets/images/demos/demo3/RIT2.png') }}"
                        alt="logo"
                        width="144"
                        height="45"
                    />
                </a>
                <form
                    method="GET"
                    action="{{ route('search.products') }}"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper"
                >
{{--                    <div class="select-box">--}}
{{--                        <select id="category" name="category" class="pb-0">--}}
{{--                            <option value="">All Categories</option>--}}
{{--                            <option value="4">Fashion</option>--}}
{{--                            <option value="5">Furniture</option>--}}
{{--                            <option value="6">Shoes</option>--}}
{{--                            <option value="7">Sports</option>--}}
{{--                            <option value="8">Games</option>--}}
{{--                            <option value="9">Computers</option>--}}
{{--                            <option value="10">Electronics</option>--}}
{{--                            <option value="11">Kitchen</option>--}}
{{--                            <option value="12">Clothing</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <input
                        type="text"
                        class="form-control search_input"
                        name="search"
                        id="search"
                        placeholder="Search in..."
                        required
                    />
                    <button class="btn btn-search" type="submit">
                        <i class="w-icon-search"></i>
                    </button>
                </form>

            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4
                            class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0"
                        >
                            <a
                                href="https://portotheme.com/cdn-cgi/l/email-protection#aa89"
                                class="text-capitalize"
                            >Call Us Now</a
                            >
                            :
                        </h4>
                        <a href="tel:{{ session('about_us.institute_phone') ?? '+1 800 57 07777' }}" class="phone-number font-weight-bolder ls-50"
                        >{{ session('about_us.institute_phone') ?? '+1 800 57 07777' }}</a
                        >
                    </div>
                </div>
                <a
                    class="wishlist label-down link d-xs-show"
                    href="{{ route('wishlist') }}"
                >
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                @include('partials.cart-dropdown')
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div
        class="header-bottom sticky-content fix-top sticky-header has-dropdown"
    >
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    @include('layouts.navbar.browseCategories', ['categories' => $categories])
                    @include('layouts.navbar.nav')
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .search_input {
        border-top: 2px solid #fe7c00 !important;
        border-left: 2px solid #fe7c00 !important;
        border-bottom: 2px solid #fe7c00 !important;
    }
</style>

<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

<script>
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

    // After successfully adding to cart
    $(document).on('click', '.btn-cart', function (e) {
        e.preventDefault();

        const product = $(this).data(); // expects data attributes on the button
        const btn = $(this);

        try {
            $.ajax({
                url: "{{ route('cart.add') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: product.id,
                    title: product.title,
                    image: product.image,
                    price: product.price,
                    point: product.point
                },
                success: function (res) {
                    if (res.status) {
                        updateCartDropdown();
                        // alert('Added to cart!');
                        toastr.success('Added to cart!');
                    } else {
                        // alert(res.message);
                        toastr.error('⚠️ ' + res.message);
                    }
                },
                error: function () {
                    // alert('Failed to add product to cart.');
                    toastr.error('Failed to add product to cart.');
                }
            });
        } catch (error) {
            // alert('Something went wrong!!!');
            toastr.error('Something went wrong!!!');
        }
    });

    // Handle removal
    $(document).on('click', '.remove-cart', function () {
        const id = $(this).data('id');

        try {
            $.ajax({
                url: '/cart/remove/' + id,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                    updateCartDropdown();
                    toastr.success('Removed to cart!');
                },
                error: function () {
                    // alert('Could not remove item.');
                    toastr.error('Could not remove item.');
                }
            });
        } catch (error) {
            // alert('Something went wrong!!!');
            toastr.error('Something went wrong!!!');
        }
    });
</script>

