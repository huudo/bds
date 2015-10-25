<?php

namespace App\Repositories\Province;

use App\Repositories\BaseRepository;
use App\Repositories\Province\ProvinceInterface;
use App\Exceptions\ValidateException;
use App\Exceptions\ExcuteException;

class ProvinceRepository extends BaseRepository implements ProvinceInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rules() {
        $rules = [];
            foreach (get_langs() as $lang) {
                $rules[$lang->code . '.name'] = 'required';
            }
        return $rules;
    }

    public function show($id, $lang, $args = null) {
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $item = $this->find($id, $columns);
        if ($lang != null) {
            $item->desc = $item->langs()->where('code', $lang)->first()->pivot;
        }
        return $item;
    }
    
    public function getByGroup($group_id, $lang = null, $args = null) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'order';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];

        return $this->model->where('status', 1)->where('parent', $group_id)->with(['langs' => function($q) use ($lang) {
                        $q->where('code', $lang);
                    }])->orderBy($orderby, $order)->get($columns);
    }

    public function all($lang, $args = ['orderby' => 'id', 'order' => 'asc']) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'id';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $key = (isset($args['key'])) ? $args['key'] : null;
        $parent = (isset($args['parent'])) ? $args['parent'] : null;
        $sfield = (isset($args['search_field'])) ? $args['search_field'] : 'name';
        $order_multilang = (isset($args['multilang'])) ? $args['multilang'] : false;


        if ($order_multilang == 1) {
            return $this->model->where(function($query) use ($parent){
                if($parent){
                    $query->where('parent', $parent);
                }
            })->with(['langs' => function($q) use ($lang) {
                            $q->where('code', $lang);
                            $q->select('id', 'code');
                        }])->whereHas('langs', function($q1) use ($key, $sfield, $lang, $orderby, $order) {
                        $q1->where('code', $lang);
                        if ($key) {
                            $q1->where($sfield, 'like', "%$key%");
                        }
                        $q1->orderBy($orderby, $order);
                    })->paginate(get_option('_paginate'), $columns);
        } else {
            return $this->model->where(function($query) use ($parent){
                if($parent){
                    $query->where('parent', $parent);
                }
            })->with(['langs' => function($q) use ($lang) {
                            $q->where('code', $lang);
                            $q->select('id', 'code');
                        }])->whereHas('langs', function($q1) use ($key, $sfield, $lang) {
                        $q1->where('code', $lang);
                        if ($key) {
                            $q1->where($sfield, 'like', "%$key%");
                        }
                    })->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
        }
    }

    public function listType($type = 'cat', $except_id = null, $name = true, $lang = null) {
        $lang = ($lang) ? $lang : current_lang();
        $result = [];
        $item = $this->model->where('type', $type)->where('id', '!=', $except_id)->with(['langs' => function($q) use ($lang) {
                        $q->where('code', $lang);
                    }])->orderBy('id', 'asc')->get(['id']);
        if ($name) {
            foreach ($item as $province) {
                $result[$province->id] = $province->langs->first()->pivot->name;
            }
        } else {
            foreach ($item as $province) {
                $result[] = $province->id;
            }
        }
        return $result;
    }

    public function create($request) {
        if ($this->valid($request->all(), $this->rules())) {
            $province = new $this->model;
            
            $province->parent = $request->get('parent');
            $province->order = $request->get('order');
            $province->status = $request->get('status');

            $province->save();

            foreach (get_langs() as $lang) {
                $langdata = $request->get($lang->code);
                $name = $langdata['name'];
                $province_desc = [
                    'name' => $name,
                    'slug' => toSlug($name)
                ];
                $province->langs()->attach($lang->id, $province_desc);
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function createType($type, $request) {
        
    }

    public function update($id, $request, $multilang = true) {
        if ($this->valid($request->all(), $this->rules())) {
            $province = $this->find($id);
            
            $province->parent = $request->get('parent');
            $province->order = $request->get('order');
            $province->status = $request->get('status');

            $province->update();

            $syncs = [];
            foreach (get_langs() as $lang) {
                $langdata = $request->get($lang->code);
                $name = $langdata['name'];
                $province_desc = [
                    'name' => $name,
                    'slug' => toSlug($name)
                ];
                $syncs[$lang->id] = $province_desc;
            }
            $province->langs()->sync($syncs);
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $item = $this->find($id);
        $item->langs()->detach();
        if (!$item->delete()) {
            throw new ExcuteException('Không thể xóa được!');
        }
    }

    public function massdel($request) {

        $ids = $request->get('massdel');
        if ($ids) {
            foreach ($ids as $id) {
                $this->delete($id, true);
            }
        }
    }

    

}
