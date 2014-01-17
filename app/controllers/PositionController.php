<?php

class PositionController extends AdminController {
	
	protected $position;

	public function __construct(Position $position)
	{
		$this->position = $position;
	}

	// /admin/positions
	public function index()
	{
	    $items = $this->position->orderBy('order', 'asc')->paginate(15);
		$this->layout->content = View::make('admin.positions.index', compact('items'));
	}

	// /admin/positions/create
	public function create()
	{   
	    $colleges=College::getCollege();
		$this->layout->content = View::make('admin.positions.add', compact('colleges'));
	}

	// /admin/positions  POST
	public function store()
	{
		try {
			$this->position->store(Input::all());
			
			return Redirect::to('/admin/positions')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/positions/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->position->findOrFail($id);
	        $colleges=College::getCollege();
	        $this->layout->content = View::make('admin.positions.add', compact('colleges'))->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/admin/positions')->with('err', 'Not found.');
	    }
	}
	
	// /admin/positions/:id POST
    public function update()
    {
        try {
            $this->position->store(Input::all());
            
            return Redirect::to('/admin/positions')->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/positions/:id DELETE
    public function destroy($id)
    {
        try {
            $this->position->findOrFail($id)->delete();
            
            return Redirect::to('/admin/positions')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}