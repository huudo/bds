<?php

namespace App\Repositories\Tax;

use App\Repositories\CrudInterface;

interface TaxInterface extends CrudInterface{
    public function createType($type = 'cat', $request);
}
