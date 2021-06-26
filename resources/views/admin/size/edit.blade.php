@extends('admin.layout')
@section('title','Size page')
@section('size_select','active')
@section('content')
<div class="row">
	<div class="col-lg-8">
    <div class="card">
        <div class="card-body">
            @foreach($errors->all() as $error)
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
            {{$error}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            @endforeach
            <div class="card-title">
                <h3 class="text-center title-2">Edit Size</h3>
            </div>
            <hr>
            <form action="{{route('admin.size.update',$size->id)}}" method="post" novalidate="novalidate">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="size" class="control-label mb-1">Size</label>
                    <input id="size" name="size" type="text" class="form-control @error('size') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$size->size}}">
                </div>
                <div>
                    <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="payment-button-amount">Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection