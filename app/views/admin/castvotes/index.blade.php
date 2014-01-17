@extends('layouts.backend')

@section('content')
    @include('partials.alerts')
    
 
	<h1><b>Results List</b><a href="/admin/print/result" class="btn btn-default pull-right"><span class="glyphicon glyphicon-print"></span>  <b>Print</b></a></h1>
	<hr>
	<div class="panel panel-default">
	<div class="panel-heading"> <h2>SSG Election System</h2></div>
	<div class="table-responsive">
    	<table class="table table-striped table-hover " id="tableList">
    		<thead>
    			<tr>
    				<th> Position </th>
    				<th> Name </th>
    				<th> Result </th>
    			</tr>
    		</thead>
    		<tbody>
    			@if(isset($items) && count($items) > 0 )
    				@foreach($items as $i)
    				<tr>
        					<td>{{  $i->code }}</td>
        					<td>{{  $i->lastname .", ". $i->firstname }}</td>
        					<td>{{  $i->result }}</td>
    				</tr>
    				@endforeach
    			@else
    				<tr>
    					<td colspan="2"><em>No Items yet</em></td>
    				</tr>
    			@endif
    		</tbody>
    	</table>
    	</div>
	</div>
    
            
    
	
@stop