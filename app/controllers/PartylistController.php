<?php 

class PartylistController extends AdminController {

	protected $partylist;

	public function __construct(Partylist $partylist)
	{
		$this->partylist = $partylist;
	}

	// /admin/partylists
	public function index()
	{
	    $items = $this->partylist->orderBy('code', 'desc')->paginate(15);
		$this->layout->content = View::make('admin.partylists.index', compact('items'));
	}

	// /admin/partylists/create
	public function create()
	{
		$this->layout->content = View::make('admin.partylists.add');
	}

	// /admin/partylists  POST
	public function store()
	{
		try {
			$this->partylist->store(Input::all());
			
			return Redirect::to('/admin/partylists')->with('msg', 'Added Successfully.');
		} catch (Exception $e) {
			return Redirect::back()->withInput()->withErrors($e->getMessage());
		}
	}
	
	// /admin/partylists/:id/edit
	public function edit($id)
	{
	    try {
	        $item = $this->partylist->findOrFail($id);
	        $this->layout->content = View::make('admin.partylists.add')->with('item', $item);
	    } catch (Exception $e) {
	        return Redirect::to('/admin/partylists')->with('err', 'Not found.');
	    }
	}
	
	// /admin/partylists/:id POST
    public function update()
    {
        try {
            $this->partylist->store(Input::all());
            
            return Redirect::to('/admin/partylists')->with('msg', 'Updated Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withInput()->withErrors($e->getMessage());
        }
    }
    
    // /admin/partylists/:id DELETE
    public function destroy($id)
    {
        try {
            $this->partylist->findOrFail($id)->delete();
            
            return Redirect::to('/admin/partylists')->with('msg', 'Deleted Successfully.');
        } catch (Exception $e) {
            return Redirect::back()->withErrors($e->getMessage());
        }
    }
}