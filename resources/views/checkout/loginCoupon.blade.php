<div class="login-toggle">
    Returning customer?
    <a
        href="#"
        class="show-login font-weight-bold text-uppercase text-dark"
    >Login</a
    >
</div>
<form class="login-content">
    <p>
        If you have shopped with us before, please enter your details
        below. If you are a new customer, please proceed to the Billing
        section.
    </p>
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <label>Username or email *</label>
                <input
                    type="text"
                    class="form-control form-control-md"
                    name="name"
                    required
                />
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label>Password *</label>
                <input
                    type="text"
                    class="form-control form-control-md"
                    name="password"
                    required
                />
            </div>
        </div>
    </div>
    <div class="form-group checkbox">
        <input
            type="checkbox"
            class="custom-checkbox"
            id="remember"
            name="remember"
        />
        <label for="remember" class="mb-0 lh-2">Remember me</label>
        <a href="#" class="ml-3">Last your password?</a>
    </div>
    <button class="btn btn-rounded btn-login">Login</button>
</form>
<div class="coupon-toggle">
    Have a coupon?
    <a
        href="#"
        class="show-coupon font-weight-bold text-uppercase text-dark"
    >Enter your code</a
    >
</div>
<div class="coupon-content mb-4">
    <p>If you have a coupon code, please apply it below.</p>
    <div class="input-wrapper-inline">
        <input
            type="text"
            name="coupon_code"
            class="form-control form-control-md mr-1 mb-2"
            placeholder="Coupon code"
            id="coupon_code"
        />
        <button
            type="submit"
            class="btn button btn-rounded btn-coupon mb-2"
            name="apply_coupon"
            value="Apply coupon"
        >
            Apply Coupon
        </button>
    </div>
</div>
