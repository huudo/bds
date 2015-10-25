<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['username', 'email', 'password', 'avatar', 'permission', 'active_code', 'admin', 'group_id'];
    protected $hidden = ['password', 'remember_token'];
    
    public function groups(){
        return $this->belongsTo('App\Model\Group', 'group_id');
    }
    public function group_name(){
        $item = $this->groups()->first(['name']);
        if(is_null($item)){
            return 'Không có';
        }
        return $item->name;
    }
    
    public function posts(){
        return $this->hasMany('App\Model\Post', 'id');
    }
}
