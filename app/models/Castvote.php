<?php

class Castvote extends BaseModel {
    
    protected $table = 'castvotes';
    
    protected $fillable = ['position_id', 'candidate_id'];
    
    public static $rules = [
		'position_id' => 'required',
    	'candidate_id' => 'required'
	];
    
    public function store($inputs)
	{		   
	    $data = [];
		        foreach($inputs as $k => $v) {
		            if($k == '_token') continue;
        		      if(is_array($v)) {
        		        foreach($v as $vv) {
    		              $data[] = array(
    		                    'position_id'=> $k,
    		                    'candidate_id'=> $vv
    		                    );    
        		                           }    
        		                        } 
        		      else {
    		              $data[] = array(
    		                  'position_id'=> $k,
    		                  'candidate_id'=> $v
    		                  );
        		           }
		        }
		        
		  
		  $data = DB::table('castvotes')->insert($data);
		  return true;
	}
	public static function orderPositon()
	{
	  $data = DB::table('positions')
	        ->leftJoin('candidates','positions.id', '=', 'candidates.position_id')
	        ->orderBy('positions.order')
	        ->get();    
	}

	public static function getBallot()
	{
	    $data = Position::with('candidates')->orderBy('order')->get();
        return $data;
	}
	
	public static function getResult()
	{
	     $sql = 'SELECT pos.code, can.lastname, can.firstname, count(res.candidate_id) as result
                FROM ssg_castvotes as res 
                LEFT JOIN ssg_positions as pos ON res.position_id = pos.id
                LEFT JOIN ssg_candidates as can ON res.candidate_id = can.id
                WHERE res.candidate_id != 0
                GROUP BY candidate_id
                ORDER BY pos.order, result desc';
	                
	            $query = DB::select($sql);
            return $query;

	}
}


