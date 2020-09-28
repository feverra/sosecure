<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="{{ asset('public/img/favicon.png') }}" type="image/png" />
  <title>Owasp</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/vendors/linericon/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/css/themify-icons.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/css/flaticon.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/vendors/owl-carousel/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/vendors/lightbox/simpleLightbox.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/vendors/nice-select/css/nice-select.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/vendors/animate-css/animate.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/vendors/jquery-ui/jquery-ui.css') }}" />
  <!-- main css -->
  <link rel="stylesheet" href="{{ asset('public/css/style.css') }}" />
  <link rel="stylesheet" href="{{ asset('public/css/responsive.css') }}" />
</head>

<body>
  @include('public.layout.menu')

  @yield('content')
  
  <!--================ start footer Area  =================-->
  <footer class="footer-area section_gap">
    <div class="container">
      <div class="footer-bottom row align-items-center">
        <p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> SOSecure.co.th , All Right Reserved</a>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('public/js/popper.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('public/js/stellar.js') }}"></script>
  <script src="{{ asset('public/vendors/lightbox/simpleLightbox.min.js') }}"></script>
  <script src="{{ asset('public/vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('public/vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('public/vendors/isotope/isotope-min.js') }}"></script>
  <script src="{{ asset('public/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('public/js/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('public/vendors/counter-up/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('public/vendors/counter-up/jquery.counterup.js') }}"></script>
  <script src="{{ asset('public/js/mail-script.js') }}"></script>
  <script src="{{ asset('public/js/theme.js') }}"></script>

  @yield('script')
</body>

</html>