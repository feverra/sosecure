@extends('admin.layout.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Users Management</h4>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('admins.create') }}"> Create New user</a>
                    </div>
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
                    @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $user->name }}</td>
                            <td>
                                {{-- @can('user-delete') --}}
                                <form action="{{ route('admins.destroy',encrypt_decrypt('encrypt',$user->id)) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('admins.show',encrypt_decrypt('encrypt',$user->id)) }}">Show</a>
                                    {{-- @can('user-edit') --}}
                                    <a class="btn btn-primary" href="{{ route('admins.edit',encrypt_decrypt('encrypt',$user->id)) }}">Edit</a>
                                    {{-- @endcan --}}
                
                
                                    @csrf
                                    @method('DELETE')
                                    {{-- @can('user-delete') --}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                    {{-- @endcan --}}
                                </form>
                                {{-- @endcan --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex">
            <div class="mx-auto">
                {!! $users->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection