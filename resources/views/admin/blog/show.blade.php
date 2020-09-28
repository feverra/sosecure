@extends('admin.layout.master')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Show Blog</h4>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Logo</label><br/>
                <img class="card-img rounded-0" src="{{ asset(''.$blog -> photo .'')}}">
            </div>
            <div class="form-group">
                <label>Title</label>
                {!! Form::text('title', $blog -> title, array('class' => 'form-control form-control-lg', 'readonly')) !!}
            </div>
            <div class="form-group">
                <label>Detail</label>
                {!! Form::textarea('detail', $blog -> detail, array('class' => 'form-control form-control-lg', 'rows' => 20, 'readonly')) !!}
            </div>
        </div>
    </div>
</div>
@endsection