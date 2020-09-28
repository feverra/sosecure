@extends('admin.layout.master')
@section('style')
    <style>
        a {
            margin: 0;
            padding: 0;
            color: #fff;
            text-decoration: none;
            text-align: center;
            -webkit-transition: 0.2s ease all;
            -moz-transition: 0.2s ease all;
            -ms-transition: 0.2s ease all;
            -o-transition: 0.2s ease all;
            transition: 0.2s ease all;
        }

        a:hover {
            color: #ADADAD;
        }

        a:active {
            position: relative;
            top: 1px;
        }

        label #choose_file {
            margin: 0;
            padding: 10px;
            width: auto;
            max-width: 300px;
            height: auto;
            background-color: #929292;
            border: none;
            color: #fff;
            cursor: pointer;
            text-align: center;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -webkit-transition: 0.2s ease all;
            -moz-transition: 0.2s ease all;
            -ms-transition: 0.2s ease all;
            -o-transition: 0.2s ease all;
            transition: 0.2s ease all;
        }

        label #choose_file : hover {
            background: #ADADAD;
        }

        [type=file] {
            display: none;
        }

        #info {
            display: none;
            margin: 5% auto;
            padding: 10px 20px;
            width: 400px;
            height: auto;
            overflow: hidden;
            background: #FFFFFF;
            border-radius: 3px;
        }

        #size span,
        #type span,
        #name span {
            color: #EA4026;
        }

        #copyrights {
            margin: 5% auto;
            padding: 0;
            width: 250px;
            height: auto;
            overflow: hidden;
        }
    </style>
@endsection
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Edit New product</h4>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            @if (count($errors) > 0)
            <div class="alert alert-danger" style="margin-top: 10px;">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form class="form-sample" action="{{ route('products.update', encrypt_decrypt('encrypt',$product->id)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Logo</label><br/>
                    <label id="choose_file" for="file" class="btn btn-info btn-fw"><i class="mdi mdi-upload"></i> Choose File</label>
                    <input type="file" name="file" id="file" accept="image/png, image/jpeg" />
                    <img class="card-img rounded-0" id="show_photo" src="{{ asset(''.$product -> photo .'')}}">
                </div>
                <div id="info">
                    <p><img id="blah" src="#"/></p>
                    <p id="name">File Name: <span></span></p>
                    <p id="size">File Size: <span></span></p>
                    <p id="type">File Type: <span></span></p>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('name',  $product -> name, array('class' => 'form-control form-control-lg', 'required')) !!}
                </div>
                <div class="form-group">
                    <label>Detail</label>
                    {!! Form::textarea('detail',  $product -> detail, array('class' => 'form-control form-control-lg', 'rows' => 20, 'required')) !!}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Price</label>
                            {!! Form::number('price',  $product -> price, array('class' => 'form-control form-control-lg', 'required')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>In Stock</label>
                            {!! Form::number('in_stock',  $product -> in_stock, array('class' => 'form-control form-control-lg', 'required')) !!}
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $(function () {
            $("[type=file]").on("change", function () {
                var file = this.files[0];
                var formdata = new FormData();
                formdata.append("file", file);
                $('#info').slideDown();
                if (file.name.length >= 30) {
                    $('#name span').empty().append(file.name.substr(0, 30) + '..');
                } else {
                    $('#name span').empty().append(file.name);
                }
                if (file.size >= 1073741824) {
                    $('#size span').empty().append(Math.round(file.size / 1073741824) + "GB");
                } else if (file.size >= 1048576) {
                    $('#size span').empty().append(Math.round(file.size / 1048576) + "MB");
                } else if (file.size >= 1024) {
                    $('#size span').empty().append(Math.round(file.size / 1024) + "KB");
                } else {
                    $('#size span').empty().append(Math.round(file.size) + "B");
                }
                $('#type span').empty().append(file.type);
                $('#show_photo').hide();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(350)
                        // .height(300)
                };
                reader.readAsDataURL(file);

                var ext = $('#file').val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['php', 'html']) !== -1) {
                    $('#info').hide();
                    $('#choose_file').text('Choose File');
                    $('#file').val('');
                    alert('This file extension is not allowed!');
                }
            });
        }); 
    </script>
@endsection