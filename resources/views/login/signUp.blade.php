<form action="{{ route('register.submit') }}" method="POST">
    @csrf

    <div class="form-group">
        <label>Full Name *</label>
        <input type="text" class="form-control" name="name" required>
    </div>

    <div class="form-group">
        <label>Mobile Number *</label>
        <input type="text" class="form-control" name="mobile" required>
    </div>

    <div class="form-group">
        <label>Email *</label>
        <input type="email" class="form-control" name="email" required>
    </div>

    <div class="form-group">
        <label>NID *</label>
        <input type="text" class="form-control" name="nid" required>
    </div>

    <div class="form-group">
        <label>Gender *</label>
        <select name="gender" class="form-control" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>

    <div class="form-group">
        <label>Country *</label>
        <input type="text" class="form-control" name="country" value="Bangladesh" required>
    </div>

    <div class="form-group">
        <label>Password *</label>
        <input type="password" class="form-control" name="first_password" required>
    </div>

    <div class="form-group">
        <label>Confirm Password *</label>
        <input type="password" class="form-control" name="re_password" required>
    </div>

    <div class="form-group">
        <label>Referral ID (Optional)</label>
        <input type="text" class="form-control" name="referral_id">
    </div>

    {{-- Hidden inputs for required default values --}}
    <input type="hidden" name="user_name" value="">
    <input type="hidden" name="password" value="0">
    <input type="hidden" name="agent" value="0">
    <input type="hidden" name="type" value="0">
    <input type="hidden" name="category" value="0">
    <input type="hidden" name="division" value="0">
    <input type="hidden" name="distict" value="0">
    <input type="hidden" name="thana" value="0">
    <input type="hidden" name="product" value="0">
    <input type="hidden" name="placement_id" value="0">
    <input type="hidden" name="placement_hand" value="0">
    <input type="hidden" name="euser" value="0">
    <input type="hidden" name="user" value="">

    <div class="form-group">
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </div>
</form>

<div class="form-footer text-center mt-4">
    <p>
        Already have an account?
        <a href="{{ route('login') }}" class="text-primary font-weight-bold">
            Login
        </a>
    </p>
</div>

<script>
    // Mobile number auto-fill for user_name and user field
    document.querySelector('input[name="mobile"]').addEventListener('input', function () {
        document.querySelector('input[name="user_name"]').value = this.value;
        document.querySelector('input[name="user"]').value = this.value;
    });
</script>
