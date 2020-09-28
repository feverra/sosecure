@extends('public.layout.master')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Blog Details</h2>
                    <p>{{ $blog -> title }}</p>
                </div>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="{{ route('blog') }}">Blog </a>
                    <a href="{{ url('blog_detail?item_id=' . $blog->id) }}">Blog Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="card-img rounded-0" src="{{ asset(''.$blog -> photo .'')}}">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $blog -> title }}</h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            {{-- <li><i class="ti-user"></i> {{ $blog -> get_user -> name }}</li> --}}
                        </ul>
                        {!! $blog -> detail !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection