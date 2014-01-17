@if (isset($errors) && count($errors) > 0 )
    <h5><div class="alert alert-danger">{{ $errors }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></h5>
@endif
@if (Session::has('err'))
    <h5><div class="alert alert-danger">{{ Session::get('err') }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></h5>
@endif
@if (isset($messages) && count($messages) > 0) 
    <h5><div class="alert alert-info">{{ $messages }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div></h5>
@endif
@if (Session::has('msg'))
    <h5><div class="alert alert-success">{{ Session::get('msg') }} <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></div><h5>
@endif