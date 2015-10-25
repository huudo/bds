<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    public function scopeIsPublish($query){
        return $query->where('status', 2);
    }
    
    public function langs(){
        return $this->belongsToMany('App\Model\Language', 'post_desc', 'post_id', 'lang_id')->withPivot('name', 'slug', 'excerpt', 'content', 'custom');
    }
    
    public function current_langs(){
        return $this->langs()->where('lang_id', current_lang());
    }
    
    public function cats(){
        return $this->belongsToMany('App\Model\Tax', 'tax_post', 'post_id', 'tax_id')->where('type', 'cat');
    }
    
    public function tags(){
        return $this->belongsToMany('App\Model\Tax', 'tax_post', 'post_id', 'tax_id')->where('type', 'tag');
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
