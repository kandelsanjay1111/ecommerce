@extends('admin.layout')
@section('title','Category page')
@section('category_select','active')
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
                <h3 class="text-center title-2">Edit Category</h3>
            </div>
            <hr>
            <form action="{{route('admin.category.update',$category->id)}}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT')}}
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                        <label for="category_name" class="control-label mb-1">Category name</label>
                        <input id="category_name" name="category_name" type="text" class="form-control @error('category_name') is-invalid @enderror" value="{{$category->category_name}}" aria-required="true" aria-invalid="false" >
                        </div>  
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                        <label for="category_slug" class="control-label mb-1">Category Slug</label>
                        <input id="category_slug" name="category_slug" type="text" class="form-control @error('category_slug') is-invalid @enderror" value="{{$category->category_slug}}" aria-required="true" aria-invalid="false">
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="parent_id" class="control-label mb-1">Parent Category</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option value="">Select One</option>
                                @foreach($parent_categories as $parent)
                                <option value="{{$parent->id}}" @if($parent->id==$category->parent_id) selected @endif>{{$parent->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                           <label for="image" class="control-label mb-1">Category Image</label>
                           <input type="file" name="image" class="form-control">
                       </div> 
                       <img src="{{asset('storage/media/'.$category->category_image)}}">
                    </div>

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