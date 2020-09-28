@extends('admin.layout.master')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Show Customer</h4>
                </div>
                <div class="col-lg-6">
                    {{-- @can('user-create') --}}
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
                    </div>
                    {{-- @endcan --}}
                </div>
            </div>
            <div class="form-group">
                <label>Name</label>
                {!! Form::text('name', $user->name, array('class' => 'form-control form-control-lg', 'readonly')) !!}
            </div>
            <div class="form-group">
                <label>Email</label>
                {!! Form::email('email', $user->email, array('class' => 'form-control form-control-lg', 'readonly')) !!}
            </div>
        </div>
    </div>
</div>
@endsection