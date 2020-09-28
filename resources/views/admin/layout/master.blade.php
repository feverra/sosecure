<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Owasp</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/ionicons/css/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/typicons/src/font/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.addons.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/css/shared/style.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/demo_1/style.css') }}">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
    @yield('style')
</head>
<?php 
    $auth = json_decode(base64_decode(session()->get('login_user')), true);
?>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html">OWASP</a>
                <a class="navbar-brand brand-logo-mini" href="index.html">OW</a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                            aria-expanded="false">
                            <img class="img-xs rounded-circle" src="{{ asset('admin/images/faces/face8.jpg') }}"
                                alt="Profile image"> </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <div class="dropdown-header text-center">
                                <img class="img-md rounded-circle" src="{{ asset('admin/images/faces/face8.jpg') }}"
                                    alt="Profile image">
                                <p class="mb-1 mt-3 font-weight-semibold">{{ $auth['name'] }}</p>
                                <p class="font-weight-light text-muted mb-0">{{ $auth['email'] }}</p>
                            </div>
                            <a href="{{ url('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('admin.layout.menu')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                <footer class="footer">
                    <div class="container-fluid clearfix">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a
                                href="https://www.sosecure.co.th/" target="_blank">SOSecure.co.th</a>. All rights
                            reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                            with <i class="mdi mdi-heart text-danger"></i>
                        </span>
                    </div>
                </footer>

            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/shared/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/demo_1/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
    @yield('script')
</body>

</html>