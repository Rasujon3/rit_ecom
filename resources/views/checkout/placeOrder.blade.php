<div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
    <div class="order-summary-wrapper sticky-sidebar">
        <h3 class="title text-uppercase ls-10">Your Order</h3>
        <div class="order-summary">
            <table class="order-table">
                <thead>
                <tr>
                    <th colspan="2">
                        <b>Product</b>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $item)
                    <tr class="bb-no">
                    <td class="product-name">
                        {{ $item['title'] }} <i class="fas fa-times"></i>
                        <span class="product-quantity">1</span>
                    </td>
                    <td class="product-total">৳ {{ $item['price'] }}</td>
                </tr>
                @endforeach
                <tr class="cart-subtotal bb-no">
                    <td>
                        <b>Subtotal</b>
                    </td>
                    <td>
                        <b>৳ {{ $cartSubtotal }}</b>
                    </td>
                </tr>
                </tbody>
{{--                @include('checkout.shippingMethod')--}}
            </table>

{{--            @include('checkout.paymentMethod')--}}

            <div class="form-group place-order pt-6">
                <button
                    type="submit"
                    class="btn btn-dark btn-block btn-rounded"
                >
                    Place Order
                </button>
            </div>
        </div>
    </div>
</div>
