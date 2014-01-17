@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
        
            
        <div class="row">    
        <form id="custom-search-form" class="form-inline col-md-12 col-sm-12 col-xs-12 pull-right" action="{{ URL::action('HomeController@getSearch') }}" method="get"> 
          <div class="form-group">
            <label class="sr-only" for="search">Search</label>
            <input type="text" class="form-control" name="search" placeholder="Search Voter...">
          </div>
           <div class="form-group">
            <label class="sr-only" for="button-submit">Button</label>
            <a type="submit" class="btn" name="search" style="margin-left:-42px"><span class="glyphicon glyphicon-search"></span></a>
          </div>
        </form> 
        </div>
        <hr>
        <div class="row" id="content">
        	@if(isset($searchResult) && count($searchResult) > 0 )
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
		
				@foreach($searchResult as $i)
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
		
			</div>
		</tbody>
	</table>
    	@else
				<tr>
					<td colspan="2"><em>No Voters yet</em></td>
				</tr>
			@endif
	</div>
    <script>
        $(document).ready(function() {

          $('#content').fadeIn(1000);
          
        });
    </script>
@stop