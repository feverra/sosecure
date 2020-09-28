@extends('admin.layout.master')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Show product</h4>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Logo</label><br/>
                <img class="card-img rounded-0" id="show_photo" src="{{ asset(''.$product -> photo .'')}}">
            </div>
            <div class="form-group">
                <label>Name</label>
                {!! Form::text('name',  $product -> name, array('class' => 'form-control form-control-lg', 'readonly')) !!}
            </div>
            <div class="form-group">
                <label>Detail</label>
                {!! Form::textarea('detail',  $product -> detail, array('class' => 'form-control form-control-lg', 'rows' => 20, 'readonly')) !!}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price</label>
                        {!! Form::number('price',  $product -> price, array('class' => 'form-control form-control-lg', 'readonly')) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>In Stock</label>
                        {!! Form::number('in_stock',  $product -> in_stock, array('class' => 'form-control form-control-lg', 'readonly')) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection