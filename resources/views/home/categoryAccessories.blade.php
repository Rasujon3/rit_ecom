<div class="row category-accessories appear-animate mb-7">
    <div class="col-md-6 mb-4">
        <figure class="banner banner-fixed br-sm">
            <img
{{--                src="assets/images/demos/demo3/categories/10.jpg"--}}
                src="{{ asset('assets/images/demos/demo3/categories/10.jpg') }}"
                alt="Category Banner"
                width="610"
                height="200"
                style="background-color: #52575b"
            />
            <div class="banner-content y-50">
                <h5
                    class="banner-subtitle font-weight-bold text-primary text-uppercase ls-25"
                >
                    Top Selling
                </h5>
                <h3
                    class="banner-title text-white text-capitalize font-weight-bold"
                >
                    XBox Gaming<br />Accessories
                </h3>
                <a
                    href="{{ route('shopFullwidthBanner', ['category' => 'Accessories']) }}"
                    class="btn btn-white btn-link btn-underline btn-icon-right"
                >
                    Shop Now<i class="w-icon-long-arrow-right"></i>
                </a>
            </div>
        </figure>
    </div>
    <div class="col-md-6 mb-4">
        <figure class="banner banner-fixed br-sm">
            <img
{{--                src="assets/images/demos/demo3/categories/11.jpg"--}}
                src="{{ asset('assets/images/demos/demo3/categories/11.jpg') }}"
                alt="Category Banner"
                width="610"
                height="200"
                style="background-color: #f0f0f0"
            />
            <div class="banner-content y-50">
                <h5
                    class="banner-subtitle font-weight-bold text-primary text-uppercase ls-25"
                >
                    Season Sale
                </h5>
                <h3 class="banner-title text-capitalize ls-15">
                    Fashion Figure<br />Skate Sale
                </h3>
                <a
                    href="{{ route('shopFullwidthBanner', ['category' => 'Mens Products']) }}"
                    class="btn btn-dark btn-link btn-underline btn-icon-right"
                >
                    Shop Now<i class="w-icon-long-arrow-right"></i>
                </a>
            </div>
        </figure>
    </div>
</div>
