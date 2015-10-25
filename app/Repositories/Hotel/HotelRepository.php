<?php

namespace App\Repositories\Hotel;

use App\Repositories\BaseRepository;
use App\Repositories\Hotel\HotelInterface;
use App\Exceptions\ValidateException;

class HotelRepository extends BaseRepository implements HotelInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rules($id = null) {
        $result = [];
        $dfcode = default_lang();
        $result[$dfcode . '.name'] = 'required';
        return $result;
    }

    public function get_by_catids($ids, $args = null) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'created_at';
        $order = (isset($args['order'])) ? $args['order'] : 'desc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $per_page = (isset($args['per_page'])) ? $args['per_page'] : get_option('paginate');

        return $this->model->whereHas('cats', function($q) use ($ids) {
                    $q->whereIn('tax_id', $ids);
                })->with(['langs' => function($q) {
                        $q->where('code', current_lang());
                        $q->select('id');
                    }])->orderBy($orderby, $order)->paginate($per_page, $columns);
    }

    public function show($id, $lang=null) {
        $lang = ($lang) ? $lang : current_lang();
        $item = $this->find($id);
        $item->desc = $item->langs()->where('code', $lang)->first()->pivot;
        return $item;
    }

    /*     * ************************** Back end ****************************** */

    public function all($lang, $args) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'id';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $status = (isset($args['status'])) ? $args['status'] : null;
        $key = (isset($args['key'])) ? $args['key'] : null;
        $sfield = (isset($args['search_field'])) ? $args['search_field'] : 'name';
        $order_multilang = (isset($args['multilang'])) ? $args['multilang'] : false;


        if ($order_multilang == 1) {
            return $this->model->where(function($query) use ($status){
                if($status){
                    $query->where('status', $status);
                }
            })->whereHas('langs', function($q1) use ($key, $sfield, $lang, $orderby, $order) {
                        $q1->where('code', $lang);
                        if ($key) {
                            $q1->where($sfield, 'like', "%$key%");
                        }
                        $q1->orderBy($orderby, $order);
                    })->with(['langs' => function($q) use ($lang) {
                            $q->where('code', $lang);
                            $q->select('id', 'code');
                        }])->paginate(get_option('_paginate'), $columns);
        } else {
            return $this->model->where(function($query) use ($status){
                if($status){
                    $query->where('status', $status);
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
    
     public function listAll($name = true, $lang=null) {
         $lang = ($lang) ? $lang : current_lang();
        $result = [];
        
            $item = $this->model->with(['langs' => function($q) use ($lang) {
                            $q->where('code', $lang);
                        }])->orderBy('id', 'asc')->get(['id']);
            if ($name) {
                foreach ($item as $tax) {
                    $result[$tax->id] = $tax->langs->first()->pivot->name;
                }
            } else {
                foreach ($item as $tax) {
                    $result[] = $tax->id;
                }
            }
        
        return $result;
    }

    public function getLast($number) {
        return $this->model->with(['langs' => function($q) {
            $q->where('code', current_lang());
            $q->select('hotel_lang.*');
        }])->orderBy('created_at', 'desc')->take($number)->get(['id', 'image', 'star',]);
    }

    public function getShow($id, $lang = null) {
        $lang = ($lang) ? $lang : current_lang();
        $item = $this->model->with(['langs' => function($q) use ($lang) {
            $q->where('code', $lang);
            $q->select('hotel_desc.*');
        }])->find($id);
        if (is_null($item)) {
            throw new NullException('null', 'Không có d? li?u');
        }
        return $item;
    }

    public function create($request) {

        if ($this->valid($request->all(), $this->rules())) {
            $hotel = new $this->model;
            $hotel->image = get_path($request->get('image'));
            $hotel->status = $request->get('status');
            $hotel->star = $request->get('star');
            $hotel->province_id = $request->get('province_id');
            $hotel->hotline = $request->get('hotline');
            $hotel->phone = $request->get('phone');
            $hotel->email = $request->get('email');
            $hotel->fax = $request->get('fax');
            $hotel->build_year = $request->get('build_year');
            $hotel->num_floor = $request->get('num_floor');
            $hotel->num_room = $request->get('num_room');
            $hotel->time_arrival = $request->get('time_arrival');
            $hotel->time_departure = $request->get('time_departure');

            if($request->has('image_ids')){
                $hotel->images = serialize($request->get('image_ids'));
            }

            $hotel->save();

            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $name = $datalang['name'];
                $slug = $datalang['slug'];
                $hotel_desc = [
                    'name' => $name,
                    'slug' => (trim($slug) == '') ? toSlug($name) : toSlug($slug),
                    'rule' => $datalang['rule'],
                    'note' => $datalang['note'],
                    'content' => $datalang['content'],
                    'address' => $datalang['address']
                ];
                $hotel->langs()->attach($lang->id, $hotel_desc);
            }
            
            if($request->has('cats')){
                $hotel->convenients()->attach($request->get('cats'));
            }

//            if ($request->has('newtags')) {
//                $newtags = $request->get('newtags');
//                foreach ($newtags as $tag) {
//                    $newtag = new $this->tax;
//                    $newtag->type = 'tag';
//                    $newtag->dfname = $tag;
//                    $newtag->dfslug = toSlug($tag);
//                    $newtag->save();
//                    $hotel->tags()->attach($newtag->id);
//                }
//            }
//            if ($request->has('availtags')) {
//                $hotel->tags()->attach($request->get('availtags'));
//            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        
        if ($this->valid($request->all(), $this->rules())) {
            $hotel = $this->find($id);
            $hotel->image = get_path($request->get('image'));
            $hotel->status = $request->get('status');
            $hotel->star = $request->get('star');
            $hotel->province_id = $request->get('province_id');
            $hotel->hotline = $request->get('hotline');
            $hotel->phone = $request->get('phone');
            $hotel->email = $request->get('email');
            $hotel->fax = $request->get('fax');
            $hotel->build_year = $request->get('build_year');
            $hotel->num_floor = $request->get('num_floor');
            $hotel->num_room = $request->get('num_room');
            $hotel->time_arrival = $request->get('time_arrival');
            $hotel->time_departure = $request->get('time_departure');
            
            if($request->has('image_ids')){
                $hotel->images = serialize($request->get('image_ids'));
            }
            
            $hotel->update();

            $sync_langs = [];
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $name = $datalang['name'];
                $slug = $datalang['slug'];
                $hotel_desc = [
                    'name' => $name,
                    'slug' => (trim($slug) == '') ? toSlug($name) : toSlug($slug),
                    'note' => $datalang['note'],
                    'rule' => $datalang['rule'],
                    'content' => $datalang['content'],
                    'address' => $datalang['address']
                ];
                $sync_langs[$lang->id] = $hotel_desc;
            }
            $hotel->langs()->sync($sync_langs);
            
            $hotel->convenients()->detach();
            if($request->has('cats')){
                $hotel->convenients()->attach($request->get('cats'));
            }

//            $hotel->cats()->detach();
//            if ($request->has('cats')) {
//                $hotel->cats()->attach($request->get('cats'));
//            }
//            if ($request->has('newtags')) {
//                $newtags = $request->get('newtags');
//                foreach ($newtags as $tag) {
//                    $newtag = new $this->tax;
//                    $newtag->type = 'tag';
//                    $newtag->dfname = $tag;
//                    $newtag->dfslug = toSlug($tag);
//                    $newtag->save();
//                    $hotel->tags()->attach($newtag->id);
//                }
//            }
//            if ($request->has('availtags')) {
//                $hotel->tags()->attach($request->get('availtags'));
//            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $hotel = $this->find($id);
        $hotel->langs()->detach();
        $hotel->delete();
    }

    public function massdel($request) {
        $massdel = $request->get('massdel');
        if ($massdel) {
            foreach ($massdel as $id) {
                $this->delete($id);
            }
        }
    }

}
