<?php

class ReturnController extends AdminController {
	

	// /admin/results
	public function getIndex()
	{
	    $items =  Castvote::getResult();
		$this->layout->content = View::make('admin.castvotes.index', compact('items'));
		
	}
	public function getWinner()
	{
	    // Winner sa Form....
	    
	}

}