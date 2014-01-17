@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
    @if (!isset($item->id))
	    <h2>Add New Voters</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/voters')) }}
	@else
	    <h2>Edit Voters</h2>
	    <hr>
	    {{ Form::open(array('url'=>'/admin/voters/' . $item->id, 'method' => 'PUT' )) }}
	    {{ Form::hidden('id', $item->id) }}
	@endif
	
		<div class="form-group">
		    <label for="code">ID Number:</label>
		    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Your ID # here." value="{{ isset($item->code) ? $item->code : Input::old('code') }}" required>
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
		<div class="form-group">
            <label for="departments">Department:</label>
            {{ Form::select('departments', $departments, isset($item->departments) ? $item->departments : Input::old('departments'), array('class' => 'form-control')) }} 
        </div>
		<div class="form-group">
  			<label for="year">Year:</label>
  			<select class="form-control" id="year" name="year" placeholder="Enter Your Year here." value="{{ isset($item->year) ? $item->year : Input::old('year') }}">
			  	<option>1st-Year</option>
  				<option>2nd-Year</option>
  				<option>3rd-Year</option>
  				<option>4th-Year</option>
  				<option>5th-Year</option>
			</select>
  		</div>
		<div class="form-group">
  			<label for="college">College:</label>
  			<select class="form-control" id="college" name="college" placeholder="Enter Your College here" value="{{ isset($item->college) ? $item->college : Input::old('college') }}">
			  	<option>CEA</option>
  				<option>CTE</option>
  				<option>CTAS</option>
  				<option>CBAS</option>
			</select>	
	  	</div>
	  	<hr>
		<a class="btn btn-default" href="/admin/voters">Cancel</a> 
		<button type="submit" class="btn btn-primary">Submit</button>
	{{ Form::close() }}
@stop