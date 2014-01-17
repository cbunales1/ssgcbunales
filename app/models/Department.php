<?php

class Department extends BaseModel {
	protected $table = 'departments';
	
	protected $fillable = ['code', 'name'];

	public static $rules = [
		'code' => 'required',
		'name' => 'required'
	];
	
	public function store($data)
	{
	    if(isset($data['id'])) { // update
	        if(!$item = Department::findOrFail( $data['id'] )) throw new Exception('Item not found.');
	    } else { // add
	        $item = new Department;    
	    }
		
		$item->fill($data);
		
		if(!$item->validate()) throw new Exception($item->errors);
		$item->save();
		
		return true;
	}
	public static function getDepartment() {
	    
	    $departments = Department::orderBy('id', 'asc')->lists('name', 'code');
	    return $departments;
	    
	}
}
