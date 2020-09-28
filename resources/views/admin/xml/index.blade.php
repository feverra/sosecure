@extends('admin.layout.master')
@section('style')

@endsection
@section('content')
<div class="col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">Xml</h4>
                </div>
                <div class="col-lg-6">
                </div>
            </div>
            
            <form class="form-sample" action="{{ route('xml.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Xml File</label><br/>
                    <input type="file" name="file" id="file" accept="text/xml" required/>
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
            @if(isset($textContent))
             {{ $textContent }}
            @endif
        </div>
    </div>
</div>
@endsection
@section('script')
   
@endsection