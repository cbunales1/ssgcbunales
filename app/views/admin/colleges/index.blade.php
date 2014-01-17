@extends('layouts.backend')
	
@section('content')
	@include('partials.alerts')

	<h1><b>Colleges</b> <a href="/admin/colleges/create" class="btn btn-primary">Add New</a></h1>
	<hr>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Colleges Code</th>
				<th>Colleges</th>
				<th width="20%">Actions</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($items) && count($items) > 0 )
				@foreach($items as $i)
				<tr>
					<td><a href="/admin/colleges/{{$i->id}}/edit">{{$i->code}}</a></td>
					<td>{{ $i->name }}</td>
					<td>
					    {{ Form::open(array('url' => '/admin/colleges/'. $i->id, 'method'=>'DELETE')) }}
					        <a href="/admin/colleges/{{$i->id}}/edit" class="btn btn-default btn-xs">Edit</a>
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