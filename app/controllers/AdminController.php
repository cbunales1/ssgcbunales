<?php

class AdminController extends BaseController {
    
    protected $layout = 'layouts.backend'; 
    
    public function dashboard() {
       return View::make('dashboard');
    }
    
    	public function __construct(Admin $admin)
	{
		$this->admin = $admin;
	}

	// /admin/admins
	public function index()
	{
	    $items = $this->admin->where('role', '=', 'admin' )->orderBy('role', 'asc')->get();
		$this->layout->content = View::make('admin.admins.index', compact('items'));
	}

	// /admin/admins/create
	public function create()
	{
		$this->layout->content = View::make('admin.admins.add');
	}

	// /admin/admins  POST
	public function store()
	{
		try {
			$this->admin->store(Input::all());
			
			return Redirect::to('/admin/admins')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/admins/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->admin->findOrFail($id);
	        $this->layout->content = View::make('admin.admins.add')->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/admin/admins')->with('err', 'Not found.');
	    }
	}
	
	// /admin/admins/:id POST
    public function update()
    {
        try {
            $this->admin->store(Input::all());
            
            return Redirect::to('/admin/admins')->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/admins/:id DELETE
    public function destroy($id)
    {
        try {
            $this->admin->findOrFail($id)->delete();
            
            return Redirect::to('/admin/admins')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
    
}