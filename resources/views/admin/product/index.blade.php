@extends('admin.layout.master')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Product Management</h4>
                </div>
                <div class="col-lg-6">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                    </div>
                    <div class="float-right" style="margin-right:15px;">
                        <a class="btn btn-warning" href="{{ route('xml.index') }}">
                            Import File XML
                        </a>
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
                    @foreach ($products as $key => $product)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $product->name }}</td>
                            <td>
                                <form action="{{ route('products.destroy',encrypt_decrypt('encrypt',$product->id)) }}" method="POST">
                                    <a class="btn btn-info" href="{{ route('products.show',encrypt_decrypt('encrypt',$product->id)) }}">Show</a>
                                    <a class="btn btn-primary" href="{{ route('products.edit',serialize($product->id)) }}">Edit</a>
                
                
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
            {!! $products->render() !!}        
            </div>
        </div>
    </div>
</div>
@endsection