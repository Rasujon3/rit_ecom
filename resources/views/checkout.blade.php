@extends('layouts.app')

@section('content')
<main class="main checkout">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
          <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
              <li class="passed"><a href="{{ route('cart') }}">Shopping Cart</a></li>
              <li class="active"><a href="{{ route('checkout') }}">Checkout</a></li>
              <li><a href="{{ route('order') }}">Order Complete</a></li>
            </ul>
          </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content">
          <div class="container">
{{--            @include('checkout.loginCoupon')--}}
            @include('checkout.checkoutForm')
          </div>
        </div>
        <!-- End of PageContent -->
      </main>
@endsection
