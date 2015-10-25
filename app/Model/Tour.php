<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tours';
    protected $tbclang = 'tours_lang';
    protected $tblang = 'languages';

    protected $fillable = [
        'start_date',
        'start_place',
        'days',
        'nights',
        'price_company',
        'price',
        'price_child',
        'price_baby',
        'price_single',
        'user_id',
        'image_url',
        'tour_id',
        'lang_id',
        'schedule',
        'detail',
        'notices',
        'code',
        'name',
        'start_id',
        'end_id',
        'keyword',
        'start_every'
    ];
    public function langs() {
        return $this->belongsToMany('App\Model\Language', 'tours_lang', 'tour_id', 'lang_id')->withPivot('schedule', 'detail', 'notice', 'desc','name','keyword','intro');
    }

    public function tour_cat()
    {
        return $this->belongsToMany('App\Model\Tourcat','tour_cat_tour','tour_id','cat_id')->withTimestamps();
    }

    public function tour_place()
    {
        return $this->belongsToMany('App\Model\Province','tour_place','tour_id','place_id')->withTimestamps();
    }

    public function getPlace() {
        return $this->tour_place();
    }

    public function getTourcat()
    {
        return $this->tour_cat();
    }
    
    public function place(){
        return $this->belongsTo('App\Place', 'place_id');
    }

}
