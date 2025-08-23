@extends('layouts.app')

@section('content')
<main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
          <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
              <li class="active"><a href="{{ route('cart') }}">Shopping Cart</a></li>
              <li><a href="{{ route('checkout') }}">Checkout</a></li>
              <li><a href="{{ route('order') }}">Order Complete</a></li>
            </ul>
          </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
          <div class="container">
            <div class="row gutter-lg mb-10">
              <div class="col-lg-8 pr-lg-4 mb-6">
                <table class="shop-table cart-table">
                  <thead>
                    <tr>
                      <th class="product-name"><span>Product</span></th>
                      <th></th>
                      <th class="product-price"><span>Price</span></th>
                      <th class="product-quantity"><span>Quantity</span></th>
                      <th class="product-subtotal"><span>Subtotal</span></th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($cart as $item)
                    <tr>
                      <td class="product-thumbnail">
                        <div class="p-relative">
                          <a href="{{ route('product-details', ['product_id' => $item['id']]) }}">
                            <figure>
                              <img
                                src="{{ $item['image'] }}"
                                alt="{{ $item['title'] }}"
                                width="300"
                                height="338"
                              />
                            </figure>
                          </a>
                          <button class="btn btn-close remove-cart" data-id="{{ $item['id'] }}">
                            <i class="fas fa-times"></i>
                          </button>
                        </div>
                      </td>
                      <td class="product-name">
                        <a href="{{ route('product-details', ['product_id' => $item['id']]) }}">
                            {{ $item['title'] }}
                        </a>
                      </td>
                      <td class="product-price">
                        <span class="amount">৳ {{ $item['price'] }}</span>
                      </td>
                      <td class="product-quantity">
                          <span class="amount">X 1</span>
                      </td>
                      <td class="product-subtotal">
                        <span class="amount">৳ {{ $item['price'] }}</span>
                      </td>
                    </tr>
                  @empty
                      <tr>
                          <td colspan="5" class="text-center">Your cart is empty.</td>
                      </tr>
                  @endforelse
                  </tbody>
                </table>

{{--                @include('partials.cartAction')--}}

                <form class="coupon">
                  <h5
                    class="title coupon-title font-weight-bold text-uppercase"
                  >
                    Coupon Discount
                  </h5>
                  <input
                    type="text"
                    class="form-control mb-4"
                    placeholder="Enter coupon code here..."
                    required
                  />
                  <button class="btn btn-dark btn-outline btn-rounded">
                    Apply Coupon
                  </button>
                </form>
              </div>
              <div class="col-lg-4 sticky-sidebar-wrapper">
                <div class="sticky-sidebar">
                  <div class="cart-summary mb-4">
                    <h3 class="cart-title text-uppercase">Cart Totals</h3>
                    <div
                      class="cart-subtotal d-flex align-items-center justify-content-between"
                    >
                      <label class="ls-25">Subtotal</label>
                      <span>৳ {{ $cartSubtotal }}</span>
                    </div>

                    <hr class="divider" />

{{--                    @include('cart.shipping')--}}

                    <hr class="divider mb-6" />
                    <div
                      class="order-total d-flex justify-content-between align-items-center"
                    >
                      <label>Total</label>
                      <span class="ls-50">৳ {{ $cartSubtotal }}</span>
                    </div>
                    <a
                      href="{{ route('checkout') }}"
                      class="btn btn-block btn-dark btn-icon-right btn-rounded btn-checkout"
                    >
                      Proceed to checkout<i class="w-icon-long-arrow-right"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End of PageContent -->
      </main>
@endsection

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
                console.error("Failed to update cart.");
            }
        });
    }

    // Handle removal
    $(document).on('click', '.remove-cart', function () {
        const id = $(this).data('id');

        $.ajax({
            url: '/cart/remove/' + id,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function () {
                updateCartDropdown();
                window.location.reload();
            },
            error: function () {
                alert('Could not remove item.');
            }
        });
    });
</script>
