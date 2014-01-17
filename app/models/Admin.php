<?php

class Admin extends BaseModel {
	protected $table = 'users';
	
	protected $fillable = ['code', 'lastname', 'firstname', 'middlename', 'generatedpassword', 'year', 'college'];

	public static $rules = [
		'code' => 'required',
		'lastname' => 'required',
		'firstname' => 'required',
		'middlename' => 'required',
		'generatedpassword' => 'required',

	];
	
	public function store($data)
	{
	    if(isset($data['id'])) { // update
	        if(!$item = Admin::findOrFail( $data['id'] )) throw new Exception('Item not found.');
	    } else { // add
	        $item = new Admin;    
	    }
		$input = Input::all();
		
		$item->fill($data);
		$item->role= 'admin';
		$password = $input['generatedpassword'];
		$password = Hash::make($password);
		$item->password = $password;
		if(!$item->validate()) throw new Exception($item->errors);
		$item->save();
		
		return true;
	}

}
