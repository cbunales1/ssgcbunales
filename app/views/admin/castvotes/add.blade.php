@extends('layouts.userbackend')

@section('content')
    @include('partials.alerts')
    <div id="content">
     {{ Form::open(array('url'=>'/castvotes')) }}
     <button type="reset" class="btn btn-sm btn-danger pull-right">Reset</button>
      <h2>Sample Ballot</h2>
      <hr>
     
     
        @foreach($data as $position)
         <h3> {{ $position->code }} </h3>
         <div class="container">
          <div class="row">
            <ol>
                  @foreach($position->candidates as $candidate)
                    
                    <div class="col-md-7 col-md-offset-2 col-sm-10 col-xs-10">
                     <li> <h5> {{ $candidate->lastname.', '.$candidate->firstname.' '.$candidate->middlename }} </h5>
                      <h5> {{ $candidate->partylist }} </h5> </li>
                    </div>
                    @if($position->num_winner > 1)
                    <div class="col-md-3 col-sm-2 col-xs-2 pm" data-max="{{$position->num_winner}}" > 
                       <div class="checkbox">
                	     <input type="checkbox" name="{{ $position->id }}[]" id="checkbox" value="{{ $candidate->id }}">
                	  </div>  
                	</div><br><br>
                    @else
                    <div class="col-md-3 col-sm-2 col-xs-2">
                      <div class="radio">
                        <input type="radio" name="{{ $position->id }}" id="selectradio" value="{{ $candidate->id }}">
                	  </div>
                	</div><br><br>
                    @endif
                    
                  @endforeach
            </ol>
         </div><br><br>
         </div>
         
         <hr>
       @endforeach
       <div class="row">
             <button type="reset" class="btn btn-sm btn-danger pull-right">Reset</button>
       </div>
       <div class="well col-md-6 col-md-offset-3">
        	<button type="submit" href="/logout" class="btn btn-lg btn-warning btn-block">
        		Cast Votes
        	</button>	
        </div>
    
        {{ Form::close() }}
        </div>
<script>
    $(document).ready(function(){
        var limit = $('.pm').data('max');
        $('input[type=checkbox]').on('change', function() {
            var numcheck = $('#content input[type=checkbox]:checked').length;
                if(numcheck >= limit){
                    $('#content input[type=checkbox]').not(':checked').attr('disabled', true);
                }
                else {
                    $('#content input[type=checkbox]').not(':checked').attr('disabled', false);
                }
        });
        $('button[type=submit]').on('click', function() {
            var r=confirm("Are you sure?");
                if (r==true)
                  {
                  return true;
                  }
                else
                  {
                  return false;
                  }
        });
    });
  
</script>

@stop