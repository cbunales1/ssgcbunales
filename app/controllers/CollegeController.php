<?php

class CollegeController extends AdminController {
	
	protected $college;

	public function __construct(College $college)
	{
		$this->college = $college;
	}

	// /admin/colleges
	public function index()
	{
	    $items = $this->college->orderBy('code', 'desc')->get();
		$this->layout->content = View::make('admin.colleges.index', compact('items'));
	}

	// /admin/colleges/create
	public function create()
	{
		$this->layout->content = View::make('admin.colleges.add');
	}

	// /admin/colleges  POST
	public function store()
	{
		try {
			$this->college->store(Input::all());
			
			return Redirect::to('/admin/colleges')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/colleges/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->college->findOrFail($id);
	        $this->layout->content = View::make('admin.colleges.add')->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/admin/colleges')->with('err', 'Not found.');
	    }
	}
	
	// /admin/colleges/:id POST
    public function update()
    {
        try {
            $this->college->store(Input::all());
            
            return Redirect::to('/admin/colleges')->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/colleges/:id DELETE
    public function destroy($id)
    {
        try {
            $this->college->findOrFail($id)->delete();
            
            return Redirect::to('/admin/colleges')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}