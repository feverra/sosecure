@extends('admin.layout.master')
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Show Role</h4>
                </div>
                <div class="col-lg-6">
                    {{-- @can('role-create') --}}
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                    {{-- @endcan --}}
                </div>
            </div>
            
            <form class="form-sample">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    {{ $v->name }},
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection