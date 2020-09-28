@extends('admin.layout.master')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Create New Role</h4>
                </div>
                <div class="col-lg-6">
                    {{-- @can('role-create') --}}
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                    {{-- @endcan --}}
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
            <form class="form-sample" action="{{ route('roles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    {!! Form::text('name', null, array('class' => 'form-control form-control-lg')) !!}
                </div>

                <div class="form-group">
                    <label>Permission</label>
                    <br />
                    <div class="row">
                        @foreach($permission as $value)

                        <div class="col-xs-12 col-sm-4 col-md-3">
                            <div class="form-check form-check-flat">
                                <label class="form-check-label">
                                    <input type="checkbox" name="permission[]" value="{{ $value->id }}"
                                        class="form-check-input name">{{ $value->name }}</label>
                            </div>
                        </div>
                        @endforeach
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