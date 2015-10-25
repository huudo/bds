<?php

namespace App\Repositories\Subs;

use App\Exceptions\ValidateException;
use App\Exceptions\NullException;
use App\Exceptions\ExcuteException;
use App\Repositories\BaseRepository;
use App\Repositories\Subs\SubsInterface;

class SubsRepository extends BaseRepository implements SubsInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rules($id = null) {
        return [
            'email' => 'required|email|unique:customers,email,' . $id
        ];
    }

    public function all($args) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'order';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $key = $args['key'];

        return $this->model->where('email', 'like', "%$key%")->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
    }

    public function getByEmail($email, $columns = ['username', 'id']) {
        $subs = $this->model->where('email', $email)->first($columns);
        if (is_null($subs)) {
            throw new NullException('Không tìm thấy email này');
        }
        return $subs;
    }

    public function create($request) {
        if ($this->valid($request->all(), $this->rules())) {
            $subs = new $this->model;
            $subs->email = $request->get('email');
            if ($request->has('fullname')) {
                $subs->fullname = $request->get('fullname');
            }
            if ($request->has('phone')) {
                $subs->phone = $request->get('phone');
            }
            if ($request->has('address')) {
                $subs->address = $request->get('address');
            }
            if ($request->has('status')) {
                $subs->status = $request->get('status');
            }
            $subs->key_active = md5($request->get('email'));
            $subs->ip = $request->ip();
            $subs->save();
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        if ($this->valid($request->all(), $this->rules($id))) {
            $subs = $this->find($id);
            $subs->email = $request->get('email');
            if ($request->has('fullname')) {
                $subs->fullname = $request->get('fullname');
            }
            if ($request->has('phone')) {
                $subs->phone = $request->get('phone');
            }
            if ($request->has('address')) {
                $subs->address = $request->get('address');
            }
            if ($request->has('status')) {
                $subs->status = $request->get('status');
            }
            $subs->key_active = md5($request->get('email'));
            $subs->update();
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $subs = $this->find($id);
        if (!$subs->delete($id)) {
            throw new ExcuteException('Không thể xóa!');
        }
    }

    public function massdel($request) {
        $ids = $request->get('massdel');
        if ($ids) {
            foreach ($ids as $id) {
                $this->delete($id);
            }
        }
    }

}
