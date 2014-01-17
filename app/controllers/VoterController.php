<?php

class VoterController extends AdminController {
	
	protected $voter;

	public function __construct(Voter $voter)
	{
		$this->voter = $voter;
	}

	// /admin/voters
	public function index()
	{
	    $items = $this->voter->where('role','=','voter')->orderBy('code', 'asc')->paginate(15);
		$this->layout->content = View::make('admin.voters.index', compact('items'));
	}

	// /admin/voters/create
	public function create()
	{
	    $departments = Department::getDepartment();
		$this->layout->content = View::make('admin.voters.add', compact('departments'));
	}

	// /admin/voters  POST
	public function store()
	{
		try {
			$this->voter->store(Input::all());
			
			return Redirect::to('/admin/voters')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/voters/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->voter->findOrFail($id);
	        $departments = Department::getDepartment();
	        $this->layout->content = View::make('admin.voters.add',compact('departments'))->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/admin/voters')->with('err', 'Not found.');
	    }
	}
	
	// /admin/voters/:id POST
    public function update()
    {
        try {
            $this->voter->store(Input::all());
            
            return Redirect::to('/admin/voters')->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/voters/:id DELETE
    public function destroy($id)
    {
        try {
            $this->voter->findOrFail($id)->delete();
            
            return Redirect::to('/admin/voters')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
    
}