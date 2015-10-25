<?php

namespace App\Facades\Language;

use Illuminate\Support\Facades\Facade;

class LanguageFacade extends Facade{
    public static function getFacadeAccessor() {
        return 'languages';
    }
}

