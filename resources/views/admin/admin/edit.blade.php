@extends('admin.layout.master')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Edit User</h4>
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
            <form class="form-sample" action="{{ route('admins.update', encrypt_decrypt('encrypt',$user->id)) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('name', $user->name, array('class' => 'form-control form-control-lg', 'required')) !!}
                </div>
                <div class="form-group">
                    <label>Email</label>
                    {!! Form::email('', $user->email, array('class' => 'form-control form-control-lg', 'readonly')) !!}
                </div>
                <div class="form-group">
                    <label>Password</label>
                    {!! Form::password('password', array("id" => "password", "class" => "form-control form-control-lg", "autocomplete" => "new-password")) !!}
                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    {!! Form::password('password_confirmation', array("id" => "password-confirm", "class" => "form-control form-control-lg", "autocomplete" => "new-password")) !!}
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection