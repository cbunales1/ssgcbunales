@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
    @if (!isset($item->id))
	    <h2>Add New Department</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/departments')) }}
	@else
	    <h2>Edit Department Code</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/departments/' . $item->id, 'method' => 'PUT' )) }}
	    {{ Form::hidden('id', $item->id) }}
	@endif
	
		<div class="form-group">
		    <label for="code">Department Code:</label>
		    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Department Code here." value="{{ isset($item->code) ? $item->code : Input::old('code') }}" required>
		</div>
		<div class="form-group">
		    <label for="name">Department Name:</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Department Name here." value="{{ isset($item->name) ? $item->name : Input::old('name') }}">
		</div>

		<a class="btn btn-default" href="/admin/departments">Cancel</a> 
		<button type="submit" class="btn btn-primary">Submit</button>
	{{ Form::close() }}
@stop