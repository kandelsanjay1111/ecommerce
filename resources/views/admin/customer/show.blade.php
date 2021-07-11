@extends('admin.layout')
@section('title','Customer page')
@section('customer_select','active')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">All Customers</h2>
            <div class="row">
               <div class="col-lg-9">
                @if(Session::has('success'))
                    <div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
                        <span class="badge badge-pill badge-primary">Success</span>
                        {{Session::get('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
               </div>
            </div>
            
            <div class="table-responsive table--no-card m-b-40">
                <table class="table table-borderless table-striped table-earning">
                    <tbody>
                        <tr>
                            <td>Name</td>
                            <td>{{$customer->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$customer->email}}</td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>{{$customer->mobile}}</td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>{{$customer->address}}</td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td>{{$customer->city}}</td>
                        </tr>
                        <tr>
                            <td>State</td>
                            <td>{{$customer->state}}</td>
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td>{{$customer->zip}}</td>
                        </tr>
                        <tr>
                            <td>Company</td>
                            <td>{{$customer->company}}</td>
                        </tr>
                        <tr>
                            <td>Created Date</td>
                            <td>{{$customer->created_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection