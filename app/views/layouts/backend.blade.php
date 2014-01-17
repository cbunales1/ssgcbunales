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
    {{ HTML::style('packages/semantic/minified/packaged/semantic.min.css') }}
    {{ HTML::style('assets/css/backend.css') }}
    {{ HTML::style('assets/css/ssgelection.css') }}
  
    
  </head>

  <body>
    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SSG Elections System - Admin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/admin">Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span> Manage <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/admins">Admins</a></li>
                <li><a href="/admin/voters">Voters</a></li>
                <li class="divider"></li>
                <li><a href="/admin/positions">Positions</a></li>
                <li><a href="/admin/candidates">Candidates</a></li>
                <li><a href="/admin/partylists">Party Lists</a></li>
                <li><a href="/admin/colleges">Colleges</a></li>
                <li><a href="/admin/departments">Departments</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> Reports <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/returns">Election Returns</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span> Settings <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/semesters">Semester Codes</a></li>
                <li class="divider"></li>
                <li><a href="#">Accounts</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-trash"></span> Utilities <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/wipedata">Wipe Data</a></li>
              </ul>
            </li>
            <li>
                
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li class="dropdown">
          	  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sem Code: <span class="label label-info">{{ Semester::where('current', '=', '1')->pluck('code')}}</span></a>
          	</li>
          	<li class="dropdown">
          	  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="http://lorempixel.com/15/15">  
                  	 @if(Auth::user())
                  	    {{  ucwords(Auth::user()->firstname)  }}
                  	 @else
                  	    Login pls..
                  	 @endif
          	  <b class="caret"></b></a>
          	  <ul class="dropdown-menu">
                <li><a href="/admin/logout"><span class="glyphicon glyphicon-log-out"></span>   Log out</a></li>
              </ul>
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

    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('packages/dist/js/bootstrap.min.js') }}
  </body>
</html>
