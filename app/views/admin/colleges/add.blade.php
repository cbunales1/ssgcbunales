@extends('layouts.backend')

@section('content')
	@include('partials.alerts')

	@if (!isset($item->id))
		<h2>Add New Colleges</h2>
		<hr>
		{{ Form::open(array('url'=>'/admin/colleges')) }}
	@else
		<h2>Colleges</h2>
		<hr>
		{{ Form::open(array('url'=>'/admin/colleges/' .$item->id , 'method' =>'PUT')) }}
		{{ Form::hidden('id', $item->id) }}
	@endif

		<div class="form-group">
			<label for="code">College Code:</label>
			<input type="text" class="form-control" id="code" name="code" placeholder="Enter College Code here." value="{{ isset($item->code) ? $item->code : Input::old('code') }}" required>	
		</div>
		<div class="form-group">
			<label for="name">College Name:</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter College Name here." value="{{ isset($item->name) ? $item->name : Input::old('name') }}">	
		</div>
		<a class="btn btn-default" href="/admin/colleges">Cancel</a> 
		<button type="submit" class="btn btn-primary">Submit</button>
		{{ Form::close() }}
@stop