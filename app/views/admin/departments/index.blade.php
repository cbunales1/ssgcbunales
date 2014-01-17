@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
	<h1><b>Departments</b> <a href="/admin/departments/create" class="btn btn-primary">Add New</a></h1>
	<hr>
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>Code</th>
				<th>Name</th>
				<th width="20%">Actions</th>
			</tr>
		</thead>
		<tbody>
			@if(isset($items) && count($items) > 0 )
				@foreach($items as $i)
				<tr>
					<td><a href="/admin/departments/{{$i->id}}/edit">{{$i->code}}</a></td>
					<td>{{$i->name}}</td>
					<td>
					    {{ Form::open(array('url' => '/admin/departments/'. $i->id, 'method'=>'DELETE')) }}
					        <a href="/admin/departments/{{$i->id}}/edit" class="btn btn-default btn-xs">Edit</a>
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
	<div class="col-md-offset-5 col-sm-offset-5 col-lg-offset-5">
    	@if($items)
    		{{ $items->links() }}
    	@endif
    </div>
@stop