@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
	<h1><b>Accounts List</b> <a href="/admin/admins/create" class="btn btn-success">Add New</a></h1>
	<hr>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID Number/Username</th>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Role</th>
				<th>Year</th>
				<th>Department</th>
				<th>Active</th>
				<th width="20%">Actions</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($items) && count($items) > 0 )
				@foreach($items as $i)
				<tr>
					<td><a href="/admin/admins/{{$i->id}}/edit">{{$i->code}}</a></td>
					<td>{{ $i->lastname }}</td>
					<td>{{ $i->firstname }}</td>
					<td>{{ $i->middlename }}</td>
					<td>{{ $i->role }}</td>
					<td>{{ $i->year }}</td>
					<td>{{ $i->departments }}</td>
					<td>{{ $i->active }}</td>
					<td>
					    {{ Form::open(array('url' => '/admin/admins/'. $i->id, 'method'=>'DELETE')) }}
					        <a href="/admin/admins/{{$i->id}}/edit" class="btn btn-default btn-xs">Edit</a>
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