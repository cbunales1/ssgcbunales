<?php

class Candidate extends BaseModel {
	protected $table = 'candidates';

	protected $fillable = ['lastname', 'firstname', 'middlename', 'position_id', 'partylist'];

	public static $rules = [
		'lastname' => 'required',
		'firstname' => 'required',
		'middlename' => 'required',
		'position_id' => 'required',
		'partylist' => 'required'
	];
	public function position()
	{
	    return $this->belongsTo('Position');
	}
	
	
	public function store($data)
	{
	    if(isset($data['id'])) { // update
	        if(!$item = Candidate::findOrFail( $data['id'] )) throw new Exception('Item not found.');
	    } else { // add
	        $item = new Candidate;    
	    }
		
		$item->fill($data);
		
		if(!$item->validate()) throw new Exception($item->errors);
		$item->save();
		
		return true;
	}
}
