@extends('layouts.dashboard')
@section('content')
	<div class="row">
		<div class="panel p-20">
			<div class="row">
				<div class="col-md-8" style="border-right:1px solid #319db5">
					<div class="col-md-6">
						<span class="my-title">Name</span><br><span class="my-content">{!! $shop->name !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">Email</span><br><span class="my-content">{!! $shop->email !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">Phone</span><br><span class="my-content">{!! $shop->phone !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">Address</span><br><span class="my-content">{!! $shop->address !!}</span>
					</div>
					<div class="col-md-6">
						<span class="my-title">Facebook</span><br><a target="_blank" href="{!! $shop->facebook !!}" class="my-content">{!! $shop->facebook !!}</a href="{!! $shop->facebook !!}">
					</div>
					<div class="col-md-6">
						<span class="my-title">Twitter</span><br><a target="_blank" href="{!! $shop->twitter !!}" class="my-content">{!! $shop->twitter !!}</a href="{!! $shop->facebook !!}">
					</div>
					<div class="col-md-6">
						<span class="my-title">Instagram</span><br><a target="_blank" href="{!! $shop->instagram !!}" class="my-content">{!! $shop->instagram !!}</a href="{!! $shop->facebook !!}">
					</div>
					<div class="col-md-6">
						<span class="my-title">Google Plus</span><br><a target="_blank" href="{!! $shop->google !!}" class="my-content">{!! $shop->google !!}</a href="{!! $shop->facebook !!}">
					</div>
				</div>

				<div class="col-md-4">
					<div class="col-md-10">
						<span class="my-content" style="font-size:20px;">Add Product</span>
					</div>
					<div class="col-md-2">
						<a href="{!! url('dashboard/products/create?shop_id='.$shop->id) !!}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i></a>
					</div>
					<br>
					<div class="col-md-10">
						<span class="my-content" style="font-size:20px;">Edit</span>
					</div>
					<div class="col-md-2">
						<a href="{!! url('dashboard/users/'.$shop->id.'/edit') !!}" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
					</div>
					<br>
					<div class="col-md-10">
						<span class="my-content" style="font-size:20px;">Delete</span>
					</div>
					<div class="col-md-2">
						<a href="{!! url('dashboard/users/'.$shop->id.'/edit') !!}" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
					</div>
					<br>
				</div>
			</div>

			
		</div>
	</div>

	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<img src="{!! url('images/normal/'.$shop->coverImg) !!}" width="100%">
		</div>

		<div class="col-md-6 col-md-offset-3">
			<img class="img-thumbnail" src="{!! url('images/normal/'.$shop->profileImg) !!}" width="100%" style="margin-top:-150px;">
		</div>
	</div>

	<div class="row m-t-20">
		<div class="header">
            <h2><strong>Products</strong></h2>
          </div>
		<table class="table table-dynamic">
	        <thead>
	            <tr>
	                <th>#</th>
	                <th>Name</th>
	                <th>Category</th>
	                <th>Image</th>
	                <th>price</th>
	                <th>actions</th>
	            </tr>
	        </thead>
	        <tbody>
	            @foreach($products as $product)

	            <tr>
	                <td>{!! $loop->iteration !!}</td>
	                <td>{!! $product->name_en !!}</td>
	                <td>{!! $product->categories->name_en !!}</td>
	                <td>
	                	<img src="{!! url('/images/normal/'.$product->image) !!}" height="100px" width="100px" class="img-thumbnail">
	                </td>
	                <td>{!! $product->price !!}</td>
	                <td>
	                    <a href="{!! url('dashboard/products/'.$product->id.'/edit') !!}" data-rel="tooltip" data-placement="bottom" data-original-title="Edit" class="btn btn-sm btn-primary m-5"><i class="glyphicon glyphicon-edit"></i></a>
	                    <a href="{!! url('dashboard/products/'.$product->id.'/images') !!}" data-rel="tooltip" data-placement="bottom" data-original-title="Images" class="btn btn-sm btn-primary m-5"><i class="fa fa-photo"></i></a>
	                    <span onclick=alertDelete('deleteproduct-{!! $product->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Delete" class="m-5 btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></span>
	                </td>
	            </tr>

	            @endforeach
	        </tbody>
	    </table>

	    @foreach($products as $product)
	    <form id="deleteproduct-{!! $product->id !!}" class="hidden" action="{!! url('dashboard/products/'.$product->id) !!}" method="post">
	        {!! csrf_field() !!}
	        {!! method_field('DELETE') !!}
	    </form>
	    @endforeach
	</div>

@endsection