<?php

namespace App\Repositories\Province;

use App\Repositories\CrudInterface;

interface ProvinceInterface extends CrudInterface{
    public function createType($type = 'cat', $request);
}
