<?php

class Voter extends BaseModel {
	protected $table = 'users';
	
	protected $fillable = ['code', 'lastname', 'firstname', 'middlename', 'generatedpassword','departments', 'year', 'college'];

	public static $rules = [
		'code' => 'required',
		'lastname' => 'required',
		'firstname' => 'required',
		'middlename' => 'required',
		'generatedpassword' => 'required',
		'departments' => 'required',
		'year' => 'required',
		'college' => 'required'
	];
	
	public function store($data)
	{
	    if(isset($data['id'])) { // update
	        if(!$item = Voter::findOrFail( $data['id'] )) throw new Exception('Item not found.');
	    } else { // add
	        $item = new Voter;    
	    }
		$input = Input::all();
		
		$item->fill($data);
		$item->role= 'voter';
		$password = $input['generatedpassword'];
		$password = Hash::make($password);
		$item->password = $password;
		if(!$item->validate()) throw new Exception($item->errors);
		$item->save();
		
		return true;
	}
	public static function getVoter()
	{
	    $voters = Voter::all();

	}
	public static function getSearch()
	{
	     //if we got something through $_POST
            if (isset($_POST['search'])) {
                // here you would normally include some database connection
                include('ssgdb.php');
                $ssgdb = new ssgdb();
                // never trust what user wrote! We must ALWAYS sanitize user input
                $word = mysql_real_escape_string($_POST['search']);
                $word = htmlentities($word);
                // build your search query to the database
                $sql = "SELECT * FROM users WHERE lastname LIKE '%" . $word . "%' ORDER BY title LIMIT 10";
                // get results
                $row = $ssgdb->select_list($sql);
                if(count($row)) {
                    $end_result = '';
                    foreach($row as $r) {
                        $result         = $r['title'];
                        // we will use this to bold the search word in result
                        $bold           = '<span class="found">' . $word . '</span>';    
                        $end_result     .= '<li>' . str_ireplace($word, $bold, $result) . '</li>';            
                    }
                    return $end_result;
                } else {
                    return '<li>No results found</li>';
                }
            }
	}
}
