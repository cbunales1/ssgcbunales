<?php 

class Partylist extends BaseModel {

	protected $table = 'partylists';

	protected $fillable = ['code', 'name',];

	public static $rules = [
		'code' => 'required',
	];

	public function store($data)
	{
		if(isset($data['id'])) { // update
	        if(!$item = Partylist::findOrFail( $data['id'] )) throw new Exception('Item not found.');
	    } else { // add
	        $item = new Partylist;    
	    }

	    $item->fill($data);
		
		if(!$item->validate()) throw new Exception($item->errors);
		$item->save();
		
		return true;
	}
	public static function getPartylist()
	{
	    $partylist = Partylist::orderBy('id', 'asc')->lists('name', 'name');
	    return $partylist;
	}

}