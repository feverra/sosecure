@extends('admin.layout.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Blog Management</h4>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('blogs.create') }}"> Create New Blog</a>
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
                        <th>Title</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($blogs as $key => $blog)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $blog->title }}</td>
                            <td>
                                <form action="{{ route('blogs.destroy',encrypt_decrypt('encrypt',$blog->id)) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('blogs.show',encrypt_decrypt('encrypt',$blog->id)) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('blogs.edit',encrypt_decrypt('encrypt',$blog->id)) }}">Edit</a>
                
                
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex">
            <div class="mx-auto">
                {!! $blogs->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection