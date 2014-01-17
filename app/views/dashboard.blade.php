@extends('layouts.backend')

@section('content')
     @include('partials.alerts')
    <div class="row">
            <h1 class="text-center">Hello Dashboard!<div class="col-md-1"> <p id="demo" class="box label pull-left" style="color:black"></p></div></h1>
    </div>
            <div class="row">
                <div class="col-md-3 col-lg-3">
                    <h2><span class="box label label-default">Candidate: <br>{{ Candidate::count() }}</span></h2>
                </div>
                 <div class="col-md-3 col-lg-3">
                    <h2><span class="box label label-warning">Voters: <br>{{ User::where('role', '=','voter')->count() }}</span></h2>
                </div>
                 <div class="col-md-3 col-lg-3">
                    <h2><span class="box label label-primary">Castvotes: <br>{{ Castvote::count() }}</span></h2>
                </div>
                <div class="col-md-3 col-lg-3">
                    <h2><span class="box label label-info">Semester: <br>{{ Semester::where('current', '=', '1')->pluck('code') }}</span></h2>
                </div>
            <div>

<script>
    var myVar=setInterval(function(){myTimer()},1000);
    
    function myTimer()
    {
        var d=new Date();
        var t=d.toLocaleTimeString();
        document.getElementById("demo").innerHTML=t;
    }
</script>
@stop