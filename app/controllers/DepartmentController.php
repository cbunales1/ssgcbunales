<?php

class DepartmentController extends AdminController {
	
	protected $department;

	public function __construct(Department $department)
	{
		$this->department = $department;
	}

	// /admin/department
	public function index()
	{
	    $items = $this->department->orderBy('code', 'asc')->paginate(15);
		$this->layout->content = View::make('admin.departments.index', compact('items'));
	}

	// /admin/department/create
	public function create()
	{   
	    $colleges = College::getCollege();
		$this->layout->content = View::make('admin.departments.add', compact('colleges'));
	}

	// /admin/department  POST
	public function store()
	{
		try {
			$this->department->store(Input::all());
			
			return Redirect::to('/admin/departments')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/department/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->department->findOrFail($id);
	        $colleges = College::getCollege();
	        $this->layout->content = View::make('admin.departments.add', compact('colleges'))->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/admin/departments')->with('err', 'Not found.');
	    }
	}
	
	// /admin/department/:id POST
    public function update()
    {
        try {
            $this->department->store(Input::all());
            
            return Redirect::to('/admin/departments')->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/department/:id DELETE
    public function destroy($id)
    {
        try {
            $this->department->findOrFail($id)->delete();
            
            return Redirect::to('/admin/departments')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}