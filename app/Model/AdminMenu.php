<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminMenu extends Model
{
    protected $table = 'admin_menus';
    
    public function has_child(){
        $item = $this->where('parent', $this->id)->count();
        if($item>0){
            return true;
        }
        return false;
    }
}
