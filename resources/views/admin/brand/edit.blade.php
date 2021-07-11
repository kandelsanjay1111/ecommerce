@extends('admin.layout')
@section('title','Brand page')
@section('brand_select','active')
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
                <h3 class="text-center title-2">Edit Brand</h3>
            </div>
            <hr>
            <form action="{{route('admin.brand.update',$brand->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Brand name</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$brand->name}}">
                </div>
                <div class="form-group">
                    <label for="image" class="control-label mb-1">Brand image</label>
                    <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" aria-required="true" aria-invalid="false">
                    <img src="{{asset('storage/media/brand/'.$brand->image)}}">
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