<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">

    <title>SSG Elections System - Administrator</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('packages/dist/css/bootstrap.css') }}
    {{ HTML::style('assets/css/backend.css') }}
  </head>
  <body>
    <div class="container">
      <div class="row">
        <h4 class="text-center"> Republic of the Philippines </h4>
        <h1 class="text-center"><b> Bohol Island State University  </b></h1>
        <h4 class="text-center"> Main Campus, Tagbilaran City </h4>
        <h1 class="text-center"><b> Result Lists </b></h1>
      </div>
      <div>
      <br>
      <div class="row">
        <table class="table table-striped" id="tableList">
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
					<td>{{ $i->result }}</td>
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
    <br>
    <div class="row" id="columnizer">
        <ul>
            <li><b>____________</b></li>
            <li><b>____________</b></li>
            <li><b>____________</b></li>
        </ul>
        <ul>
            <li><b>Administrator</b></li>
            <li><b>Comelec</b></li>
            <li><b>Sao-Coordinator</b></li>
        </ul>
    </div>
    <br><br>
    <div class="row">
        <h5>Bohol Island State University</h5>
        <h6>copyright &#169; 2014</h6>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('packages/dist/js/bootstrap.min.js') }}
  </body>
  </html>