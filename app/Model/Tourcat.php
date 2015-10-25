<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tourcat extends Model
{
    protected $table = 'tour_cat';
    protected $tbclang = 'tour_cat_lang';
    protected $tblang = 'languages';

    protected $fillable = [
        'parent_id',
        'user_id',
        'name',
        'slug',
    ];
    public function langs() {
        return $this->belongsToMany('App\Model\Language', 'tour_cat_lang', 'cat_id', 'lang_id')->withPivot('name','slug');
    }
    public function tours(){
        return $this->belongsToMany('App\Tour');
    }
}
