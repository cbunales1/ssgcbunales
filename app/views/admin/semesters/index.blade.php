@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
	<h1><b>Semester Codes</b> <a href="/admin/semesters/create" class="btn btn-primary">Add New</a></h1>
	<hr>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Code</th>
				<th width="20%">Actions</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($items) && count($items) > 0 )
				@foreach($items as $i)
				<tr>
					<td><a href="/admin/semesters/{{$i->id}}/edit">{{$i->code}}</a></td>
					<td>
					    {{ Form::open(array('url' => '/admin/semesters/'. $i->id, 'method'=>'DELETE')) }}
					        <a href="/admin/semesters/{{$i->id}}/edit" class="btn btn-default btn-xs">Edit</a>
					        <button type="submit" class="btn btn-danger btn-xs">Delete</button>
					    {{ Form::close() }}
					</td>
				</tr>
				@endforeach
			@else
				<tr>
					<td colspan="2"><em>No Items yet</em></td>
				</tr>
			@endif
		</tbody>
	</table>
@stop