<?php

class FormController extends AdminController{
    
        public $restful = true;
        
        public function getIndex()
        {
            $candidates_temp = Candidate::all();
            $candidates = Vote::all();
            
            if(Schema::hasTable('votes')){
                return View::make('admin.castvotes.cast', compact('candidates'));
            }
            else{
                foreach($candidates_temp as $cand){
                     DB::table('votes')->insert(array(
        				'name' => $cand->firstname,
        				'surname' => $cand->code,
        				'middlename' => $cand->middlename,
        				'position' => $cand->position,
        				'created_at' => date('Y-m-d H-m-s'),
        				'updated_at' => date('Y-m-d H-m-s')
    			    ));
                }
            }
            
            
            return View::make('admin.castvotes.cast', compact('candidates'));
            
        }
        
        public function getCastvote()
        {
            $candidates = Vote::all();

    		foreach ($candidates as $can) {
    
    			$x = $can->id;
    			$rules = array(
    						'checkbox'.$can->id => 'accepted'
    				);
    				
    			$rule = array(
    			        'radio'.$can->id => 'accepted'
    			    );
    
    			$v = Validator::make(Input::all(), $rules);
    			$v1 = Validator::make(Input::all(), $rule);
    
    			if ($v->passes()) {
    				Vote::where('id', '=', $can->id)->increment('votes');
    			}
    			elseif($v1->passes()){
    			    Vote::where('id', '=', $can->id)->increment('votes');
    			}
    		}
    
    		return Redirect::route('form')
    			->with('message', 'Success!');
        }
        
    }