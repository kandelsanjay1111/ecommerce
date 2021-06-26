@extends('admin.layout')
@section('title','Color page')
@section('color_select','active')
@section('content')
<div class="row">
        <div class="col-lg-12">
            <h2 class="title-1 m-b-25">All Color</h2>
            <div class="row">
               <div class="col-lg-3">
                   <a class="au-btn au-btn-icon au-btn--blue mb-2" href="{{route('admin.color.create')}}"><i class="zmdi zmdi-plus"></i>add item</a>
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
                            <th>Color</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colors as $color)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$color->color}}</td>
                            <td>
                                <a class="{{$color->status=='active'?'btn btn-success':'btn btn-secondary'}}" href="{{route('admin.color.status',$color->id)}}">{{$color->status=='active'?'Active':'Deactive'}}</a>
                                <a href="{{route('admin.color.update',$color->id)}}" class="btn btn-info mr-1">Edit</a>
                                <a href="" class="btn btn-danger" onclick="
                                event.preventDefault();
                                let is_delete=confirm('Do you want to delete');
                                if(is_delete){
                                    document.getElementById('delete-'+{{$loop->index}}).submit();
                                }">Delete</a>
                            </td>
                            <form id="delete-{{$loop->index}}" action="{{route('admin.color.destroy',$color->id)}}" method="POST">
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