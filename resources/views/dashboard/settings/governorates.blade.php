@extends('layouts.dashboard')
@section('content')

    <div class="panel p-30">
        <div class="row">
            <button data-toggle="modal" data-target="#newGovernorate" type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>{!! Lang::get('dashboard.add').' '.Lang::get('dashboard.governorate') !!}</button>
            <div id="newGovernorate" class="modal fade" role="dialog">
                <div class="modal-dialog  modal-md">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{!! Lang::get('dashboard.add') !!} {!! Lang::get('dashboard.governorate') !!}</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form method="post" action="">
                                    {!! csrf_field() !!}
                                    <div class="form-group col-md-12">
                                        <label for="name">{!! Lang::get('dashboard.governorate') !!}</label>
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

            @if(count($governorates) > 0)
            <div class="tab_right">
                <ul class="nav nav-tabs">
                    @foreach($governorates as $governorate)
                    <li class="@if($loop->iteration == 1) active @endif">
                        <a href="#tab-{!! $loop->iteration !!}" data-toggle="tab">
                            {!! $governorate->name !!}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($governorates as $governorate)
                        <div class="tab-pane fade @if($loop->iteration == 1) active in @endif" id="tab-{!! $loop->iteration !!}">
                        <button data-toggle="modal" data-target="#newCity_{!! $loop->iteration !!}" type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>{!! Lang::get('dashboard.add').' '.Lang::get('dashboard.city') !!}</button>
                        <button data-toggle="modal" data-target="#updateGovernorate_{!! $loop->iteration !!}" type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>{!! Lang::get('dashboard.edit').' '.Lang::get('dashboard.governorate') !!}</button>
                        <button onclick=alertDelete('deleteGovernorate_{!! $governorate->id !!}') type="button" class="btn btn-danger"><i class="fa fa-plus m-r-5 m-l-5"></i>{!! Lang::get('dashboard.delete').' '.Lang::get('dashboard.governorate') !!}</button>

                        <div id="newCity_{!! $loop->iteration !!}" class="modal fade" role="dialog">
                            <div class="modal-dialog  modal-md">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{!! Lang::get('dashboard.add') !!} {!! Lang::get('dashboard.city') !!}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <form method="post" action="{!! url('dashboard/settings/cities/'.$governorate->id) !!}">
                                                {!! csrf_field() !!}
                                                <div class="form-group col-md-12">
                                                    <label for="name">{!! Lang::get('dashboard.city') !!}</label>
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
                        @if(count($governorate->cities) > 0)
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
                            @foreach($governorate->cities as $city)

                                <tr>
                                    <td>{!! $loop->iteration !!}</td>
                                    <td>
                                        {!! $city->name !!}
                                    </td>
                                    <td>
                                        <button data-toggle="modal" data-target="#updateCity_{!! $city->id!!}" data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.edit') !!}" class="btn btn-sm btn-primary m-5"><i class="glyphicon glyphicon-edit"></i></button>
                                    </td>
                                    <td>
                                        <span onclick=alertDelete('deleteCity_{!! $city->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.delete') !!}" class="m-5 btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></span>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                        @endif

                        @foreach($governorate->cities as $city)
                            <div id="updateCity_{!! $city->id !!}" class="modal fade" role="dialog">
                                <div class="modal-dialog  modal-md">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">{!! Lang::get('dashboard.edit') !!} {!! Lang::get('dashboard.city') !!}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <form method="post" action="{!! url('dashboard/settings/cities/update/'.$city->id) !!}">
                                                    {!! csrf_field() !!}
                                                    <div class="form-group col-md-12">
                                                        <label for="name">{!! Lang::get('dashboard.city') !!}</label>
                                                        <input value="{!! $city->name !!}" type="text" name="name" id="name" class="form-control" >
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

                            <form id="deleteCity_{!! $city->id !!}" class="hidden" action="{!! url('dashboard/settings/cities/delete/'.$city->id) !!}" method="post">
                                {!! csrf_field() !!}
                            </form>
                        @endforeach
                    </div>
                    @endforeach

                    @foreach($governorates as $governorate)
                        <div id="updateGovernorate_{!! $governorate->id !!}" class="modal fade" role="dialog">
                            <div class="modal-dialog  modal-md">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">{!! Lang::get('dashboard.edit') !!} {!! Lang::get('dashboard.governorate') !!}</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <form method="post" action="{!! url('dashboard/settings/governorates/'.$governorate->id) !!}">
                                                {!! csrf_field() !!}
                                                <div class="form-group col-md-12">
                                                    <label for="name">{!! Lang::get('dashboard.governorate') !!}</label>
                                                    <input value="{!! $governorate->name !!}" type="text" name="name" id="name" class="form-control" >
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
                        <form id="deleteGovernorate_{!! $governorate->id !!}" class="hidden" action="{!! url('dashboard/settings/governorates/delete/'.$governorate->id) !!}" method="post">
                                {!! csrf_field() !!}
                            </form>
                    @endforeach

                </div>
            </div>
            @endif
        </div>
    </div>


@endsection