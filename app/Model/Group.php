<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'user_groups';
    
    public function users(){
        return $this->hasMany('App\Model\User', 'id');
    }
}
