<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    
    public function hotel(){
        return $this->belongsTo('App\Model\Hotel', 'hotel_id');
    }
    
    public function getHotelName(){
        $item = $this->hotel; 
        return ($item) ? $item->getName() : null;
    }
    
    
    public function langs(){
        return $this->morphToMany('App\Model\Language', 'lang', 'hotel_lang', 'object_id', 'lang_id')->withPivot('name', 'slug', 'content');
    }
    
    public function roomtype(){
        return $this->belongsTo('App\Model\Tax', 'type_id');
    }
    
    public function getTypeName(){
        $type = $this->roomtype; 
        return ($type) ? $type->getName() : null;
    }
    
    public function price_format(){
        return price_format($this->price);
    }
    
    public function image_size($size='full'){
        return get_image_url($this->image, $size);
    }
    
    public function price_html(){
        return price_html($this->price);
    }
    
    public function convenients(){
        return $this->morphToMany('App\Model\Tax', 'tax', 'hotel_conv', 'object_id', 'tax_id');
    }
}
