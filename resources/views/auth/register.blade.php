<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Owasp Register</title>
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
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
          <div class="row w-100">
            <div class="col-lg-4 mx-auto">
              <h2 class="text-center mb-4">Register</h2>
              <div class="auto-form-wrapper">
                <form method="POST" action="{{ url('create') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12">
                            <input placeholder="Name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary submit-btn btn-block">Register</button>
                  </div>
                  <div class="text-block text-center my-3">
                    <span class="text-small font-weight-semibold">Already have and account ?</span>
                    <a href="{{ url('login') }}" class="text-black text-small">Login</a>
                  </div> 
                </form>
              </div>
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
