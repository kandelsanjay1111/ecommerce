@extends('admin.layout')
@section('title','Size page')
@section('size_select','active')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">All Sizes</h2>
            <div class="row">
               <div class="col-lg-3">
                   <a class="au-btn au-btn-icon au-btn--blue mb-2" href="{{route('admin.size.create')}}"><i class="zmdi zmdi-plus"></i>add item</a>
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
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sizes as $size)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$size->size}}</td>
                            <td class="text-right">
                                <a class="{{$size->status=='active'?'btn btn-success':'btn btn-secondary'}}" href="{{route('admin.size.status',$size->id)}}">{{$size->status=='active'?'Active':'Deactive'}}</a>
                                <a href="{{route('admin.size.update',$size->id)}}" class="btn btn-info mr-1">Edit</a>
                                <a href="" class="btn btn-danger" onclick="
                                event.preventDefault();
                                let is_delete=confirm('Do you want to delete');
                                if(is_delete){
                                    document.getElementById('delete-'+{{$loop->index}}).submit();
                                }">Delete</a>
                            </td>
                            <form id="delete-{{$loop->index}}" action="{{route('admin.size.destroy',$size->id)}}" method="POST">
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