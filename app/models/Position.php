<?php

class Position extends BaseModel {
	protected $table = 'positions';
	
	protected $fillable = ['code', 'name', 'num_winner','college_id','year', 'order'];

	public static $rules = [
		'code' => 'required',
		'name' => 'required',
		'num_winner' => 'required',
		'college_id' => 'required',
		'year' => 'required',
		'order' => 'required'
	];
	public function candidates()
	{
	    return $this->hasMany('Candidate');
	}
	
	public function store($data)
	{
	    if(isset($data['id'])) { // update
	        if(!$item = Position::findOrFail( $data['id'] )) throw new Exception('Item not found.');
	    } else { // add
	        $item = new Position;    
	    }
		
		$item->fill($data);
		
		if(!$item->validate()) throw new Exception($item->errors);
		$item->save();
		
		return true;
	}
	public static function getPosition()
	{
	    $positions = Position::orderBy('order', 'asc')->lists('code', 'id');
	    //prepend nga una kay none
	    return $positions;
	}
}
