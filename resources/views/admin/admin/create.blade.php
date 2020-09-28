@extends('admin.layout.master')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Create New User</h4>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('admins.index') }}"> Back</a>
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
            <form class="form-sample" action="{{ route('admins.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('name', null, array('class' => 'form-control form-control-lg', 'required')) !!}
                </div>
                <div class="form-group">
                    <label>Email</label>
                    {!! Form::email('email', null, array('class' => 'form-control form-control-lg', 'required')) !!}
                </div>
                <div class="form-group">
                    <label>Password</label>
                    {!! Form::password('password', array("id" => "password", "class" => "form-control form-control-lg", "autocomplete" => "new-password", 'required')) !!}
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    {!! Form::password('password_confirmation', array("id" => "password-confirm", "class" => "form-control form-control-lg", "autocomplete" => "new-password", 'required')) !!}
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection