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
            <form action="{{route('admin.product.store')}}" method="post" novalidate="novalidate" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="control-label mb-1">Product name</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('name')}}">
                </div>
                <div class="form-group">
                    <label for="slug" class="control-label mb-1">Product slug</label>
                    <input id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('slug')}}">
                </div>
                <div class="form-group">
                	<label for="image" class="control-label mb-1">Product image</label>
                	<input type="file" name="image" class="form-control @error('slug') is-invalid @enderror">
                </div>
                <div class="form-group">
                    <label for="brand" class="control-label mb-1"> Brand</label>
                    <input id="brand" name="brand" type="text" class="form-control @error('brand') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('brand')}}">
                </div>
                <div class="form-group">
                    <label for="model" class="control-label mb-1"> Model</label>
                    <input id="model" name="model" type="text" class="form-control @error('model') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('model')}}">
                </div>
                <div class="form-group">
                	<label for="category_id" class="control-label mb-1"> Category</label>
                	<select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                        @foreach($categories as $category)
                		<option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                	</select>
                </div>
                <div class="form-group">
                    <label for="short_desc" class="control-label mb-1"> Short Description</label>
                    <textarea id="short_desc" name="short_desc" type="text" class="form-control @error('short_desc') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('short_desc')}}"></textarea>
                </div>
                <div class="form-group">
                    <label for="keywords" class="control-label mb-1"> keywords</label>
                    <input id="keywords" name="keywords" type="text" class="form-control @error('keywords') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('keywords')}}">
                </div>
                <div class="form-group">
                    <label for="technical_specification" class="control-label mb-1"> Technical Specification</label>
                    <textarea id="technical_specification" name="technical_specification" type="text" class="form-control @error('technical_specification') is-invalid @enderror" aria-required="true" aria-invalid="false">{{old('technical_specification')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="warranty" class="control-label mb-1"> warranty</label>
                    <input id="warranty" name="warranty" type="text" class="form-control @error('warranty') is-invalid @enderror" aria-required="true" aria-invalid="false" value="{{old('warranty')}}">
                </div>
                <h2 class="my-4">Product Attributes</h2>
                <button id="add_btn" type="button" class="btn btn-info">Add new</button>
                <div id="product_attribute">
                    <div class="form-group row">
                        <input type="hidden" id="hidden" name="attribute_id[]">
                        <div class="col-md-3">
                            <label for="sku" class="control-label mb-1"> sku</label>
                            <input id="sku" name="sku[]" type="text" class="form-control @error('sku') is-invalid @enderror" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="col-md-3">
                            <label for="mrp" class="control-label mb-1"> mrp</label>
                            <input id="mrp" name="mrp[]" type="text" class="form-control @error('mrp') is-invalid @enderror" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="col-md-3">
                            <label for="price" class="control-label mb-1"> price</label>
                            <input id="price" name="price[]" type="text" class="form-control @error('price') is-invalid @enderror" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="col-md-3">
                           <label for="size_id" class="control-label mb-1"> Size</label>
                            <select id="size_id" name="size_id[]" class="form-control @error('size_id') is-invalid @enderror">
                                <option>Select Size</option>
                                @foreach($sizes as $size)
                                <option value="{{$size->id}}">{{$size->size}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-md-3">
                           <label for="color_id" class="control-label mb-1"> Color</label>
                            <select id="color_id" name="color_id[]" class="form-control @error('color_id') is-invalid @enderror">
                                <option>Select Color</option>
                                @foreach($colors as $color)
                                <option value="{{$color->id}}">{{$color->color}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="col-md-3">
                            <label for="quantity" class="control-label mb-1"> quantity</label>
                            <input id="quantity" name="quantity[]" type="text" class="form-control @error('quantity') is-invalid @enderror" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="col-md-4">
                        <label for="attr_image" class="control-label mb-1">Attribute image</label>
                        <input type="file" name="attr_image[]" class="form-control @error('attr_image') is-invalid @enderror">
                        </div>
                        <div class="col-md-2">
                            <button type="button" class="btn btn-danger mt-4 remove-btn">Remove</button>
                        </div>
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

@section('script')
<script type="text/javascript">
    $('#add_btn').on('click',function(){
        let form_element=$('#product_attribute .row:first-child').html();
        form_html='<div class="form-group row">'+form_element+'</div>';
        $('#product_attribute').append(form_html);
        // let last_attribute=$('#product_attribute').find('.form-group').last();
        // last_attribute.find('input').val('');
    });
</script>

<script type="text/javascript">
        $('body').on('click','.remove-btn',function(){
        $(this).closest('.row').remove();
    });
</script>
@endsection