<?php

class Semester extends BaseModel {
	protected $table = 'semesters';
	
	protected $fillable = ['code', 'current'];

	public static $rules = [
		'code' => 'required',
	];
	
	
	public function store($data)
	{
	    if(isset($data['id'])) { // update
	        if(!$item = Semester::findOrFail( $data['id'] )) throw new Exception('Item not found.');
	    } else { // add
	        $item = new Semester;    
	    }
		
		$item->fill($data);
		
		if(!$item->validate()) throw new Exception($item->errors);
		$item->save();
		
		return true;
	}
}
