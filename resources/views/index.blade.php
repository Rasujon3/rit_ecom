@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Start of Intro Wrapper (Slider) -->
    @include('home.slider', ['slides' => $slides])
    <!-- End of Intro Wrapper (Slider) -->

    <!-- Start of Iocn Box Wrapper -->
    @include('home.iconBox')
    <!-- End of Iocn Box Wrapper -->

    <!-- End of Category Wrapper (brands) -->
    @include('home.brands')
    <!-- End of Category Wrapper (brands) -->

    <!-- End of Deals Wrapper (hotDeals) -->
{{--    @include('home.hotDeals')--}}
    <!-- End of Deals Wrapper (hotDeals) -->

    <!-- Start Banner Product Wrapper -->
    @include('home.productBanner', ['arrivalProducts' => $arrivalProducts])
    <!-- End Banner Product Wrapper -->

    <!-- Start of Category Accessories -->
    @include('home.categoryAccessories')
    <!-- End of Category Accessories -->

    <!-- Start Banner Product Wrapper 2 -->
    @include('home.productBanner2', ['featuredProducts' => $featuredProducts])
    <!-- End Banner Product Wrapper 2 -->

    <!-- Start of Tab Content (popularCategories) -->
{{--    @include('home.popularCategories')--}}
    <!-- End of Tab Content (popularCategories) -->

    <!--Start of Blogs -->
{{--    @include('home.blogs')--}}
    <!--End of Blogs -->
</div>
<!-- End of Main -->
@endsection
