@extends('layouts.dashboard')
@section('content')

    <div class="row m-t-10">
        <div class="panel p-30">
            {{--<button data-toggle="modal" data-target="#newClass" type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>{!! Lang::get('dashboard.add') !!}</button>--}}
            {{--<div id="newClass" class="modal fade" role="dialog">--}}
                {{--<div class="modal-dialog  modal-md">--}}

                    {{--<!-- Modal content-->--}}
                    {{--<div class="modal-content">--}}
                        {{--<div class="modal-header">--}}
                            {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                            {{--<h4 class="modal-title">{!! Lang::get('dashboard.add_section') !!}</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                            {{--<div class="row">--}}
                                {{--<form method="post" action="">--}}
                                    {{--{!! csrf_field() !!}--}}
                                    {{--<div class="form-group col-md-12">--}}
                                        {{--<label for="name">{!! Lang::get('dashboard.section_name') !!}</label>--}}
                                        {{--<input value="" type="text" name="name" id="name" class="form-control" >--}}
                                    {{--</div>--}}

                                    {{--<div class="btn-group col-md-6 col-md-offset-3">--}}
                                        {{--<input type="submit" class="btn btn-dark btn-embossed btn-block text-center" value="{!! Lang::get('dashboard.add') !!}">--}}
                                    {{--</div>--}}

                                {{--</form>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">{!! Lang::get('dashboard.close') !!}</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}

            <div class="row">
                @if(count($users) > 0)
                    <table class="table table-dynamic">
                        <thead>
                        <tr>
                            <th style="text-align:right">#</th>
                            <th style="text-align:right">{!! Lang::get('dashboard.name') !!}</th>
                            <th style="text-align:right">{!! Lang::get('dashboard.email') !!}</th>
                            <th style="text-align:right">{!! Lang::get('dashboard.image') !!}</th>
                            <th style="text-align:right">{!! Lang::get('dashboard.actions') !!}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <tr>
                                <td>{!! $loop->iteration !!}</td>
                                <td>
                                    {!! $user->name !!}
                                </td>
                                <td>
                                    {!! $user->email !!}
                                </td>
                                <td>
                                    <img src="{!! url('images/normal/'.$user->image) !!}" class="img-responsive img-thumbnail" width="80px">
                                </td>
                                <td>
                                    <a href="{!! url('dashboard/users/'.$user->id) !!}" data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.details') !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-eye"></i></a>
                                    @if($user->status != 1)
                                        <button type="submit" form="activateUser_{!! $user->id !!}" data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.activate') !!}" class="m-5 btn btn-sm btn-success"><i class="glyphicon glyphicon-check"></i></button>
                                    @endif
                                    <button data-toggle="modal" data-target="#edit_{!! $user->id !!}" data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.edit') !!}" class="btn btn-sm btn-primary m-5"><i class="glyphicon glyphicon-edit"></i></button>
                                    <button data-toggle="modal" data-target="#sendNotification_{!! $user->id !!}" data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.send_notification') !!}" class="btn btn-sm btn-dark m-5"><i class="fa fa-bell"></i></button>
                                    <span onclick=alertDelete('delete_{!! $user->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="{!! Lang::get('dashboard.delete') !!}" class="m-5 btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></span>

                                </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>
    </div>

    @foreach($users as $user)

        <form id="delete_{!! $user->id !!}" class="hidden" action="{!! url('dashboard/users/delete/'.$user->id) !!}" method="post">
            {!! csrf_field() !!}
        </form>

        <form id="activateUser_{!! $user->id !!}" class="hidden" action="{!! url('dashboard/users/activate/'.$user->id) !!}" method="post">
            {!! csrf_field() !!}
        </form>

        <div id="sendNotification_{!! $user->id !!}" class="modal fade" role="dialog">
            <div class="modal-dialog  modal-md">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{!! Lang::get('dashboard.send_notification') !!}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <form method="post" action="{!! url('dashboard/notifications/send') !!}">
                                {!! csrf_field() !!}
                                <input type="hidden" name="account_id" value="{!! $user->id !!}">
                                <input type="hidden" name="account_type" value="user">

                                <div class="form-group col-md-12">
                                    <label for="content">{!! Lang::get('dashboard.content') !!}</label>
                                    <input value="" type="text" name="content" id="content" class="form-control" >
                                </div>

                                <div class="btn-group col-md-6 col-md-offset-3">
                                    <input type="submit" class="btn btn-dark btn-embossed btn-block text-center" value="{!! Lang::get('dashboard.send') !!}">
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

    @endforeach

@endsection