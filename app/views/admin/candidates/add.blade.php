@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
    @if (!isset($item->id))
	    <h2>Add New Candidate</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/candidates')) }}
	@else
	    <h2>Edit candidates</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/candidates/' . $item->id, 'method' => 'PUT' )) }}
	    {{ Form::hidden('id', $item->id) }}
	@endif
	
		<div class="form-group">
		    <label for="lastname">Lastname:</label>
		    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Your Lastname here." value="{{ isset($item->lastname) ? $item->lastname : Input::old('lastname') }}" required>
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
            <label for="position_id">Position:</label>
            {{ Form::select('position_id', $positions, isset($item->position_id) ? $item->position_id : Input::old('position_id'), array('class'=> 'form-control')) }} 
        </div>
        <div class="form-group">
            <label for="partylist">Partylist:</label>
            {{ Form::select('partylist', $partylists, isset($item->partylist) ? $item->partylist : Input::old('partylist'), array('class' => 'form-control')) }} 
        </div>
	  	<hr>
		<a class="btn btn-default" href="/admin/candidates">Cancel</a> 
		<button type="submit" class="btn btn-primary">Submit</button>
	{{ Form::close() }}
@stop