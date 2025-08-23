@extends('layouts.app')

@section('content')
<main class="main login-page">
        <!-- Start of Page Header -->
        <div class="page-header">
          <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
          </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
          <div class="container">
            <ul class="breadcrumb">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li>My account</li>
            </ul>
          </div>
        </nav>
        <!-- End of Breadcrumb -->
        <div class="page-content">
          <div class="container">
              @include('login.signIn')
          </div>
        </div>
      </main>
@endsection
