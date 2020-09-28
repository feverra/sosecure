@extends('admin.layout.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Role Management</h4>
                </div>
                <div class="col-lg-6">
                    {{-- @can('role-create') --}}
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
                    </div>
                    {{-- @endcan --}}
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success" style="margin-top: 10px;">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a class="btn btn-info" href="{{ route('roles.show',encrypt_decrypt('encrypt',$role->id)) }}">Show</a>
                                {{-- @can('role-edit') --}}
                                <a class="btn btn-primary" href="{{ route('roles.edit',encrypt_decrypt('encrypt',$role->id)) }}">Edit</a>
                                {{-- @endcan
                                @can('role-delete') --}}
                                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', encrypt_decrypt('encrypt',$role->id)],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex">
            <div class="mx-auto">
                {!! $roles->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection