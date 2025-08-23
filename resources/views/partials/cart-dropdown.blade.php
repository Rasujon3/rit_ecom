@php
    $cartItems = session('cart', []);
    $cartCount = count($cartItems);
    $cartSubtotal = array_sum(array_column($cartItems, 'price'));
@endphp

<div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
    <div class="cart-overlay"></div>
    <a href="#" class="cart-toggle label-down link">
        <i class="w-icon-cart">
            <span class="cart-count" id="cart-count">{{ $cartCount }}</span>
        </i>
        <span class="cart-label">Cart</span>
    </a>
    <div class="dropdown-box" id="cart-dropdown-box">
        <div class="cart-header">
            <span>Shopping Cart</span>
            <a href="#" class="btn-close">Close <i class="w-icon-long-arrow-right"></i></a>
        </div>

        <div class="products" id="cart-items-list">
            @forelse($cartItems as $item)
                <div class="product product-cart">
                    <div class="product-detail">
                        <a href="{{ route('product-details', ['product_id' => $item['id']]) }}" class="product-name">{{ $item['title'] }}</a>
                        <div class="price-box">
                            <span class="product-quantity">1</span>
                            <span class="product-price">৳{{ $item['price'] }}</span>
                        </div>
                    </div>
                    <figure class="product-media">
                        <a href="{{ route('product-details', ['product_id' => $item['id']]) }}">
                            <img src="{{ $item['image'] }}" alt="product" height="84" width="94">
                        </a>
                    </figure>
                    <button class="btn btn-link btn-close remove-cart" data-id="{{ $item['id'] }}">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            @empty
                <p class="text-center p-3">Cart is empty.</p>
            @endforelse
        </div>

        <div class="cart-total">
            <label>Subtotal:</label>
            <span class="price" id="cart-subtotal">৳{{ $cartSubtotal }}</span>
        </div>

        <div class="cart-action">
            <a href="{{ route('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
            <a href="{{ route('checkout') }}" class="btn btn-primary btn-rounded">Checkout</a>
        </div>
    </div>
</div>
