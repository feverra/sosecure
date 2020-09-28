@extends('public.layout.master')
@section('content')
<!--================Blog Area =================-->
<section class="blog_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-12 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach($blogs as $blog)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" src="{{ asset(''.$blog -> photo .'')}}" alt="">
                                <a href="#" class="blog_item_date">
                                    <h3>{{ $blog -> created_at->format('d') }}</h3>
                                    <p>{{ $blog -> created_at->format('M') }}</p>
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ url('blog_detail?item_id=' . $blog->id) }}">
                                    <h2>{{ $blog -> title }}</h2>
                                </a>
                                <p>{{ \Illuminate\Support\Str::limit($blog -> detail, 150, $end='...') }}</p>
                                <ul class="blog-info-link">
                                <li><a href="#"><i class="ti-user"></i> {{ $blog -> get_user -> name }}</a></li>
                                </ul>
                        
                            </div>
                        </article>
                    @endforeach
                    {!! $blogs->render() !!}
                </div>
            </div>
        </div>
    </div>
</section>
<!--================Blog Area =================-->
@endsection