@extends('layouts.dashboard')
@section('content')

<a href="{{ url('/dashboard/slider/create') }}"><button type="button" class="btn btn-primary"><i class="fa fa-plus m-r-5 m-l-5"></i>Add Slide</button></a>

<div class="row">
    
    <table class="table table-dynamic">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>label</th>
                <th>link</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($slides as $slide)

            <tr>
                <td>{!! $loop->iteration !!}</td>
                <td>
                    @if($slide->image != null)
                    <img src="{!! url('/images/normal/'.$slide->image) !!}" height="100px" width="100px" class="img-thumbnail">
                    @endif
                </td>
                <td>
                    {!! $slide->label !!}
                </td>
                <td>
                    <a href="{!! $slide->link !!}" target="_blank">{!! $slide->link !!}</a>
                </td>
                <td>
                    <a href="{!! url('dashboard/slider/'.$slide->id.'/edit') !!}" data-rel="tooltip" data-placement="bottom" data-original-title="Edit" class="btn btn-sm btn-primary m-5"><i class="glyphicon glyphicon-edit"></i></a>
                    <span onclick=alertDelete('deleteSlide-{!! $slide->id !!}') data-rel="tooltip" data-placement="bottom" data-original-title="Delete" class="m-5 btn btn-sm btn-danger"><i class="glyphicon glyphicon-trash"></i></span>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
    
</div>

@foreach($slides as $slide)
<form class="hidden" id="deleteSlide-{!! $slide->id !!}" method="post" action="{!! url('/dashboard/slider/'.$slide->id) !!}">
    {{ method_field('DELETE') }}
    {!! csrf_field() !!}
</form>
@endforeach

@endsection

