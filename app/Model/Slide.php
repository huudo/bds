<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slides';
    
    public function group(){
        return $this->belongsTo('App\Model\Tax', 'group_id');
    }
    
    public function getGroup($field){
        $item = $this->group()->first([$field]);
        if($item){
            return $item->$field;
        }
        return 'none';
    }
    
    public function groupName(){
        return $this->getGroup('dfname');
    }
    
    public function langs(){
        return $this->belongsToMany('App\Model\Language', 'slide_desc', 'slide_id', 'lang_id')->withPivot('name', 'description', 'custom');
    }
}
