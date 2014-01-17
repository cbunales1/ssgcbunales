<?php

class SemesterController extends AdminController {
	
	protected $semester;

	public function __construct(Semester $semester)
	{
		$this->semester = $semester;
	}

	// /admin/semesters
	public function index()
	{
	    $items = $this->semester->orderBy('code', 'desc')->get();
		$this->layout->content = View::make('admin.semesters.index', compact('items'));
	}

	// /admin/semesters/create
	public function create()
	{
		$this->layout->content = View::make('admin.semesters.add');
	}

	// /admin/semesters  POST
	public function store()
	{
		try {
			$this->semester->store(Input::all());
			
			return Redirect::to('/admin/semesters')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/semesters/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->semester->findOrFail($id);
	        $this->layout->content = View::make('admin.semesters.add')->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/admin/semesters')->with('err', 'Not found.');
	    }
	}
	
	// /admin/semesters/:id POST
    public function update()
    {
        try {
            $this->semester->store(Input::all());
            
            return Redirect::to('/admin/semesters')->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/semesters/:id DELETE
    public function destroy($id)
    {
        try {
            $this->semester->findOrFail($id)->delete();
            
            return Redirect::to('/admin/semesters')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}