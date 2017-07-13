@extends('layouts.dashboard')
@section('header')
<link href="{{ url('/') }}/assets/backend/plugins/input-text/style.min.css" rel="stylesheet">
@endsection

@section('content')
<form method="post" action="{{ url('dashboard/users/'.$user->id) }}" enctype="multipart/form-data">
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	<div class="row">

		<div class="col-md-12">
		  	<div class="form-group col-md-12">
		  		<p><strong>Profile Image</strong>
		        <div class="fileinput fileinput-new" data-provides="fileinput" style="display:block">
		          <div class="col-sm-12">
		            <div class="fileinput-new thumbnail col-sm-12">
		            	@if($user->profileImg == null)
		                <img data-src="" src="{{ url('/') }}/assets/backend/images/profile2.png" class="img-responsive">
		            	@else
		            	<img data-src="" src="{{ url('/images/normal/'.$user->profileImg) }}" class="img-responsive">
		            	@endif
		            </div>
		            <div class="fileinput-preview fileinput-exists thumbnail col-sm-12"></div>
		            <div>
		              <span class="btn btn-default btn-file"><span class="fileinput-new">Choose image ...</span><span class="fileinput-exists">change</span>
		              <input type="file" name="profileImg">
		              </span>
		              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">delete</a>
		            </div>
		          </div>
		        </div>
		    </div>
		  </div>

		  <div class="col-md-12">
		  	<div class="form-group col-md-12">
		  		<p><strong>Cover Image</strong>
		        <div class="fileinput fileinput-new" data-provides="fileinput" style="display:block">
		          <div class="col-sm-12">
		            <div class="fileinput-new thumbnail col-sm-12">
		                @if($user->coverImg == null)
		                <img data-src="" src="{{ url('/') }}/assets/backend/images/profile2.png" class="img-responsive">
		            	@else
		            	<img data-src="" src="{{ url('/images/normal/'.$user->coverImg) }}" class="img-responsive">
		            	@endif
		            </div>
		            <div class="fileinput-preview fileinput-exists thumbnail col-sm-12"></div>
		            <div>
		              <span class="btn btn-default btn-file"><span class="fileinput-new">Choose image ...</span><span class="fileinput-exists">change</span>
		              <input type="file" name="coverImg">
		              </span>
		              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">delete</a>
		            </div>
		          </div>
		        </div>
		    </div>
		  </div>

		  <div class="col-md-12">
		  	<label for="type">Type</label>
		    <select name="type" id="type" class="form-control">
		    	<option value="">Choose Type</option>
		    	<option @if($user->type == 'user') selected @endif value="user">User</option>
		    	<option @if($user->type == 'shop') selected @endif value="shop">Shop</option>
		    	<option @if($user->type == 'admin') selected @endif value="admin">Admin</option>
		    </select>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ $user->name }}" name="name" class="input__field input__field--hoshi" type="text" id="name">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="name">
		    <span class="input__label-content input__label-content--hoshi">Name</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ $user->email }}" name="email" class="input__field input__field--hoshi" type="text" id="email">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="email">
		    <span class="input__label-content input__label-content--hoshi">Email</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input name="password" class="input__field input__field--hoshi" type="password" id="password">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="password">
		    <span class="input__label-content input__label-content--hoshi">Password</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input name="password_confirmation" class="input__field input__field--hoshi" type="password" id="password_confirmation">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="password_confirmation">
		    <span class="input__label-content input__label-content--hoshi">Password Confirmation</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ $user->phone }}" name="phone" class="input__field input__field--hoshi" type="text" id="phone">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="phone">
		    <span class="input__label-content input__label-content--hoshi">Phone</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ $user->address }}" name="address" class="input__field input__field--hoshi" type="text" id="address">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="address">
		    <span class="input__label-content input__label-content--hoshi">Address</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ $user->facebook }}" name="facebook" class="input__field input__field--hoshi" type="text" id="facebook">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="facebook">
		    <span class="input__label-content input__label-content--hoshi">Facebook</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ $user->twitter }}" name="twitter" class="input__field input__field--hoshi" type="text" id="twitter">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="twitter">
		    <span class="input__label-content input__label-content--hoshi">Twitter</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ $user->instagram }}" name="instagram" class="input__field input__field--hoshi" type="text" id="instagram">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="instagram">
		    <span class="input__label-content input__label-content--hoshi">Instagram</span>
		    </label>
		    </span>
		  </div>

		  <div class="col-md-6">
		    <span class="input input--hoshi">
		    <input value="{{ $user->google }}" name="google" class="input__field input__field--hoshi" type="text" id="google">
		    <label class="input__label input__label--hoshi input__label--hoshi-color-1" for="google">
		    <span class="input__label-content input__label-content--hoshi">Google Plus</span>
		    </label>
		    </span>
		  </div>

	</div>
	
	<div class="col-md-12 m-t-10">
	  	<input type="submit" class="btn btn-dark btn-block btn-embossed" value="Update User">
	</div>
	  
</form>

@endsection


