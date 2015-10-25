<?php

namespace App\Repositories\Country;

use App\Repositories\CrudInterface;

interface CountryInterface extends CrudInterface{
    public function createType($type = 'cat', $request);
}
