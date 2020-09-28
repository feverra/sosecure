@extends('public.layout.master')
@section('style')
    <style>

    </style>
@endsection
@section('content')
<!--================Home Banner Area =================-->
<section class="home_banner_area mb-40">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content row">
                <div class="col-lg-12">
                    <p class="sub text-uppercase">men Collection</p>
                    <h3><span>Show</span> Your <br />Personal <span>Style</span></h3>
                    <h4>Fowl saw dry which a above together place.</h4>
                    {{-- <a class="main_btn mt-40" href="#">View Collection</a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================ Feature Product Area =================-->
<section class="feature_product_area section_gap_bottom_custom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="main_title">
                    <h2><span>สินค้า</span></h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-6">
                <div class="single-product">
                    <div class="product-img">
                        <div style="background-image: url({{ $product->photo }});width: 350px;height: 350px; background-size: cover;background-repeat: no-repeat;background-position: 50% 50%;"></div>
                        <div class="p_icon">
                            <a href="{{ url('product?item_id=' . $product->id) }}">
                                <i class="ti-eye"></i>
                            </a>
                            {{-- <a href="#">
                                <i class="ti-heart"></i>
                            </a>
                            <a href="#">
                                <i class="ti-shopping-cart"></i>
                            </a> --}}
                        </div>
                    </div>
                    <div class="product-btm">
                        <a href="#" class="d-block">
                            <h4>{{ $product->name }}</h4>
                        </a>
                        <div class="mt-3">
                            <span class="mr-4">฿{{ $product->price }}</span>
                            {{-- <del>$35.00</del> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex">
            <div class="mx-auto">
            {!! $products->render() !!}        
            </div>
        </div>
    </div>
</section>
<!--================ End Feature Product Area =================-->
@endsection