@extends('admin.layout')
@section('title','Coupon page')
@section('coupon_select','active')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">All Coupon</h2>
            <div class="row">
               <div class="col-lg-3">
                   <a class="au-btn au-btn-icon au-btn--blue mb-2" href="{{route('admin.coupon.create')}}"><i class="zmdi zmdi-plus"></i>add item</a>
               </div> 
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
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Coupon Title</th>
                            <th>Coupon Code</th>
                            <th>Coupon Value</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($coupons as $coupon)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$coupon->title}}</td>
                            <td>{{$coupon->code}}</td>
                            <td>{{$coupon->value}}</td>
                            <td class="text-right">
                                <a class="{{$coupon->status=='active'?'btn btn-success':'btn btn-secondary'}}" href="{{route('admin.coupon.status',$coupon->id)}}">{{$coupon->status=='active'?'Active':'Deactive'}}</a>
                                <a href="{{route('admin.coupon.update',$coupon->id)}}" class="btn btn-info mr-1">Edit</a>
                                <a href="" class="btn btn-danger" onclick="
                                event.preventDefault();
                                let is_delete=confirm('Do you want to delete');
                                if(is_delete){
                                    document.getElementById('delete-'+{{$loop->index}}).submit();
                                }">Delete</a>
                            </td>
                            <form id="delete-{{$loop->index}}" action="{{route('admin.coupon.destroy',$coupon->id)}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
