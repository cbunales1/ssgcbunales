<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.png">
 
    <title>SSG Elections System - User</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('packages/dist/css/bootstrap.css') }}
    {{ HTML::style('assets/css/backend.css') }}
    {{ HTML::script('assets/js/jquery.js') }}
  </head>

  <body>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle disabled" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SSG Elections System - User</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav disabled">
            <li><a href="#" class="disabled">Dashboard</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li class="dropdown disabled">
          	  <a href="#" class="dropdown-toggle disabled" data-toggle="dropdown">Sem Code: <span class="label label-info">{{ Semester::where('current', '=', '1')->pluck('code')}}</span></a>
          	</li>
          	<li class="dropdown">
          	  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://lorempixel.com/15/15">  
                  	 @if(Auth::user())
                  	    {{  ucwords(Auth::user()->firstname)  }}
                  	    <span class="label label-globe"></span>
                  	 @else
                  	    Login pls..
                  	 @endif
          	  <b class="caret"></b></a>
          	</li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">
    	<div class="row">
    		<div class="col-lg-12">
    			@yield('content')
    		</div>
    	</div>
    </div> <!-- /container -->
    <br>
    <br>
    <hr>
   <div class="container">
 	<div class="row">
 		<div class="col-md-12 col-md-offset-4">
 			@include('layouts.footer')			
 		</div>
 	</div>
 </div>
 <br>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    {{ HTML::script('packages/dist/js/bootstrap.min.js') }}
  </body>
</html>
