<?php

namespace App\Repositories\Country;

use App\Repositories\BaseRepository;
use App\Repositories\Country\CountryInterface;
use App\Exceptions\ValidateException;
use App\Exceptions\ExcuteException;

class CountryRepository extends BaseRepository implements CountryInterface {

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

    public function all($lang, $args = ['orderby' => 'id', 'order' => 'asc']) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'id';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $key = (isset($args['key'])) ? $args['key'] : null;
        $sfield = (isset($args['search_field'])) ? $args['search_field'] : 'name';
        $order_multilang = (isset($args['multilang'])) ? $args['multilang'] : false;


        if ($order_multilang == 1) { 
            return $this->model->with(['langs' => function($q) use ($lang) {
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
            return $this->model->with(['langs' => function($q) use ($lang) {
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

    public function listAll($name = true, $lang = null) {
        $lang = ($lang) ? $lang : current_lang();
        $result = [];
        $item = $this->model->with(['langs' => function($q) use ($lang) {
                        $q->where('code', $lang);
                    }])->orderBy('id', 'asc')->get(['id']);
        if ($name) {
            foreach ($item as $country) {
                $result[$country->id] = $country->langs->first()->pivot->name;
            }
        } else {
            foreach ($item as $country) {
                $result[] = $country->id;
            }
        }
        return $result;
    }

    public function create($request) {
        if ($this->valid($request->all(), $this->rules())) {
            $country = new $this->model;
            if ($request->has('parent')) {
                $country->parent = $request->get('parent');
            }
            $country->status = $request->get('status');
            if($request->has('icon')){
                $country->icon = $request->get('icon');
            }
            if($request->has('visa_1')){
                $country->visa_1 = $request->get('visa_1');
            }
            if($request->has('visa_2')){
                $country->visa_2 = $request->get('visa_2');
            }

            $country->save();

            foreach (get_langs() as $lang) {
                $langdata = $request->get($lang->code);
                $name = $langdata['name'];
                $country_desc = [
                    'name' => $name,
                    'slug' => toSlug($name)
                ];
                $country->langs()->attach($lang->id, $country_desc);
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function createType($type, $request) {
        
    }

    public function update($id, $request, $multilang = true) {
        if ($this->valid($request->all(), $this->rules())) {
            $country = $this->find($id);
            if ($request->has('parent')) {
                $country->parent = $request->get('parent');
            }
            $country->status = $request->get('status');
            if($request->has('icon')){
                $country->icon = $request->get('icon');
            }
            if($request->has('visa_1')){
                $country->visa_1 = $request->get('visa_1');
            }
            if($request->has('visa_2')){
                $country->visa_2 = $request->get('visa_2');
            }

            $country->update();

            $syncs = [];
            foreach (get_langs() as $lang) {
                $langdata = $request->get($lang->code);
                $name = $langdata['name'];
                $country_desc = [
                    'name' => $name,
                    'slug' => toSlug($name)
                ];
                $syncs[$lang->id] = $country_desc;
            }
            $country->langs()->sync($syncs);
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
