<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    
    public function langs(){
        return $this->morphToMany('App\Model\Language', 'lang', 'hotel_lang', 'object_id', 'lang_id')->withPivot('name', 'slug', 'content', 'note', 'address','rule');
    }
    
    public function getName(){
        $item = $this->langs()->where('code', current_lang())->first(['id']);
        return ($item) ? $item->pivot->name : null;
    }
    
    public function province(){
        return $this->belongsTo('App\Model\Province', 'province_id');
    }
    
    public function rooms(){
        return $this->hasMany('App\Model\Room');
    }
    
    public function convenients(){
        return $this->morphToMany('App\Model\Tax', 'tax', 'hotel_conv', 'object_id', 'tax_id');
    }

}
