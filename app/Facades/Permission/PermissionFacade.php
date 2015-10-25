<?php

namespace App\Facades\Permission;

use Illuminate\Support\Facades\Facade;

class PermissionFacade extends Facade{
    public static function getFacadeAccessor() {
        return 'permission';
    }
}

