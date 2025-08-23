<div class="login-form">
    <h3 class="form-title">Sign In</h3>

    <form method="POST" action="{{ route('login.submit') }}">
        @csrf

        <div class="form-group">
            <label>Username or mobile number *</label>
            <input
                type="text"
                class="form-control"
                name="user_name"
                id="user_name"
                value="{{ old('user_name') }}"
                required
            />
            @error('user_name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-0">
            <label>Password *</label>
            <input
                type="password"
                class="form-control"
                name="password"
                id="password"
                required
            />
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-checkbox d-flex align-items-center justify-content-between">
            <div>
                <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
            </div>
            <a href="#">Lost your password?</a>
        </div>

        <button type="submit" class="btn btn-primary">Sign In</button>
    </form>

    <div class="form-footer text-center mt-4">
        <p>
            Don't have an account?
            <a href="{{ route('register') }}" class="text-primary font-weight-bold">
                Register
            </a>
        </p>
    </div>
</div>
