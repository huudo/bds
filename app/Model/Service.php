<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    
    public function scopeIsPublish($query){
        return $query->where('status', 2);
    }
    
    public function langs(){
        return $this->belongsToMany('App\Model\Language', 'services_lang', 'service_id', 'lang_id')->withPivot('name', 'slug', 'excerpt', 'content');
    }
    
    public function current_langs(){
        return $this->langs()->where('lang_id', current_lang());
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
