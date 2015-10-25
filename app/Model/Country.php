<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

class Country extends Model
{
    protected $table = 'countries';
    
    public function langs(){
        return $this->morphToMany('App\Model\Language', 'lang', 'country_lang', 'country_id', 'lang_id')->withPivot('name', 'slug');
    }
    
    public function getName(){
        $item = $this->langs()->where('code', current_lang())->first(['id']);
        return ($item) ? $item->pivot->name : null;
    }
    
    public function provinces(){
        return $this->hasMany('App\Model\Province', 'parent');
    }

    public function getcountry(){
        $country =  DB::table('countries as c')
                    ->join('country_lang as cl', 'cl.country_id', '=', 'c.id')
                    ->where( 'cl.lang_id',current_lang_id() )
                    ->where( 'cl.lang_type','App\Model\Country' )
                    ->select('cl.name', 'cl.country_id', 'cl.country_lang_id','cl.lang_type')
                    ->get(); 
        /*foreach ($country as $key => $value) {
            foreach ($city as $i => $v) {
                if( $v->parent == $key ){dump($v);
                    $country[$key]->city->append($v->name);
                }
            } 
        }
        dump($country);*/
        return $country;
    }

    public function getCity(){
        $city   =  DB::table('provincial as p')
                    ->join('country_lang as cl', 'cl.country_id', '=', 'p.id')
                    ->where( 'cl.lang_id',current_lang_id() )
                    ->where( 'cl.lang_type','App\Model\Province' )
                    ->select('p.id','p.parent','cl.name', 'cl.country_id', 'cl.country_lang_id','cl.lang_type')
                    ->get();
        return $city;
    }



    public function getHotel( $city_id ){
        $city   =  DB::table('hotels as h')
                    ->join('hotel_lang as hl', 'hl.object_id', '=', 'h.id')
                    // ->join('provincial as p', 'p.id', '=', 'h.province_id')
                    ->where( 'hl.lang_id', current_lang_id() )
                    ->where( 'hl.lang_type', 'App\Model\Hotel' )
                    ->where( 'h.id', $city_id )
                    ->select( 'h.id',  'hl.name', 'hl.hotel_lang_id', 'hl.lang_type') 
                    ->get();
        return $city;
    }

}
