@extends('public.layout.master')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>Product Details</h2>
                    <p>{{ $product->name }}</p>
                </div>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="{{ route('product_detail',$product->id) }}">Product Details</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <div class="row s_product_inner">
            <div class="col-lg-6">
                <div class="s_product_img">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100"
                                    src="{{ asset(''.$product->photo.'') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
                <div class="s_product_text">
                    <h3>{{ $product->name }}</h3>
                    <h2>฿{{ $product->price }}</h2>
                    <ul class="list">
                        <li>
                            <a href="#"> <span>Availibility</span> : {{ $product->in_stock }}</a>
                        </li>
                    </ul>
                    {!! $product->detail !!}
                    {{-- <div class="card_area">
                        <a class="main_btn" href="#">Add to Cart</a>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--================End Single Product Area =================-->
<section class="product_description_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="comment_list">
                    @foreach($posts as $data)
                        <div class="review_item">
                            <div class="media">
                                <div class="media-body">
                                    <h4>{{ $data -> get_user -> name }}</h4>
                                </div> 
                            </div>
                            <p>
                                {!! $data -> comment !!}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="review_box">
                    <h4>Post a comment</h4>
                    <form class="row contact_form" action="{{ url('/comment') }}" method="post" id="contactForm"
                        novalidate="novalidate">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="10"
                                    placeholder="Message" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" value="submit" class="btn submit_btn">
                               ส่ง
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection