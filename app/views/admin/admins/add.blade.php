@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
    @if (!isset($item->id))
	    <h2>Add New Admin</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/admins')) }}
	@else
	    <h2>Edit Admins</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/admins/' . $item->id, 'method' => 'PUT' )) }}
	    {{ Form::hidden('id', $item->id) }}
	@endif
	
		<div class="form-group">
		    <label for="code">Username:</label>
		    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Your Username here." value="{{ isset($item->code) ? $item->code : Input::old('code') }}" required>
		</div>
		<div class="form-group">
		    <label for="lastname">Lastname:</label>
		    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Your Lastname here." value="{{ isset($item->lastname) ? $item->lastname : Input::old('lastname') }}">
		</div>
		<div class="form-group">
		    <label for="firstname">Firstname:</label>
		    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter Your Firstname here." value="{{ isset($item->firstname) ? $item->firstname : Input::old('firstname') }}">
		</div>
		<div class="form-group">
		    <label for="middlename">Middlename:</label>
		    <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter Your Middlename here." value="{{ isset($item->middlename) ? $item->middlename : Input::old('middlename') }}">
		</div>
		<div class="form-group">
		    <label for="generatedpassword">Generated Password:</label>
		    <input type="password" class="form-control" id="generatedpassword" name="generatedpassword" placeholder="Enter Your Generated Password here." value="{{ isset($item->generatedpassword) ? $item->generatedpassword : Input::old('generatedpassword') }}">
		</div>
	  	<hr>
		<a class="btn btn-default" href="/admin/admins">Cancel</a> 
		<button type="submit" class="btn btn-primary">Submit</button>
	{{ Form::close() }}
@stop