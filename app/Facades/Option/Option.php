<?php

namespace App\Facades\OPtion;

use App\Exceptions\ValidateException;
use App\Exceptions\NullException;
use Validator;

class Option {

    protected $option;

    public function __construct($option) {
        $this->option = $option;
    }

    public function all($lang_id, $args) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'key';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $key = (isset($args['key'])) ? $args['key'] : null;
        return $this->option->where(function($query) use($lang_id) {
                            $query->where('lang_id', $lang_id);
                            $query->orwhere('lang_id', 0);
                        })->where('key', 'like', "%$key%")
                        ->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
    }

    public function getEdit($key) {
        $item = $this->option->where('key', $key);
        if ($item->count() == 0) {
            throw new NullException('Không có dữ liệu!');
        }
        $first = $item->first();
        if ($first->lang_id == 0) {
            return $first;
        } else {
            $result = new \stdClass();
            $result->key = $first->key;
            $result->name = $first->name;
            foreach (get_langs() as $lang) {
                $code = $lang->code;
                $result->$code = $this->option->where('key', $key)->where('lang_id', $lang->id)->first(['value']);
            }
            return $result;
        }
    }

    public function check_exists($key, $lang_id = null) {
        $lang_id = ($lang_id) ? $lang_id : 0;
        if ($this->option->where('key', $key)->where('lang_id', $lang_id)->count() > 0) {
            return true;
        }
        return false;
    }

    public function get_option($key, $lang_id = null) {
        $result = $this->option->where('key', $key)->where('lang_id', $lang_id)->first(['value']);
        if (is_null($result)) {
            return null;
        }
        $value = $result->value;
        return (is_serialized($value)) ? unserialize($value) : $value;
    }

    public function create_option($request) {
        $valid = Validator::make($request->all(), [
                    'key' => 'required'
        ]);
        if ($valid->fails()) {
            throw new ValidateException($valid->errors());
        }

        $check = $request->get('haslang');
        if ((int) $check == 1) {
            foreach (get_langs() as $lang) {
                $option = new $this->option;
                $option->key = $request->get('key');
                $option->name = $request->get('name');
                $option->value = $request->get($lang->code)['value'];
                $option->lang_id = $lang->id;
                $option->save();
            }
        } else {
            $option = new $this->option;
            $option->key = $request->get('key');
            $option->name = $request->get('name');
            $option->value = $request->get('value');
            $option->lang_id = 0;
            $option->save();
        }
    }

    public function update_option($request) {
        $valid = Validator::make($request->all(), [
                    'key' => 'required'
        ]);
        if ($valid->fails()) {
            throw new ValidateException($valid->errors());
        }

        $check = $request->get('haslang');
        if ((int) $check == 1) {
            foreach (get_langs() as $lang) {
                return $this->option->where('key', $request->get('key'))->where('lang_id', $lang->id)->update(['value' => $request->get($lang->code)['value']]);
            }
        } else {
            return $this->option->where('key', $request->get('key'))->update(['value' => $request->get('value')]);
        }
    }

    public function delete($key) {
        $query = $this->option->where('key', $key);
        if ($query->count() > 0) {
            return $query->delete();
        }
        return true;
    }

    public function massdel($request) {
        $keys = $request->get('massdel');
        foreach ($keys as $key) {
            $this->delete($key);
        }
    }

}
