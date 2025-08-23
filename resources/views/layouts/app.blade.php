
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, minimum-scale=1.0"
    />

    <title>{{ session('about_us.institute_name') ?? 'RIT e-commerce' }}</title>

    <meta
      name="keywords"
      content="{{ session('about_us.institute_name') ?? 'RIT Ecommerce' }}"
    />
    <meta
      name="description"
      content="{{ session('about_us.institute_name') ?? 'RIT Ecommerce' }} is Bangladesh top leading ecommerce business"
    />
    <meta name="author" content="D-THEMES" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/icons/favicon.png') }}" />

    <!-- WebFont.js -->
    <script>
      WebFontConfig = {
        google: { families: ["Poppins:400,600,500,700,800", "Zeyada: 400"] },
      };
      (function (d) {
        var wf = d.createElement("script"),
          s = d.scripts[0];
        wf.src = "{{ asset('assets/js/webfont.js') }}";
        wf.async = true;
        s.parentNode.insertBefore(wf, s);
      })(document);
    </script>

    <link
      rel="preload"
      href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2') }}"
      as="font"
      type="font/woff2"
      crossorigin="anonymous"
    />
    <link
      rel="preload"
      href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2') }}"
      as="font"
      type="font/woff2"
      crossorigin="anonymous"
    />
    <link
      rel="preload"
      href="{{ asset('assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2') }}"
      as="font"
      type="font/woff2"
      crossorigin="anonymous"
    />
    <link
      rel="preload"
      href="{{ asset('assets/fonts/wolmart87d5.woff?png09e') }}"
      as="font"
      type="font/woff"
      crossorigin="anonymous"
    />

    <!-- Vendor CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}"
    />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/vendor/animate/animate.min.css') }}"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="{{ asset('assets/vendor/magnific-popup/magnific-popup.min.css') }}"
    />

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/demo3.min.css') }}" />
      <style>
          .alert {
              padding: 15px 20px;
              margin: 10px 20px;
              border-radius: 5px;
              position: relative;
              font-size: 16px;
              line-height: 1.4;
              color: #fff;
              text-align: center;
          }

          .alert-success {
              background-color: #28a745;
          }

          .alert-error {
              background-color: #dc3545;
          }

          .close-btn {
              position: absolute;
              right: 15px;
              top: 50%;
              transform: translateY(-50%);
              cursor: pointer;
              font-size: 22px;
              font-weight: bold;
              color: #fff;
          }

          .close-btn:hover {
              color: #000;
          }
      </style>
  </head>

  <body class="home">
    <div class="page-wrapper">
      <h1 class="d-none">{{ session('about_us.institute_name') ?? 'RIT Ecommerce' }}</h1>
      <!-- Start of Header -->
      @include('layouts.header')
      <!-- End of Header -->

      <main class="main">
        @include('layouts.sessionFlushMessage')
        @yield('content')
      </main>

      <!-- Start of Footer -->
        @include('layouts.footer')
      <!-- End of Footer -->
    </div>
    <!-- End of Page-wrapper -->

    <!-- Start of Sticky Footer -->
    @include('layouts.stickyFooter')
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    @include('layouts.scrollTop')
    <!-- End of Scroll Top -->

    <!-- Start of Mobile Menu -->
    @include('layouts.mobileView')
    <!-- End of Mobile Menu -->

    <!-- Start of Newsletter popup -->
    @include('layouts.newsletterPopup')
    <!-- End of Newsletter popup -->

    <!-- Start of Quick View -->
    @include('layouts.quickView')
    <!-- End of Quick view -->

    <!-- Plugin JS File -->
    <script
      data-cfasync="false"
      src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
    ></script>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/zoom/jquery.zoom.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>

    <!-- Main Js -->
    <script src="{{ asset('assets/js/main.min.js') }}"></script>
  </body>
</html>
