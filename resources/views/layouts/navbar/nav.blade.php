<nav class="main-nav">
    <ul class=" menu active-underline">
        <li @class(['active' => request()->routeIs('home')])>
            <a href="{{ route('home') }}">Home</a>
        </li>
        <li @class(['active' => request()->routeIs('shop-banner-sidebar')])>
            <a href="{{ route('shop-banner-sidebar') }}">Shop</a>
        </li>
        <li @class(['active' => request()->routeIs('about-us')])>
            <a href="{{ route('about-us') }}">About Us</a>
        </li>
        <li @class(['active' => request()->routeIs('contact-us')])>
            <a href="{{ route('contact-us') }}">Contact Us</a>
        </li>
        <li @class(['active' => request()->routeIs('faq')])>
            <a href="{{ route('faq') }}">FAQ's</a>
        </li>

{{--        <li @class(['active' => request()->routeIs('my-account')])>--}}
{{--            <a href="{{ route('my-account') }}">My Account</a>--}}
{{--        </li>--}}
    </ul>
</nav>
