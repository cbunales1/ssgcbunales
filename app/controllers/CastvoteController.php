<?php

class CastvoteController extends FrontController {
	
	protected $castvote;

	public function __construct(Castvote $castvote)
	{
		$this->castvote = $castvote;
	}
    
	// /admin/castvotes
	public function index()
	{
	    $items =  Castvote::getResult();
		$this->layout->content = View::make('admin.castvotes.index', compact('items'));
        return Redirect::to('logout');
/*		$data = Castvote::getBallot();
		$this->layout->content = View::make('admin.castvotes.add', compact('data'));*/
	}

	// /admin/castvotes/create
	public function create()
	{
	    $data = Castvote::getBallot();
		$this->layout->content = View::make('admin.castvotes.add', compact('data'));
		
	/*	return Redirect::to('/login')->with('msg','Thanks For Voting!');*/
	}

	// /admin/castvotes  POST
	public function store()
	{
		try {

			$this->castvote->store(Input::all());
			
			return Redirect::to('/castvotes')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/castvotes/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->castvote->findOrFail($id);
	        $this->layout->content = View::make('admin.castvotes.add')->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/castvotes')->with('err', 'Not found.');
	    }
	}
	
	// /admin/castvotes/:id POST
    public function update()
    {
        try {
            $this->castvote->store(Input::all());
            
            $candidates = Candidate::all();
            return Redirect::to('/castvotes', compact('candidates'))->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/castvotes/:id DELETE
    public function destroy($id)
    {
        try {
            $this->castvote->findOrFail($id)->delete();
            
            return Redirect::to('/castvotes')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}