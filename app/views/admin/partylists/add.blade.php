@extends('layouts.backend')

@section('content')
	@include('partials.alerts')

	@if (!isset($item->id))
		<h2>Add New Partylist</h2>
		<hr>
		{{ Form::open(array('url'=>'/admin/partylists')) }}
	@else
		<h2>Partylist</h2>
		<hr>
		{{ Form::open(array('url'=>'/admin/partylists/' .$item->id , 'method' =>'PUT')) }}
		{{ Form::hidden('id', $item->id) }}
	@endif

		<div class="form-group">
			<label for="code">Partylist Code:</label>
			<input type="text" class="form-control" id="code" name="code" placeholder="Enter Partylist Code here." value="{{ isset($item->code) ? $item->code : Input::old('code') }}" required>	
		</div>
		<div class="form-group">
			<label for="name">Partylist Name:</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Partylist Name here." value="{{ isset($item->name) ? $item->name : Input::old('name') }}">	
		</div>
		<a class="btn btn-default" href="/admin/partylists">Cancel</a> 
		<button type="submit" class="btn btn-primary">Submit</button>
		{{ Form::close() }}
@stop