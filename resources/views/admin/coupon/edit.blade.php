@extends('admin.layout')
@section('title','Category page')
@section('coupon_select','active')
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
                <h3 class="text-center title-2">Edit Coupon</h3>
            </div>
            <hr>
            <form action="{{route('admin.coupon.update',$coupon->id)}}" method="post" novalidate="novalidate">
                @csrf
                {{method_field('PUT')}}
                <div class="form-group">
                    <label for="title" class="control-label mb-1">Coupon title</label>
                    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{$coupon->title}}" aria-required="true" aria-invalid="false" >
                </div>
                <div class="form-group">
                    <label for="code" class="control-label mb-1">Coupon Code</label>
                    <input id="code" name="code" type="text" class="form-control @error('code') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$coupon->code}}">
                </div>
                <div class="form-group">
                    <label for="value" class="control-label mb-1">Coupon Value</label>
                    <input id="value" name="value" type="text" class="form-control @error('value') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$coupon->value}}">
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