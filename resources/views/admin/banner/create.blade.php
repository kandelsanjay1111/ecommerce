@extends('admin.layout')
@section('title','Banner page')
@section('banner_select','active')
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
                <h3 class="text-center title-2">Add Banner</h3>
            </div>
            <hr>
            <form action="{{route('admin.banner.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="control-label mb-1">Title</label>
                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="subtitle" class="control-label mb-1">subtitle</label>
                    <input id="subtitle" name="subtitle" type="text" class="form-control @error('subtitle') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('subtitle')}}">
                </div>
                <div class="form-group">
                   <label for="image" class="control-label mb-1">Image</label> 
                   <input type="file" name="image" class="form-control">
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