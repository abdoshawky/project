@extends('layouts.dashboard')
@section('content')

<a href="{{ url('/dashboard/users/create') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>Add User</button></a>

<div class="row">
    
    <ul class="nav nav-tabs">
        <li class="active"><a href="#users-tab" data-toggle="tab">Users</a></li>
        <li class=""><a href="#admins-tab" data-toggle="tab">Admins</a></li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane fade active in" id="users-tab">
            <table class="table table-dynamic">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Image</th>
                        <th>social</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)

                    <tr>
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->phone !!}</td>
                        <td>
                            @if($user->profileImg != null)
                            <img src="{!! url('/images/normal/'.$user->profileImg) !!}" height="100px" width="100px" class="img-thumbnail">
                            @endif
                        </td>
                        <td>
                            @if($user->facebook != null)
                            <a href="{!! $user->facebook !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-facebook"></i></a>
                            @endif

                            @if($user->twitter != null)
                            <a href="{!! $user->twitter !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-twitter"></i></a>
                            @endif

                            @if($user->instagram != null)
                            <a href="{!! $user->instagram !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-instagram"></i></a>
                            @endif

                            @if($user->google != null)
                            <a href="{!! $user->google !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-google-plus"></i></a>
                            @endif
                        </td>
                        <td>
                            <a href="{!! url('dashboard/users/'.$user->id.'/edit') !!}" data-rel="tooltip" data-placement="bottom" data-original-title="Edit" class="btn btn-sm btn-primary m-5"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! url('dashboard/users/'.$user->id) !!}" data-rel="tooltip" data-placement="bottom" data-original-title="Details" class="btn btn-sm btn-primary m-5"><i class="fa fa-eye"></i></a>
                            <!--@if($user->status == 1)
                            <span onclick=blockUser('{!! $user->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Block" class="m-5 btn btn-sm btn-dark"><i class="glyphicon glyphicon-ban-circle"></i></span>
                            @else
                            <span onclick=blockUser('{!! $user->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Approve" class="m-5 btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i></span>
                            @endif-->
                            <span onclick=alertDelete('deleteUser-{!! $user->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Delete" class="m-5 btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></span>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
    
        </div>

        <div class="tab-pane fade" id="admins-tab">
            <table class="table table-dynamic">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Image</th>
                        <th>social</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $user)

                    <tr>
                        <td>{!! $loop->iteration !!}</td>
                        <td>{!! $user->name !!}</td>
                        <td>{!! $user->email !!}</td>
                        <td>{!! $user->phone !!}</td>
                        <td>
                            @if($user->profileImg != null)
                            <img src="{!! url('/images/normal/'.$user->profileImg) !!}" height="100px" width="100px" class="img-thumbnail">
                            @endif
                        </td>
                        <td>
                            @if($user->facebook != null)
                            <a href="{!! $user->facebook !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-facebook"></i></a>
                            @endif

                            @if($user->twitter != null)
                            <a href="{!! $user->twitter !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-twitter"></i></a>
                            @endif

                            @if($user->instagram != null)
                            <a href="{!! $user->instagram !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-instagram"></i></a>
                            @endif

                            @if($user->google != null)
                            <a href="{!! $user->google !!}" class="btn btn-sm btn-primary m-5"><i class="fa fa-google-plus"></i></a>
                            @endif
                        </td>
                        <td>
                            <a href="{!! url('dashboard/users/'.$user->id.'/edit') !!}" data-rel="tooltip" data-placement="bottom" data-original-title="Edit" class="btn btn-sm btn-primary m-5"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="{!! url('dashboard/users/'.$user->id) !!}" data-rel="tooltip" data-placement="bottom" data-original-title="Details" class="btn btn-sm btn-primary m-5"><i class="fa fa-eye"></i></a>
                            <!--@if($user->status == 1)
                            <span onclick=blockUser('{!! $user->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Block" class="m-5 btn btn-sm btn-dark"><i class="glyphicon glyphicon-ban-circle"></i></span>
                            @else
                            <span onclick=blockUser('{!! $user->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Approve" class="m-5 btn btn-sm btn-success"><i class="glyphicon glyphicon-ok"></i></span>
                            @endif-->
                            <span onclick=alertDelete('deleteUser-{!! $user->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Delete" class="m-5 btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></span>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
            
        </div>

    </div>
  
	<form id="blockForm" class="hidden" action="{!! url('dashboard/users/bann') !!}" method="post">
        {!! csrf_field() !!}
        <input type="hidden" id="userId" name="user_id" value="">
    </form>
    
</div>

@foreach($users as $user)
<form class="hidden" id="deleteUser-{!! $user->id !!}" method="post" action="{!! url('/dashboard/users/'.$user->id) !!}">
    {{ method_field('DELETE') }}
    {!! csrf_field() !!}
</form>
@endforeach

@foreach($admins as $user)
<form class="hidden" id="deleteUser-{!! $user->id !!}" method="post" action="{!! url('/dashboard/users/'.$user->id) !!}">
    {{ method_field('DELETE') }}
    {!! csrf_field() !!}
</form>
@endforeach

@endsection

@section('footer')

<script type="text/javascript">
    function blockUser(userId){
        $('#blockForm #userId').val(userId);
        $('#blockForm').submit();
    }
</script>

@endsection
