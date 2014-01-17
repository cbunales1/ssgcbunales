<?php

class CandidateController extends AdminController {
	
	protected $candidate;

	public function __construct(Candidate $candidate)
	{
		$this->candidate = $candidate;
	}
    
	// /admin/candidates
	public function index()
	{
	    $items = $this->candidate->with('position')->orderBy('position_id', 'asc')->get();
		$this->layout->content = View::make('admin.candidates.index', compact('items'));
	}

	// /admin/candidates/create
	public function create()
	{
	    //query positions
	    $partylists = Partylist::getPartylist();
	    $positions = Position::getPosition();
		$this->layout->content = View::make('admin.candidates.add', compact('positions','partylists'));
	}

	// /admin/candidates  POST
	public function store()
	{
		try {
			$this->candidate->store(Input::all());
			
			return Redirect::to('/admin/candidates')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/candidates/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->candidate->findOrFail($id);
	        $partylists = Partylist::getPartylist();
	        $positions = Position::getPosition();
	        $this->layout->content = View::make('admin.candidates.add', compact('positions', 'partylists'))->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/admin/candidates')->with('err', 'Not found.');
	    }
	}
	
	// /admin/candidates/:id POST
    public function update()
    {
        try {
            $this->candidate->store(Input::all());
            
            return Redirect::to('/admin/candidates')->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/candidates/:id DELETE
    public function destroy($id)
    {
        try {
            $this->candidate->findOrFail($id)->delete();
           
            return Redirect::to('/admin/candidates')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}