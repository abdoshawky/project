@extends('layouts.dashboard')
@section('content')

<div class="row m-t-10">
    <div class="panel p-20">
    	<button data-toggle="modal" data-target="#newClass" type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>{!! Lang::get('dashboard.add') !!}</button>
        <div id="newClass" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{!! Lang::get('dashboard.add') !!} {!! Lang::get('dashboard.type') !!}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form method="post" action="">
                                {!! csrf_field() !!}
                                <div class="form-group col-md-12">
                                    <label for="name">{!! Lang::get('dashboard.type') !!}</label>
                                    <input value="" type="text" name="name" id="name" class="form-control" >
                                </div>

                                <div class="btn-group col-md-6 col-md-offset-3">
                                    <input type="submit" class="btn btn-dark btn-embossed btn-block text-center" value="{!! Lang::get('dashboard.add') !!}">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{!! Lang::get('dashboard.close') !!}</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            @if(count($types) > 0)
            <table class="table table-dynamic">
                <thead>
                    <tr>
                        <th style="text-align:right">#</th>
                        <th style="text-align:right">{!! Lang::get('dashboard.name') !!}</th>
                        <th style="text-align:right">{!! Lang::get('dashboard.edit') !!}</th>
                        <th style="text-align:right">{!! Lang::get('dashboard.delete') !!}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)

                    <tr>
                        <td>{!! $loop->iteration !!}</td>
                        <td>
                            {!! $type->name !!}
                        </td>
                        <td>
                            <button data-toggle="modal" data-target="#editClass_{!! $type->id !!}" data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.edit') !!}" class="btn btn-sm btn-primary m-5"><i class="glyphicon glyphicon-edit"></i></button>
                        </td>
                        <td>
                            <span onclick=alertDelete('deleteClass-{!! $type->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.delete') !!}" class="m-5 btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></span>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            @endif
            
        </div>
    </div>
</div>

@foreach($types as $type)
<div id="editClass_{!! $type->id !!}" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{!! Lang::get('dashboard.edit') !!} {!! Lang::get('dashboard.type') !!}: {!! $type->name !!}</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="post" action="{!! url('dashboard/settings/types/'.$type->id) !!}">
                        {!! csrf_field() !!}
                        <div class="form-group col-md-12">
                            <label for="name">{!! Lang::get('dashboard.type') !!}</label>
                            <input value="{!! $type->name !!}" type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="btn-group col-md-6 col-md-offset-3">
                            <input type="submit" class="btn btn-dark btn-embossed btn-block text-center" value="{!! Lang::get('dashboard.edit') !!}">
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{!! Lang::get('dashboard.close') !!}</button>
            </div>
        </div>

    </div>
</div>


<form id="deleteClass-{!! $type->id !!}" class="hidden" action="{!! url('dashboard/settings/types/delete/'.$type->id) !!}" method="post">
    {!! csrf_field() !!}
</form>
@endforeach

@endsection