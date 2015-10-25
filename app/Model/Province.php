<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provincial';
    
    public function langs(){
        return $this->morphToMany('App\Model\Language', 'lang', 'country_lang', 'country_id', 'lang_id')->withPivot('name', 'slug');
    }
    
    public function getName(){
        $item = $this->langs()->where('code', current_lang())->first(['id']);
        return ($item) ? $item->pivot->name : null;
    }
    
    public function country(){
        return $this->belongsTo('App\Model\Country', 'parent');
    }
    
    public function getCountry(){
        $item = $this->country;
        return ($item) ? $item->getName() : null;
    }
}
