<!--================Header Menu Area =================-->
<?php 
     $auth = json_decode(base64_decode(session()->get('login_user')), true);
?>
<header class="header_area">
    <div class="main_menu">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light w-100">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/">
                    <img src="{{ asset('public/img/logo.png') }}" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                    <div class="row w-100 mr-0">
                        <div class="col-lg-7 pr-0">
                            <ul class="nav navbar-nav center_nav pull-left">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{  route('blog') }}">Blog</a>
                                </li>  
                            </ul>
                        </div>
                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">
                                @if(!session()->has('login_user'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    {{-- @if (Route::has('register')) --}}
                                    <li class="nav-item" style="padding-left: 30px;">
                                        <a class="nav-link" href="{{ url('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    {{-- @endif --}}
                                @else
                                <li class="nav-item dropdown" style="padding-left: 30px;">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ $auth['name'] }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if($auth['type'] === 1)
                                            <a class="dropdown-item" href="{{ url('/admin/dashboard') }}">Admin Dashboard</a> 
                                        @endif
                                        <a class="dropdown-item" href="{{ url('/profile') }}">profile</a> 
                                        <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ url('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--================Header Menu Area =================-->