<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    
    public function langs(){
        return $this->belongsToMany('App\Model\Language', 'page_desc', 'page_id', 'lang_id')->withPivot('name', 'slug', 'content', 'excerpt', 'custom');
    }
    
    public function author(){
        return $this->belongsTo('App\Model\User', 'author_id');
    }
    
    public function getAuthor($field){
        $item = $this->author()->first([$field]);
        if($item){
            return $item->$field;
        }
        return 'none';
    }
}
