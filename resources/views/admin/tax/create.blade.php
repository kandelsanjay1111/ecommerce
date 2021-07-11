@extends('admin.layout')
@section('title','Tax page')
@section('tax_select','active')
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
                <h3 class="text-center title-2">Add Tax</h3>
            </div>
            <hr>
            <form action="{{route('admin.tax.store')}}" method="post" novalidate="novalidate">
                @csrf
                <div class="form-group">
                    <label for="tax_desc" class="control-label mb-1">Tax Description</label>
                    <input id="tax_desc" name="tax_desc" type="text" class="form-control @error('tax_desc') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('tax_desc')}}">
                </div>
                <div class="form-group">
                    <label for="amount" class="control-label mb-1">Tax Amount</label>
                    <input id="amount" name="amount" type="text" class="form-control @error('amount') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('amount')}}">
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