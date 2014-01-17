@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
    @if (!isset($item->id))
	    <h2>Add New Semester Code</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/semesters')) }}
	@else
	    <h2>Edit Semester Code</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/semesters/' . $item->id, 'method' => 'PUT' )) }}
	    {{ Form::hidden('id', $item->id) }}
	@endif
	
		<div class="form-group">
		    <label for="code">Semester Code:</label>
		    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Sem Code here." value="{{ isset($item->code) ? $item->code : Input::old('code') }}" required>
		</div>
		<div class="checkbox">
		    <label>
		      <input type="checkbox" name="current" value="1" > Set as Current
		    </label>
		</div>
		<a class="btn btn-default" href="/admin/semesters">Cancel</a> 
		<button type="submit" class="btn btn-primary">Submit</button>
	{{ Form::close() }}
@stop