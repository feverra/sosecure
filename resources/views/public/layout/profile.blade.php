@extends('public.layout.master')
@section('content')
<!--================Home Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content d-md-flex justify-content-between align-items-center">
                <div class="mb-3 mb-md-0">
                    <h2>User Profile</h2>
                </div>
                <div class="page_link">
                    <a href="/">Home</a>
                    <a href="#">User Profile </a>
                </div>
            </div>
            
        </div>
    </div>
</section>
<section class="section_gap">
<?php 
    $auth = json_decode(base64_decode(session()->get('login_user')), true);
?>
<div class="banner_inner d-flex align-items-center">
   <div class="container">
        {{--  <div class="banner_content d-md-flex justify-content-between align-items-center">
            <div class="row"> --}}
                <div class="text-center">
                    <div class="pull-center">
                        <img src="{{ asset('public/img/product/single-product/review-2.png') }}" alt="">
                    </div>
                    <br>
                    <div class="media-body">
                        <h4 id="name"></h4>
                        <h4 id="email"></h4>
                    </div>
                </div>
            {{-- </div>
        </div>--}}
    </div> 
</div>
</section>
<input type="hidden" id="hd_user_id" value="{{ $auth->id }}">
<!--================End Home Banner Area =================-->
@endsection
@section('script')
    <script>
        var user_id = $('#hd_user_id').val();
        $(function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'get',
                dataType: "json",
                contentType:"application/json; charset=utf8",
                url: '/get_profile?user_id=' + user_id,
                success: function(result) {
                    $('#name').html(result.data.name);
                    $('#email').html(result.data.email);
                },
                error: function (data) {
                    var errors = data.responseJSON;
                    console.log(errors);
                }
            });
        })
    </script>
@endsection