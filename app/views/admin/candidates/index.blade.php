@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
	<h1><b>Candidates List</b> <a href="/admin/candidates/create" class="btn btn-primary">Add New</a></h1>
	<hr>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Position</th>
				<th>Partylist</th>
				<th width="20%">Actions</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($items) && count($items) > 0 )
				@foreach($items as $i)
				<tr>
					<td><a href="/admin/candidates/{{$i->id}}/edit">{{$i->lastname}}</a></td>
					<td>{{ $i->firstname }}</td>
					<td>{{ $i->middlename }}</td>
					<td>{{ $i->position->code }}</td>
					<td>{{ $i->partylist }}</td>
					<td>
					    {{ Form::open(array('url' => '/admin/candidates/'. $i->id, 'method'=>'DELETE')) }}
					        <a href="/admin/candidates/{{$i->id}}/edit" class="btn btn-default btn-xs">Edit</a>
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