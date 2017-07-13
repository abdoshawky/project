@extends('layouts.dashboard')
@section('content')

<div class="row m-t-10">
    <div class="panel p-20">
    	<form>
    		<div class="form-group">
    			<label for="site_title">Site Title</label>
    			<input type="text" name="site_title" id="site_title" value="" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="address">Address</label>
    			<input type="text" name="address" id="address" value="" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="phone">Phone</label>
    			<input type="text" name="phone" id="phone" value="" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="international_phone">International phone</label>
    			<input type="text" name="international_phone" id="international_phone" value="" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="site_email">Email</label>
    			<input type="text" name="site_email" id="site_email" value="" class="form-control">
    		</div>
    	</form>
    </div>
</div>

@endsection