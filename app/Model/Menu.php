<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    
    public function langs(){
        return $this->belongsToMany('App\Model\Language', 'menu_desc', 'menu_id', 'lang_id')->withPivot('name', 'slug', 'link');
    }
}
