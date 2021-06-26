@extends('admin.layout')
@section('title','Product page')
@section('product_select','active')
@section('content')
<div class="row">
	<div class="col-lg-10">
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
                <h3 class="text-center title-2">Add Product</h3>
            </div>
            <hr>
            <form action="{{route('admin.product.update',$product->id)}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Product name</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="slug" class="control-label mb-1">Product slug</label>
                    <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$product->slug}}">
                </div>
                <div class="form-group">
                	<label for="image" class="control-label mb-1">Product image</label>
                	<input type="file" name="image" class="form-control @error('slug') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="brand" class="control-label mb-1"> Brand</label>
                    <input id="brand" name="brand" type="text" class="form-control @error('brand') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$product->brand}}">
                </div>
                <div class="form-group">
                    <label for="model" class="control-label mb-1"> Model</label>
                    <input id="model" name="model" type="text" class="form-control @error('model') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$product->model}}">
                </div>
                <div class="form-group">
                	<label for="category_id" class="control-label mb-1"> Category</label>
                	<select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                		@foreach($categories as $category)
                		<option value="{{$category->id}}" @if($category->id==$product->category_id) selected @endif>{{$category->category_name}}</option>
                        @endforeach
                	</select>
                </div>
                <div class="form-group">
                    <label for="short_desc" class="control-label mb-1"> Short Description</label>
                    <textarea id="short_desc" name="short_desc" type="text" class="form-control @error('short_desc') is-invalid @enderror" aria-required="true" aria-invalid="false">{{$product->short_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="keywords" class="control-label mb-1"> keywords</label>
                    <input id="keywords" name="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$product->keywords}}">
                </div>
                <div class="form-group">
                    <label for="technical_specification" class="control-label mb-1"> Technical Specification</label>
                    <textarea id="technical_specification" name="technical_specification" type="text" class="form-control @error('technical_specification') is-invalid @enderror" aria-required="true" aria-invalid="false">{{$product->technical_specification}}</textarea>
                </div>
                <div class="form-group">
                    <label for="warranty" class="control-label mb-1"> warranty</label>
                    <input id="warranty" name="warranty" type="text" class="form-control @error('warranty') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$product->warranty}}">
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
