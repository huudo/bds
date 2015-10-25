<?php

namespace App\Repositories;

interface CrudInterface{
    public function getAll($columns=['*'], $lang=null);
    public function find($id);
    public function create($request);
    public function update($id, $request);
    public function delete($id);
    public function massdel($request);
}
