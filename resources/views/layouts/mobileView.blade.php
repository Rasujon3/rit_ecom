<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input
                type="text"
                class="form-control"
                name="search"
                autocomplete="off"
                placeholder="Search"
                required
            />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('shopFullwidthBanner') }}">Shop</a></li>
                    <li><a href="{{ route('about-us') }}">About Us</a></li>
                    <li><a href="{{ route('contact-us') }}">Contact Us</a></li>
                    <li><a href="{{ route('faq') }}">FAQ's</a></li>
                    <li><a href="https://ritglobal.org/">Login</a></li>
                    @if(Session::has('user_id'))
                        <li><a href="{{ route('logout') }}">Logout</a></li>
                    @endif
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @if(count($categories) > 0)
                        @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('shopFullwidthBanner', ['category' => ($cat['Category'])]) }}">
                                    <img src="{{ config('api.url') . $cat['Image'] }}" alt="{{ $cat['Category'] }}" width="20" class="mr-2" style="object-fit: contain;">
                                    {{ $cat['Category'] }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
