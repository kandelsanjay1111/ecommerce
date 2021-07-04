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
                <div class="form-group row" id="product_image">
                    <div class="col-md-12">
                    	<label for="image" class="control-label mb-1">Product image</label>
                        <button id="add_image" type="button" class="btn  btn-success my-2"><i class="zmdi zmdi-plus"></i> Add</button>
                    </div>
                    @foreach($images as $image)
                    <div class="col-md-4">  
                        <input type="hidden" name="image_id[]" value="{{$image->id}}">
                    	<input type="file" name="image[]" class="form-control @error('image') is-invalid @enderror">
                        <img class="w-100" src="{{asset('storage/media/'.$image->image)}}">
                        <div class="text-center my-2">
                        <button value="{{$image->id}}" type="button" class="btn btn-danger m-auto remove_image">Remove</button>
                        </div>
                    </div>
                    @endforeach
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
                <h2 class="my-4">Product Attributes</h2>
                <button id="add_btn" type="button" class="btn btn-success"><i class="zmdi zmdi-plus"></i> Add new</button>
                <div id="product_attribute">
                    @foreach($attributes  as $attribute)
                    <div class="form-group row">
                        <input type="hidden" id="hidden" name="attribute_id[]" value="{{$attribute->id}}">
                        <div class="col-md-3">
                            <label for="sku" class="control-label mb-1"> sku</label>
                            <input id="sku" name="sku[]" type="text" class="form-control @error('sku') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$attribute->sku}}">
                        </div>
                        <div class="col-md-3">
                            <label for="mrp" class="control-label mb-1"> mrp</label>
                            <input id="mrp" name="mrp[]" type="text" class="form-control @error('mrp') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$attribute->mrp}}">
                        </div>
                        <div class="col-md-3">
                            <label for="price" class="control-label mb-1"> price</label>
                            <input id="price" name="price[]" type="text" class="form-control @error('price') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$attribute->price}}">
                        </div>
                        <div class="col-md-3">
                           <label for="size_id" class="control-label mb-1"> Size</label>
                            <select id="size_id" name="size_id[]" class="form-control @error('size_id') is-invalid @enderror">
                                <option>Select Size</option>
                                @foreach($sizes as $size)
                                <option value="{{$size->id}}" @if($size->id==$attribute->size_id) selected @endif>{{$size->size}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-md-3">
                           <label for="color_id" class="control-label mb-1"> Color</label>
                            <select id="color_id" name="color_id[]" class="form-control @error('color_id') is-invalid @enderror">
                                <option>Select Color</option>
                                @foreach($colors as $color)
                                <option value="{{$color->id}}" @if($color->id==$attribute->color_id) selected @endif>{{$color->color}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-md-3">
                            <label for="quantity" class="control-label mb-1"> quantity</label>
                            <input id="quantity" name="quantity[]" type="text" class="form-control @error('quantity') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{$attribute->quantity}}">
                        </div>
                        <div class="col-md-4">
                        <label for="attr_image" class="control-label mb-1">Attribute image</label>
                        <input type="file" name="attr_image[]" class="form-control @error('attr_image') is-invalid @enderror">
                        <img src="{{asset('storage/media/'.$attribute->image)}}">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger mt-4 remove-btn">Remove</button>
                        </div>
                    </div>
                    @endforeach
                    
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

@section('script')
<script type="text/javascript">
    $('#add_btn').on('click',function(){
        let form_element=$('#product_attribute .row:first-child').html();
        form_html='<div class="form-group row">'+form_element+'</div>';
        $('#product_attribute').append(form_html);
        let last_attribute=$('#product_attribute').find('.form-group').last();
        last_attribute.find('input').val('');
        last_attribute.find('img').attr('src','');
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click','.remove-btn',function(){
        $(this).closest('.row').remove();
    });
});
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#add_image').click(function(){
            let image_element=$('#product_image').find('.col-md-4').html();
            let image_html='<div class="col-md-4">'+image_element+'</div>';
            //console.log(image_html);
            $('#product_image').append(image_html);
            let last_image=$('#product_image').find('.col-md-4').last();
            last_image.find('input').val('');
            last_image.find('img').attr('src','');
        })
    })
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('body').on('click','.remove_image',function(){
            let count=$('#product_image').find('.col-md-4').length;
            //console.log(count);
            if(count>1)
            {
            $(this).parent().parent().remove();
            }
            else{
                alert('you cannot delete this');
            }
        });
    });
</script>
@endsection
