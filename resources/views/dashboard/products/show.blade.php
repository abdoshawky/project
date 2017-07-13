@extends('layouts.dashboard')
@section('content')

<button onclick="alertDelete('deleteProduct')" class="btn btn-danger">Delete</button>
<form class="hidden" id="deleteProduct" method="post" action="{!! url('/dashboard/products/'.$product->id) !!}">
    {{ method_field('DELETE') }}
    {!! csrf_field() !!}
</form>
<a href="{{ url('dashboard/products/'.$product->id.'/edit')  }}" class="btn btn-primary">Edit</a>

<div class="row">
	<div class="col-md-5">
		<img src="{!! url('/images/normal/'.$product->image) !!}" class="img-thumbnail img-responsive">
	</div>

	<div class="col-md-2">
		<span class="my-title">Name (EN) </span>
		<br>
		<span class="my-content">{!! $product->name_en !!}</span>
	</div>

	<div class="col-md-2">
		<span class="my-title">Name (PO) </span>
		<br>
		<span class="my-content">{!! $product->name_po !!}</span>
	</div>

	<div class="col-md-2">
		<span class="my-title">Category</span>
		<br>
		<span class="my-content">{!! $product->categories->name_en !!}</span>
	</div>

	<div class="col-md-2">
		<span class="my-title">Price</span>
		<br>
		<span class="my-content">{!! $product->price !!}</span>
	</div>

	<div class="col-md-2">
		<span class="my-title">Size</span>
		<br>
		<span class="my-content">{!! $product->size !!}</span>
	</div>

	<div class="col-md-2">
		<span class="my-title">Color</span>
		<br>
		<span class="my-content">
			<span style="width: 50px;height: 30px;background-color: {!! $product->color !!};display: inline-block;"></span>
		</span>
	</div>

	<div class="col-md-2">
		<span class="my-title">Rate</span>
		<br>
		<span class="my-content">{!! $product->rate !!}</span>
	</div>
</div>

<div class="row">
	<div class="col-md-12 m-20 p-20">
		<span class="my-title">Details (EN)</span>
		<br>
		{!! $product->details_en !!}
	</div>
	<div class="col-md-12 m-20 p-20">
		<span class="my-title">Details (PO)</span>
		<br>
		{!! $product->details_po !!}
	</div>
</div>

@endsection