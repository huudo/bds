<?php

namespace App\Repositories;

use Validator;
use App\Exceptions\ValidateException;
use App\Exceptions\NullException;
use App\Exceptions\ExcuteException;

abstract class BaseRepository {

    protected $error;

    public function valid(array $attrs, array $rules = null, array $mess = null) {
        $valid = Validator::make($attrs, ($rules) ? $rules : static::$rules);
        if ($valid->fails()) {
            $this->setError($valid->messages());
            return false;
        }
        return true;
    }

    public function setError($error) {
        $this->error = $error;
    }

    public function getError() {
        return $this->error;
    }

    public function search($key, $field = 'name', $lang = null, $orderby = 'id', $order = 'asc', $columns = ['*']) {
        if (is_null($lang)) {
            return $this->model->where($field, 'like', "%$key%")->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
        }
        return $this->model->with(['langs' => function($q) use ($lang) {
                        $q->select('id', 'code');
                        $q->where('code', $lang);
                    }])->whereHas('langs', function($q1) use ($key, $field, $lang, $orderby, $order){
                        $q1->where('code', $lang);
                        $q1->where($field, 'like', "%$key%");
                        $q1->orderBy($orderby, $order);
                    })->paginate(get_option('_paginate'), $columns);
    }

    public function getAll($columns = ['*'], $lang = null, $orderBy = 'id', $order = 'asc') {       
        if (is_null($lang)) {
            return $this->model->orderBy($orderBy, $order)->paginate(get_option('_paginate'), $columns);
        }
        $odbs = explode('.', $orderBy);
        if (count($odbs) > 1) {
            return $this->model->with(['langs' => function($q) use ($lang, $orderBy, $order) {
                            $q->where('code', $lang);
                            $q->select('id', 'code');
                            $q->orderBy($orderBy, $order);
                        }])->paginate(get_option('_paginate'), $columns);
        }
        return $this->model->with(['langs' => function($q) use ($lang) {
                        $q->where('code', $lang);
                        $q->select('id', 'code');
                    }])->orderBy($orderBy, $order)->paginate(get_option('_paginate'), $columns);
    }

    public function find($id, $columns=['*']) {
        $item = $this->model->find($id);
        if (is_null($item)) {
            throw new NullException('Notfound');
        } else {
            return $item;
        }
    }

    public function getEdit($id, $lang = true) {
        $item = $this->find($id);
        $result = $item;
        if ($lang) {
            $langs = $item->langs()->get(['code', 'id']);
            foreach ($langs as $lang) {
                $code = $lang->code;
                $result->$code = $lang->pivot;
            }
        }
        return $result;
    }
    
    public function get_with_lang($id, $lang){
        $item = $this->find($id);
        $langs = $item->langs()->where('code', $lang)->first(['code', 'id']);
        $item->lang = $langs->pivot;
        return $item;
    }

    public function sortOrder($columns = ['*'], $lang = null, $orderBy = 'id', $order = 'asc') {
        return $this->getAll($columns, $lang, $orderBy, $order);
    }
    
     public function nextId($field){
        return $this->model->max($field)+1;
    }

}
