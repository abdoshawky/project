@extends('layouts.dashboard')
@section('content')
	<div class="row">
		<div class="panel p-20">
			<div class="row">
				<div class="col-md-8" style="border-right:1px solid #319db5">
					<div class="col-md-6">
						<span class="my-title">Name</span><br><span class="my-content">{!! $user->name !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">Email</span><br><span class="my-content">{!! $user->email !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">Phone</span><br><span class="my-content">{!! $user->phone !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">Address</span><br><span class="my-content">{!! $user->address !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">Facebook</span><br><a target="_blank" href="{!! $user->facebook !!}" class="my-content">{!! $user->facebook !!}</a href="{!! $user->facebook !!}">
					</div>
					<div class="col-md-6">
						<span class="my-title">Twitter</span><br><a target="_blank" href="{!! $user->twitter !!}" class="my-content">{!! $user->twitter !!}</a href="{!! $user->facebook !!}">
					</div>
					<div class="col-md-6">
						<span class="my-title">Instagram</span><br><a target="_blank" href="{!! $user->instagram !!}" class="my-content">{!! $user->instagram !!}</a href="{!! $user->facebook !!}">
					</div>
					<div class="col-md-6">
						<span class="my-title">Google Plus</span><br><a target="_blank" href="{!! $user->google !!}" class="my-content">{!! $user->google !!}</a href="{!! $user->facebook !!}">
					</div>
				</div>

				<div class="col-md-4">
					<div class="col-md-10">
						<span class="my-content" style="font-size:20px;">Edit</span>
					</div>
					<div class="col-md-2">
						<a href="{!! url('dashboard/users/'.$user->id.'/edit') !!}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
					</div>
					<br>
					<div class="col-md-10">
						<span class="my-content" style="font-size:20px;">Delete</span>
					</div>
					<div class="col-md-2">
						<a href="{!! url('dashboard/users/'.$user->id.'/edit') !!}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
					</div>
					<br>
				</div>
			</div>

			
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<img src="{!! url('images/normal/'.$user->coverImg) !!}" width="100%">
		</div>

		<div class="col-md-6 col-md-offset-3">
			<img class="img-thumbnail" src="{!! url('images/normal/'.$user->profileImg) !!}" width="100%" style="margin-top:-150px;">
		</div>
	</div>

@endsection