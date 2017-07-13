@extends('layouts.dashboard')
@section('header')
<link href="{{ url('/') }}/assets/backend/plugins/input-text/style.min.css" rel="stylesheet">
@endsection

@section('content')
<form method="post" action="{{ url('dashboard/slider') }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="row">

		<div class="col-md-12">
		  	<div class="form-group col-md-12">
		  		<p><strong>Image</strong>
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

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ old('label') }}" name="label" class="input__field input__field--hoshi" type="text" id="label">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="label">
		    <span class="input__label-content input__label-content--hoshi">Label</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ old('link') }}" name="link" class="input__field input__field--hoshi" type="text" id="link">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="link">
		    <span class="input__label-content input__label-content--hoshi">Link</span>
		    </label>
		    </span>
		  </div>

	</div>
	
	<div class="col-md-12 m-t-10">
	  	<input type="submit" class="btn btn-dark btn-block btn-embossed" value="Add Slide">
	</div>
	  
</form>

@endsection


