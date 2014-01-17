<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function getTest()
    {
        return View::make('test');
    }
	public function getLogin() 
	{
	    return View::make('login');
	}
    public function postLogin()
	{   
        $input = Input::all();
        $rules = array('code' => 'required','password' => 'required');
        $messages = array(
            'code.required' => 'ID Number is required!',
            'password.required' => 'Password is required!'
            );
        
	    $voter = Voter::where('code','=',$input['code'])
	                    ->where('generatedpassword','=',$input['password'])
	                    ->where('active','=', 0)
	                    ->where('role','=','voter')
	                    ->first();
	    $admin = Voter::where('code','=',$input['code'])
	                    ->where('generatedpassword','=',$input['password'])
	                    ->where('role','=', 'admin')
	                    ->first();
	    $active = Voter::where('code','=',$input['code'])
	                    ->where('generatedpassword','=',$input['password'])
	                    ->where('active','=', 1)
	                    ->where('role','=','voter')
	                    ->first();
	                    
	   $v= Validator::make($input,$rules,$messages);
	   if($v->fails()) {
	       return Redirect::to('login')->withErrors($v);
	   }
	   else {
	    if(Auth::attempt(array('code' => $input['code'], 'password' => $input['password'] )))
	    {   
	        if(isset($voter)) { 
	          
	           Voter::where('code', '=', $input['code'])->update(array('active' => 1));
	                return Redirect::to('/castvotes/create')
	                    ->with('msg','You are successfully Login!');
	             
	        }
	        elseif(isset($admin)) {
	             return Redirect::to('/admin/login');
	        }
	        elseif(isset($active)) {
	            return Redirect::to('login')->with('err','You already cast your Votes!');
	        }
	        
	   }
	    
	    
	    else {
            return Redirect::to('login')->with('err','Combination of Id number and Password Error!');

	    }
	   }
	}
	
	public function getLogout()
	{
	    Auth::logout();
	    return Redirect::to('login')->with('msg', 'You are succesfully Logout! Thanks for voting!');
	}
	
	public function admingetLogin() 
	{
	    return View::make('admin/login');
	}
    public function adminpostLogin()
	{   
	    $input = Input::all();
        $rules = array('code' => 'required','password' => 'required');
        $messages = array(
            'code.required' => 'Username is required!',
            'password.required' => 'Password is required!'
            );
        
	    $voter = Voter::where('code','=',$input['code'])
	                    ->where('generatedpassword','=',$input['password'])
	                    ->where('active','=', 0)
	                    ->where('role','=','voter')
	                    ->first();
	    $admin = Voter::where('code','=',$input['code'])
	                    ->where('generatedpassword','=',$input['password'])
	                    ->where('role','=', 'admin')
	                    ->first();
	    $active = Voter::where('code','=',$input['code'])
	                    ->where('generatedpassword','=',$input['password'])
	                    ->where('active','=', 1)
	                    ->where('role','=','voter')
	                    ->first();
	                    
	   $v= Validator::make($input,$rules,$messages);
	   if($v->fails()) {
	       return Redirect::to('login')->withErrors($v);
	   }
	   else {
	    if(Auth::attempt(array('code' => $input['code'], 'password' => $input['password'] )))
	    {   
	        if(isset($admin)) { 
	          
	            return Redirect::to('admin')->with('msg','Your an admin! You are successfully Login!');
	             
	        }
	  }
	    
	    
	    else {
            return Redirect::to('login')->with('err','Combination of Id number and Password Error!');

	    }
	   }
	}
	
	public function admingetLogout()
	{
	    Auth::logout();
	    return Redirect::to('/admin/login');
	}
	
	public function getSearch()
	{
	    $name = Input::get('search'); 
        $searchResult = User::where('lastname', '=', $name)
                             ->orWhere('firstname','=',$name)
                             ->orWhere('middlename','=',$name)
                             ->orWhere('departments','=',$name)
                             ->orWhere('code','=',$name)
                             ->having('role', '=', 'voter')
                             ->get(); 
                return View::make('admin.voters.search') 
                ->with('name', $name) 
                ->with('searchResult', $searchResult); 
	}
	
	public function getWipedata()
	{
	    
	    DB::table('colleges')->truncate();
	   // DB::table('candidates')->truncate();
	   // DB::table('castvotes')->truncate();
	   // DB::table('departments')->truncate();
	   // DB::table('partylists')->truncate();
	   // DB::table('positions')->truncate();
	   // DB::table('semesters')->truncate();
	   // DB::table('users')->truncate();
	    return Redirect::to('admin')->with('msg','Data is Wiped Successfully!');
	}
	public function getPrint()
	{
	    $items =  Castvote::getResult();
	    return View::make('admin.print', compact('items'));
	}
	
	
}