<form class="form checkout-form" action="{{ route('checkout.submit') }}" method="post">
    <div class="row mb-9">
        <div class="col-lg-7 pr-lg-4 mb-4">
            <h3
                class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0"
            >
                Billing Details
            </h3>
            @csrf
            <!-- Billing Details -->
            <input type="hidden" name="user_id" value="{{ session('user_id') }}">
            <input type="hidden" name="unique_id" value="{{ uniqid() }}">
            <input type="hidden" name="device_id" value="{{ request()->ip() }}">
            <input type="hidden" name="type" value="web">

            <div class="form-group">
                <label>Name *</label>
                <input type="text" class="form-control" name="name" required />
            </div>
            <div class="form-group">
                <label>Mobile *</label>
                <input type="text" class="form-control" name="mobile" required />
            </div>
            <div class="form-group">
                <label>Address *</label>
                <textarea class="form-control" name="address" required></textarea>
            </div>
            <div class="form-group">
                <label>Shipping Cost *</label>
                <input type="number" class="form-control" name="ship_cost" value="0" required />
            </div>
            <div class="form-group">
                <label>Payment Method *</label>
                <select class="form-control" name="payment_method" required>
                    <option value="Cash on Delivery">Cash on Delivery</option>
                    <option value="Online Payment">Online Payment</option>
                </select>
            </div>
            <div class="form-group">
                <label>Transaction ID (if any)</label>
                <input type="text" class="form-control" name="trans_id" />
            </div>
        </div>
        @include('checkout.placeOrder')
    </div>
</form>

