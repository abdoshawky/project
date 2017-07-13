@extends('layouts.dashboard')
@section('header')
<link href="{{ url('/') }}/assets/backend/plugins/input-text/style.min.css" rel="stylesheet">
@endsection

@section('content')
<form method="post" action="{{ url('dashboard/products/'.$product->id) }}" enctype="multipart/form-data">
	{!! csrf_field() !!}
	{!! method_field('PUT') !!}
	<div class="row">
	  <div class="col-md-6">
	    <span class="input input--hoshi">
	    <input value="{{ $product->name_en }}" name="name_en" class="input__field input__field--hoshi" type="text" id="input-4">
	    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
	    <span class="input__label-content input__label-content--hoshi">Name (EN)</span>
	    </label>
	    </span>
	  </div>

	  <div class="col-md-6">
	    <span class="input input--hoshi">
	    <input value="{{ $product->name_po }}" name="name_po" class="input__field input__field--hoshi" type="text" id="input-2">
	    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-2">
	    <span class="input__label-content input__label-content--hoshi">Name (PO)</span>
	    </label>
	    </span>
	  </div>

	  <div class="col-md-6">
	    <span class="input input--hoshi">
	    <input value="{{ $product->price }}" name="price" class="input__field input__field--hoshi" type="text" id="price">
	    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="price">
	    <span class="input__label-content input__label-content--hoshi">Price</span>
	    </label>
	    </span>
	  </div>

	  <div class="col-md-6">
	    <span class="input input--hoshi">
	    <input value="{{ $product->size }}" name="size" class="input__field input__field--hoshi" type="text" id="size">
	    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="size">
	    <span class="input__label-content input__label-content--hoshi">Size</span>
	    </label>
	    </span>
	  </div>

	  <div class="col-md-6">
	    <span class="input input--hoshi">
		    <input value="{{ $product->color }}" name="color" class="input__field input__field--hoshi" type="text" id="color">
		    <input type="text" id="colorpicker1">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="color">
		    	<span class="input__label-content input__label-content--hoshi">Color</span>
		    </label>
	    </span>
	  </div>

	  <div class="col-md-6">
	  	<label for="category_id">Category</label>
	    <select name="category_id" id="category_id" class="form-control">
	    	<option value="">Choose Category</option>
	    	@foreach($categories as $cat)
	    	<option @if($cat->id == $product->category_id) selected @endif value="{!! $cat->id !!}">{!! $cat->name_en !!}</option>
	    	@endforeach
	    </select>
	  </div>

	</div>
	<div class="clearfix m-20"></div>
	<div class="row">
	  <div class="col-md-6">
	  	<label for="description_en">Description (EN)</label>
	    <textarea class="form-control" id="description_en" name="description_en">{{ $product->details_en }}</textarea>
	  </div>
	  <div class="col-md-6">
	  	<label for="description_po">Description (PO)</label>
	    <textarea class="form-control" id="description_po" name="description_po">{{ $product->details_po }}</textarea>
	  </div>
	  <div class="col-md-12">
	  	<div class="form-group col-md-12">
	  		<p><strong>Add Image</strong>
	        <div class="fileinput fileinput-new" data-provides="fileinput" style="display:block">
	          <div class="col-sm-12">
	            <div class="fileinput-new thumbnail col-sm-12">
	                <img data-src="" src="{{ url('/images/normal/'.$product->image) }}" class="img-responsive">
	            </div>
	            <div class="fileinput-preview fileinput-exists thumbnail col-sm-12"></div>
	            <div>
	              <span class="btn btn-default btn-file"><span class="fileinput-new">Choose image ...</span><span class="fileinput-exists">change</span>
	              <input type="file" name="image">
	              </span>
	              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">delete</a>
	            </div>
	          </div>
	        </div>
	    </div>
	  </div>
	  <div class="col-md-12 m-t-10">
	  	<input type="submit" class="btn btn-dark btn-block btn-embossed" value="Update Product">
	  </div>
	  

	</div>
</form>

@endsection

@section('footer')
<script src="{{ url('/') }}/assets/backend/plugins/colorpicker/spectrum.min.js"></script>
<script>
$(document).ready(function(){
	CKEDITOR.replace( 'description_en' );
	CKEDITOR.replace( 'description_po' );
	$("#colorpicker1").spectrum({
		color: "{!! $product->color !!}",
		hide: function(color) { 
			$('#color').val(color.toHexString());
		},
	});
});
</script>
@endsection


