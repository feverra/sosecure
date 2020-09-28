<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Oward Login</title>
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
    <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auto-form-wrapper">
                            <form method="POST" action="{{ url('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email" class="label">Email</label>
                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if($errors->any()) 
                                    <p class="text-center" style="color: red;">{{$errors->first()}}</p>
                                @endif
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary submit-btn btn-block">Login</button>
                                </div>
                                <div class="form-group d-flex justify-content-between">
                                    <div class="form-check form-check-flat mt-0">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }} </label>
                                    </div>
                                    {{-- <a href="#" class="text-small forgot-password text-black">Forgot Password</a> --}}
                                  </div>
                            </form>
                        </div>
                        <ul class="auth-footer"></ul>
                        <p class="footer-text text-center">copyright © 2020 SOSecure.co.th , All Right Reserved</p>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('admin/vendors/js/vendor.bundle.addons.js') }}"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="{{ asset('admin/js/shared/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/js/shared/misc.js') }}"></script>
    <!-- endinject -->
</body>

</html>

