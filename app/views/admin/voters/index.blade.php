@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
	<h1><b>Voters List</b> <a href="/admin/voters/create" class="btn btn-info">Add New</a> <a href="/admin/search/voters" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-search"></span> Search</a> </h1>
	<hr>
	<div class="table-responsive">
	<table class="table table-striped table-hover">
		<thead>
			<tr>
				<th>ID Number</th>
				<th>Lastname</th>
				<th>Firstname</th>
				<th>Middlename</th>
				<th>Generated Password</th>
				<th>Departments</th>
				<th>Year</th>
				<th>College</th>
				<th>Voted</th>
				<th width="20%">Actions</th>
			</tr>
		</thead>
		<tbody>
		<div class="col-md-12 col-xs-12 col-sm-12">
			@if(isset($items) && count($items) > 0 )
				@foreach($items as $i)
				<tr>
					<td><a href="/admin/voters/{{$i->id}}/edit">{{$i->code}}</a></td>
					<td>{{ $i->lastname }}</td>
					<td>{{ $i->firstname }}</td>
					<td>{{ $i->middlename }}</td>
					<td>{{ $i->generatedpassword }}</td>
					<td>{{ $i->departments }} </td>
					<td>{{ $i->year }}</td>
					<td>{{ $i->college }}</td>
					<td>
					    @if($i->active == 1)
					       <div class="glyphicon glyphicon-star" style="color:#007208"></div>
					   @else
					       <div class="glyphicon glyphicon-star-empty" style="color:#c8c8c8"></div> 
					    @endif
					</td>
					<td>
					    {{ Form::open(array('url' => '/admin/voters/'. $i->id, 'method'=>'DELETE')) }}
					        <a href="/admin/voters/{{$i->id}}/edit" class="btn btn-default btn-xs">Edit</a>
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
			</div>
		</tbody>
	</table>
	</div>
    <div class="col-md-offset-5 col-sm-offset-5 col-lg-offset-5">
    	@if($items)
    		{{ $items->links() }}
    	@endif
    </div>
@stop