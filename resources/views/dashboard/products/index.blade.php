@extends('layouts.dashboard')
@section('content')

<div class="row">

	<ul class="nav nav-tabs">
	    <li class="@if(count($categories) > 0) active @endif"><a href="#tab-1" data-toggle="tab">Products</a></li>
	    <li class="@if(count($categories) == 0) active @endif"><a href="#tab-2" data-toggle="tab">Categories</a></li>
	</ul>
	<div class="tab-content">

	    <div class="tab-pane fade @if(count($categories) > 0) active in @endif" id="tab-1">
	    	<a href="{{ url('/dashboard/products/create') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>Add Product</button></a>

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
		                <td>{!! Lang::get('main.product_'.$product->id.'_name') !!}</td>
		                <td>{!! Lang::get('main.category_'.$product->categories->id.'_name') !!}</td>
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
	    <div class="tab-pane fade @if(count($categories) == 0) active in @endif" id="tab-2">
	        <span data-toggle="modal" data-target="#newCategory"><button type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>Add Category</button></span>
	    	{{-- New Category modal --}}
	        <div id="newCategory" class="modal fade" role="dialog">
	            <div class="modal-dialog modal-lg">

	                <!-- Modal content-->
	                <div class="modal-content">
	                    <div class="modal-header">
	                        <button type="button" class="close" data-dismiss="modal">&times;</button>
	                        <h4 class="modal-title">New Category</h4>
	                    </div>
	                    <div class="modal-body">
	                        <div class="row">
	                            <form method="post" action="{!! url('/dashboard/category/create') !!}" enctype="multipart/form-data">
	                                {!! csrf_field() !!}
	                                <input type="hidden" value="product" name="type">
	                                <div class="form-group col-md-6">
	                                    <label for="name_en">Category Name ( EN )</label>
	                                    <input value="" type="text" name="name_en" id="name_en" class="form-control" >
	                                </div>

	                                <div class="form-group col-md-6">
	                                    <label for="name_po">Category Name ( PO )</label>
	                                    <input value="" type="text" name="name_po" id="name_po" class="form-control">
	                                </div>

	                                <div class="btn-group col-md-12">
	                                    <input type="submit" class="btn btn-dark btn-embossed btn-block" value="Add Category">
	                                </div>


	                            </form>
	                        </div>
	                    </div>
	                    <div class="modal-footer">
	                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	                    </div>
	                </div>



	            </div>
	        </div>
	        <table class="table table-dynamic">
		        <thead>
		            <tr>
		                <th>#</th>
		                <th>Name (EN)</th>
		                <th>Name (PO)</th>
		                <th>actions</th>
		            </tr>
		        </thead>
		        <tbody>
		            @foreach($categories as $cat)

		            <tr>
		                <td>{!! $loop->iteration !!}</td>
		                <td>{!! Lang::get('main.category_'.$cat->id.'_name') !!}</td>
		                <td>{!! Lang::get('main.category_'.$cat->id.'_name',[],'po') !!}</td>
		                <td>
		                    <span data-rel="tooltip" data-placement="bottom" data-original-title="Edit" class="btn btn-sm btn-primary m-5" data-toggle="modal" data-target="#Category-{!! $cat->id !!}"><i class="glyphicon glyphicon-edit"></i></span>
		                    <span onclick=alertDelete('deleteCategory-{!! $cat->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Delete" class="m-5 btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></span>
		                </td>
		            </tr>

		            @endforeach
		        </tbody>
		    </table>
	    </div>
	</div>
    
</div>

@foreach($categories as $cat)

{{-- Update Category modal --}}
<div id="Category-{!! $cat->id !!}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Category</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="post" action="{!! url('/dashboard/category/update/'.$cat->id) !!}" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group col-md-6">
                            <label for="name_en">Category Name ( EN )</label>
                            <input value="{!! Lang::get('main.category_'.$cat->id.'_name') !!}" type="text" name="name_en" id="name_en" class="form-control" >
                        </div>

                        <div class="form-group col-md-6">
                            <label for="name_po">Category Name ( PO )</label>
                            <input value="{!! Lang::get('main.category_'.$cat->id.'_name',[],'po') !!}" type="text" name="name_po" id="name_po" class="form-control">
                        </div>

                        <div class="btn-group col-md-12">
                            <input type="submit" class="btn btn-dark btn-embossed btn-block" value="Update Category">
                        </div>


                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>



    </div>
</div>

<form id="deleteCategory-{!! $cat->id !!}" class="hidden" action="{!! url('dashboard/category/delete/'.$cat->id) !!}" method="post">
    {!! csrf_field() !!}
</form>


@endforeach

@endsection