<?php

class AccountController extends BaseController {

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
    protected $voter;

	public function __construct(Voter $voter)
	{
		$this->voter = $voter;
	}
	
    public function getIndex() {
        
        $items = Voter::all();
        $this->layout->content = View::make('admin.accounts.index', compact('items'));
    }


}