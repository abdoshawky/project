@extends('layouts.dashboard')
@section('content')
	<div class="row">
		<div class="panel p-20">

            <div class="row m-t-20">
                <div class="col-md-4">
                    <img class="img-thumbnail" src="{!! url('images/normal/'.$user->image) !!}" width="100%" style="">
                </div>
				<div class="col-md-8">
					<div class="col-md-6">
						<span class="my-title">{!! Lang::get('dashboard.name') !!}</span><br><span class="my-content">{!! $user->name !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">{!! Lang::get('dashboard.email') !!}</span><br><span class="my-content">{!! $user->email !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">{!! Lang::get('dashboard.phone') !!}</span><br><span class="my-content">{!! $user->phone !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">{!! Lang::get('dashboard.age') !!}</span><br><span class="my-content">{!! $user->age !!}</span>
					</div>
                    <div class="col-md-6">
                        <span class="my-title">{!! Lang::get('dashboard.gender') !!}</span><br><span class="my-content">{!! $user->gender !!}</span>
                    </div>
                    <div class="col-md-6">
                        <span class="my-title">{!! Lang::get('dashboard.governorate') !!}</span><br><span class="my-content">{!! $user->city->governorate->name !!}</span>
                    </div>
                    <div class="col-md-6">
                        <span class="my-title">{!! Lang::get('dashboard.city') !!}</span><br><span class="my-content">{!! $user->city->name !!}</span>
                    </div>

					{{--<div class="col-md-6">--}}
						{{--<span class="my-title">Facebook</span><br><a target="_blank" href="{!! $user->facebook !!}" class="my-content">{!! $user->facebook !!}</a href="{!! $user->facebook !!}">--}}
					{{--</div>--}}
					{{--<div class="col-md-6">--}}
						{{--<span class="my-title">Twitter</span><br><a target="_blank" href="{!! $user->twitter !!}" class="my-content">{!! $user->twitter !!}</a href="{!! $user->facebook !!}">--}}
					{{--</div>--}}
					{{--<div class="col-md-6">--}}
						{{--<span class="my-title">Instagram</span><br><a target="_blank" href="{!! $user->instagram !!}" class="my-content">{!! $user->instagram !!}</a href="{!! $user->facebook !!}">--}}
					{{--</div>--}}
					{{--<div class="col-md-6">--}}
						{{--<span class="my-title">Google Plus</span><br><a target="_blank" href="{!! $user->google !!}" class="my-content">{!! $user->google !!}</a href="{!! $user->facebook !!}">--}}
					{{--</div>--}}
				</div>


			</div>

			
		</div>
	</div>


@endsection