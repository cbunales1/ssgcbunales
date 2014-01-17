<?php

class Photo extends BaseModel {
    
    public function user()
    {
        return $this->belongsTo('User');     
    }
    
}