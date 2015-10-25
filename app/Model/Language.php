<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $table = 'languages';
    
    public function countries(){
        return $this->morphedByMany('App\Model\Country', 'lang', 'country_lang', 'lang_id', 'contry_id')->withPivot('name', 'slug');
    }
    public function provinces(){
        return $this->morphedByMany('App\Model\Province', 'lang', 'country_lang', 'lang_id', 'contry_id')->withPivot('name', 'slug');
    }
    
    public function taxs(){
        return $this->belongsToMany('App\Model\Tax', 'tax_desc', 'lang_id', 'tax_id')->withPivot('name', 'slug', 'description');
    }
    
    public function posts(){
        return $this->belongsToMany('App\Model\Post', 'post_desc', 'lang_id', 'post_id')->withPivot('name', 'slug', 'excerpt', 'content', 'custom');
    }
    
    public function menus(){
        return $this->belongsToMany('App\Model\Menu', 'menu_desc', 'lang_id', 'menu_id')->withPivot('name', 'slug', 'link');
    }
    
    public function slides(){
        return $this->belongsToMany('App\Model\Language', 'slide_desc', 'lang_id', 'slide_id')->withPivot('name', 'description', 'custom');
    }
    
    public function hotels(){
        return $this->morphedByMany('App\Model\Hotel', 'lang', 'hotel_lang', 'lang_id', 'object_id')->withPivot('name', 'slug', 'content', 'note', 'address');
    }
    
    public function rooms(){
        return $this->morphToMany('App\Model\Room', 'lang', 'hotel_lang', 'lang_id', 'object_id')->withPivot('name', 'slug', 'content');
    }

    public function getPostAttribute()
    {
        $post = $this->posts()->getQuery()->orderBy('created_at', 'desc')->get();
        return $post;
    }
}
