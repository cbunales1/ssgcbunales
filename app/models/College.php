<?php

class College extends BaseModel {
	protected $table = 'colleges';
	
	protected $fillable = ['code', 'name'];

	public static $rules = [
		'code' => 'required',
		'name' => 'required'
	];
	
	public function store($data)
	{
	    if(isset($data['id'])) { // update
	        if(!$item = College::findOrFail( $data['id'] )) throw new Exception('Item not found.');
	    } else { // add
	        $item = new College;    
	    }
		
		$item->fill($data);
		
		if(!$item->validate()) throw new Exception($item->errors);
		$item->save();
		
		return true;
	}
	public static function getCollege()
	{
	    $colleges = College::orderBy('id', 'asc')->lists('code', 'name');
	    $colleges= array('0' => 'All') + $colleges;
	    return $colleges;
	}
}
