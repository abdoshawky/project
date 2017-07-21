@extends('layouts.dashboard')
@section('content')

<div class="row m-t-10">
    <div class="panel p-20">
    	<form method="post" action="">
            {!! csrf_field() !!}
    		<div class="form-group">
    			<label for="site_title">{!! Lang::get('dashboard.site_name') !!}</label>
    			<input type="text" name="site_title" id="site_title" value="{!! array_key_exists('site_title',$settings) ? $settings['site_title'] : '' !!}" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="address">{!! Lang::get('dashboard.address') !!}</label>
    			<input type="text" name="address" id="address" value="{!! array_key_exists('address',$settings) ? $settings['address'] : '' !!}" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="phone">{!! Lang::get('dashboard.phone') !!}</label>
    			<input type="text" name="phone" id="phone" value="{!! array_key_exists('phone',$settings) ? $settings['phone'] : '' !!}" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="international_phone">{!! Lang::get('dashboard.international') !!} {!! Lang::get('dashboard.phone') !!}</label>
    			<input type="text" name="international_phone" id="international_phone" value="{!! array_key_exists('international_phone',$settings) ? $settings['international_phone'] : '' !!}" class="form-control">
    		</div>

    		<div class="form-group">
    			<label for="site_email">{!! Lang::get('dashboard.email') !!}</label>
    			<input type="text" name="site_email" id="site_email" value="{!! array_key_exists('site_email',$settings) ? $settings['site_email'] : '' !!}" class="form-control">
    		</div>

			<div class="btn-group">
				<input type="submit" class="btn btn-primary" value="{!! Lang::get('dashboard.save') !!}">
			</div>
    	</form>
    </div>
</div>

@endsection