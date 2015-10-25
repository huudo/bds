<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model {

    protected $table = 'taxs';

    public function langs() {
        return $this->belongsToMany('App\Model\Language', 'tax_desc', 'tax_id', 'lang_id')->withPivot('name', 'slug', 'description');
    }
    
    public function getName(){
        $item = $this->langs()->where('code', current_lang())->first(['id']);
        return ($item) ? $item->pivot->name : null;
    }
    
    public function getTax(){
        
    }

    public function prent() {
        return $this->belongsTo('App\Model\Tax', 'parent');
    }

    public function childs() {
        return $this->hasMany('App\Model\Tax', 'parent', 'id');
    }

    public function has_child() {
        if (count($this->childs) == 0) {
            return false;
        }
        return true;
    }

    public function has_parent() {
        if ($this->parent > 0) {
            return true;
        }
        return false;
    }

    public function all_childs() {
        $result = [];
        if ($this->has_child()) {
            $childs = $this->childs;
            $result = array_merge((array) $result, (array) $childs);
            foreach ($childs as $item) {
                $item->all_childs();
            }
        }
        return $result;
    }

    public function all_ids() {
        $result = [$this->id];
        if ($this->has_child()) {
            $childs = $this->childs()->get(['id']);
            foreach ($childs as $item) {
                $result[] = $item->id;
                $item->all_ids();
            }
        }
        return $result;
    }

    public function getParent($field) {
        $item = $this->prent()->first(['id']);
        if (is_null($item)) {
            return 'none';
        }
        return $item->langs()->where('code', current_lang())->first(['id'])->pivot->$field;
    }

    public function posts() {
        return $this->belongsToMany('App\Model\Post', 'tax_post', 'tax_id', 'post_id');
    }

    public function has_posts() {
        if (count($this->posts) > 0) {
            return true;
        }
        return false;
    }

    public function all_posts() {
        $result = $this->posts;
        $childs = $this->all_childs();
        foreach ($childs as $item) {
            $result = array_merge((array) $result, (array) $item->posts);
        }
        return $result;
    }
    
    public function subposts(){
        return $this->posts();
    }

    public function menus() {
        return $this->hasMany('App\Model\Menu', 'id');
    }

    public function slides() {
        return $this->hasMany('App\Model\Slide', 'id');
    }

    public function banners() {
        return $this->belongsToMany('App\Model\Banner', 'tax_banner', 'tax_id', 'banner_id');
    }

    public function hotels(){
        return $this->morphedByMany('App\Model\Hotel', 'tax', 'hotel_conv', 'object_id', 'tax_id');
    }
    
    public function rooms(){
        return $this->morphedByMany('App\Model\Room', 'tax', 'hotel_conv', 'object_id', 'tax_id');
    }
}
