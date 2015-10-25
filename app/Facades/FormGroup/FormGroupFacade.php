<?php

namespace App\Facades\FormGroup;
use Illuminate\Support\Facades\Facade;
class FormGroupFacade extends Facade{
    public static function getFacadeAccessor() {
        return 'formgroup';
    }
}
