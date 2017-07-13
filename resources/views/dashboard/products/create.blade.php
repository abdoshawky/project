@extends('layouts.dashboard')
@section('header')
<link href="{{ url('/') }}/assets/backend/plugins/input-text/style.min.css" rel="stylesheet">
@endsection

@section('content')
<form method="post" action="{{ url('dashboard/products') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="row">
	  <!-- <div class="col-md-6">
	    <span class="input input--hoshi">
	    <input value="{{ old('name_en') }}" name="name_en" class="input__field input__field--hoshi" type="text" id="input-4">
	    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="input-4">
	    <span class="input__label-content input__label-content--hoshi">Name (EN)</span>
	    </label>
	    </span>
	  </div> -->

	  <div class="form-group col-md-6">
	  	<label for="name_po">Name</label>
	    <input value="{{ old('name_po') }}" name="name_po" class="form-control" type="text" id="name_po">
	  </div>

	  <div class="form-group col-md-6">
	  	<label for="price">Price</label>
	    <input value="{{ old('price') }}" name="price" class="form-control" type="text" id="price">
	  </div>

	  <div class="form-group col-md-6">
	  	<label for="discount">Discount</label>
	    <input value="{{ old('discount') }}" name="discount" class="form-control" type="number" id="discount">
	  </div>

	  <div class="form-group col-md-6">
	  	<label for="category_id">Category</label>
	    <select name="category_id" id="category_id" class="form-control">
	    	<option value="">Choose Category</option>
	    	@foreach($categories as $cat)
	    	<option value="{!! $cat->id !!}">{!! Lang::get('main.category_'.$cat->id.'_name') !!}</option>
	    	@endforeach
	    </select>
	  </div>

	  <div class="form-group col-md-6">
	  	<label for="color">Color</label>
	    <select name="color" id="color" class="form-control">
	    	<option value="">Choose Color</option>
	    	@foreach($colors as $hex => $color)
	    	<option style="background-color:{!! $hex !!}" value="{!! $color !!}">{!! $color !!}</option>
	    	@endforeach
	    </select>
	  </div>

	  <div class="form-group col-md-6">
	  	<label for="size">Size</label>
	    <select name="size" id="size" class="form-control">
	    	<option value="">Choose Size</option>
	    	@foreach($sizes as $size)
	    	<option value="{!! $size !!}">{!! $size !!}</option>
	    	@endforeach
	    </select>
	  </div>

	  <div class="form-group col-md-6">
	  	<label for="shop_id">Shop</label>
	    <select name="shop_id" id="shop_id" class="form-control">
	    	<option value="">Choose Shop</option>
	    	@foreach($shops as $shop)
	    	<option @if(isset($_GET['shop_id']) && $_GET['shop_id'] == $shop->id) selected @endif value="{!! $shop->id !!}">{!! $shop->name !!}</option>
	    	@endforeach
	    </select>
	  </div>

	  <div class="form-group col-md-6">
	  	<label>Tags</label>
	  	<div data-tags-input-name="tag" id="tagBox"></div>
	  </div>

	</div>
	<div class="clearfix m-20"></div>
	<div class="row">
	  <!-- <div class="form-group col-md-6">
	  	<label for="description_en">Description (EN)</label>
	    <textarea class="form-control" id="description_en" name="description_en">{{ old('description_en') }}</textarea>
	  </div> -->
	  <div class="form-group col-md-6">
	  	<label for="short_desc_po">Short Description</label>
	    <textarea rows="5" class="form-control" id="short_desc_po" name="short_desc_po">{{ old('short_desc_po') }}</textarea>
	  </div>

	  <div class="form-group col-md-6">
	  	<label for="details_po">Details</label>
	    <textarea rows="5" class="form-control" id="details_po" name="details_po">{{ old('details_po') }}</textarea>
	  </div>

	  <div class="col-md-12">
	  	<div class="form-group col-md-12">
	  		<p><strong>Main Image</strong>
	        <div class="fileinput fileinput-new" data-provides="fileinput" style="display:block">
	          <div class="col-sm-12">
	            <div class="fileinput-new thumbnail col-sm-12">
	                <img data-src="" src="{{ url('/') }}/assets/backend/images/profile2.png" class="img-responsive">
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

	  <div class="col-md-12">
	  	<div class="form-group">
	  		<p><strong>Other Image</strong>
	  		<div class="fileinput fileinput-new input-group" data-provides="fileinput">
			  <div class="form-control" data-trigger="fileinput">
			    <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
			  </div>
			  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Choose...</span><span class="fileinput-exists">Change</span>
			  <input type="file" name="images" multiple>
			  </span>
			  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
			</div>
	  	</div>
	  </div>

	  <div class="col-md-12 m-t-10">
	  	<input type="submit" class="btn btn-dark btn-block btn-embossed" value="Add Product">
	  </div>

	</div>
</form>

@endsection

@section('footer')
<script src="{{ url('/') }}/assets/backend/plugins/colorpicker/spectrum.min.js"></script>
<script src="{{ url('/') }}/assets/backend/js/tagging.min.js"></script>
<script>
$(document).ready(function(){
	// // CKEDITOR.replace( 'description_en' );
	// // CKEDITOR.replace( 'description_po' );
	// $("#colorpicker1").spectrum({
	// 	hide: function(color) { 
	// 		$('#color').val(color.toHexString());
	// 	},
	// });
	$("#tagBox").tagging();
	$('.type-zone').addClass('form-control');
});
</script>
@endsection


