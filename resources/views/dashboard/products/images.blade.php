@extends('layouts.dashboard')
@section('header')
<link href="{{ url('/') }}/assets/backend/plugins/dropzone/dropzone.min.css" rel="stylesheet">
@endsection

@section('content')

<form id="my-awesome-dropzone" action="/target" class="dropzone"></form>

@endsection

@section('footer')
<script src="{{ url('/') }}/assets/backend/plugins/dropzone/dropzone.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		new Dropzone("div#my-awesome-dropzone");
	});
</script>
@endsection


