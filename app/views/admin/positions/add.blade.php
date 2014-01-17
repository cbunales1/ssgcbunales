@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
    @if (!isset($item->id))
	    <h2>Add New Position</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/positions')) }}
	@else
	    <h2>Edit Position</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/positions/' . $item->id, 'method' => 'PUT' )) }}
	    {{ Form::hidden('id', $item->id) }}
	@endif
	
		<div class="form-group">
		    <label for="code">Position Code:</label>
		    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Position Code here." value="{{ isset($item->code) ? $item->code : Input::old('code') }}" required>
		</div>
		<div class="form-group">
		    <label for="name">Position Name:</label>
		    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Position Name here." value="{{ isset($item->name) ? $item->name : Input::old('name') }}">
		</div>
		<div class="form-group">
		    <label for="num_winner">Number of possible winners:</label>
		    <input type="number" class="form-control" id="num_winner" name="num_winner" placeholder="Maximum Number of Winners" value="{{ isset($item->num_winner) ? $item->num_winner : Input::old('num_winner') }}" required>
		</div>
		<div class="form-group">
		    <label for="order">Position Order:</label>
		    <input type="number" class="form-control" id="order" name="order" placeholder="Order of the Position" value="{{ isset($item->order) ? $item->order : Input::old('order') }}" required>
		</div>
		<div class="form-group">
            <label for="college_id">College:</label>
            {{ Form::select('college_id', $colleges, isset($item->college_id) ? $item->college_id : Input::old('college_id'), array('class'=> 'form-control')) }} 
        </div>
		<div class="form-group">
  			<label for="year">Year:</label>
  			<select class="form-control" id="year" name="year" placeholder="Enter Your Year here." value="{{ isset($item->year) ? $item->year : Input::old('year') }}">
			  	<option>All</option>
			  	<option>1st-Year</option>
  				<option>2nd-Year</option>
  				<option>3rd-Year</option>
  				<option>4th-Year</option>
  				<option>5th-Year</option>
			</select>
  		</div>
  		
		<a class="btn btn-default" href="/admin/positions">Cancel</a> 
		<button type="submit" class="btn btn-primary">Submit</button>
	{{ Form::close() }}
@stop