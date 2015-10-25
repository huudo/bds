<?php

namespace App\Repositories\Room;

use App\Repositories\BaseRepository;
use App\Repositories\Room\RoomInterface;
use App\Exceptions\ValidateException;

class RoomRepository extends BaseRepository implements RoomInterface {

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
        $key = (isset($args['key'])) ? $args['key'] : null;
        $sfield = (isset($args['search_field'])) ? $args['search_field'] : 'name';
        $order_multilang = (isset($args['multilang'])) ? $args['multilang'] : false;


        if ($order_multilang == 1) {
            return $this->model->whereHas('langs', function($q1) use ($key, $sfield, $lang, $orderby, $order) {
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

    public function create($request) {

        if ($this->valid($request->all(), $this->rules())) {
            $room = new $this->model;
            $room->image = get_path($request->get('image'));
            $room->status = $request->get('status');
            $room->type_id = $request->get('type_id');
            $room->hotel_id = $request->get('hotel_id');
//            $room->price = $request->get('price');
            if($request->has('image_ids')){
                $room->images = serialize($request->get('image_ids'));
            }
            $room->num_adult = $request->get('num_adult');
            $room->square = $request->get('square');
            $room->room_view = $request->get('room_view');
            $room->add_bed = $request->get('add_bed');
            $room->price_1 = $request->get('price_1');
            $room->price_2 = $request->get('price_2');
            $room->price_3 = $request->get('price_3');
            $room->point_1 = strtotime(str_replace('/', '-', $request->get('point_1'))); 
            $room->point_2 = strtotime(str_replace('/', '-', $request->get('point_2')));

            $room->save();

            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $name = $datalang['name'];
                $room_desc = [
                    'name' => $name,
                    'slug' => toSlug($name),
                    'content' => $datalang['content']
                ];
                $room->langs()->attach($lang->id, $room_desc);
            }
            
            if($request->has('cats')){
                $room->convenients()->attach($request->get('cats'));
            }

        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        
        if ($this->valid($request->all(), $this->rules())) {
            $room = $this->find($id);
            $room->image = get_path($request->get('image'));
            $room->status = $request->get('status');
            $room->type_id = $request->get('type_id');
            $room->hotel_id = $request->get('hotel_id');
//            $room->price = $request->get('price');
            $room->num_adult = $request->get('num_adult');
            $room->square = $request->get('square');
            $room->room_view = $request->get('room_view');
            $room->add_bed = $request->get('add_bed');

            if($request->has('image_ids')){
                $room->images = serialize($request->get('image_ids'));
            }
            $room->price_1 = $request->get('price_1');
            $room->price_2 = $request->get('price_2');
            $room->price_3 = $request->get('price_3');
            $room->point_1 = strtotime(str_replace('/', '-', $request->get('point_1'))); 
            $room->point_2 = strtotime(str_replace('/', '-', $request->get('point_2')));
            
            $room->update();

            $sync_langs = [];
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $name = $datalang['name'];
                $room_desc = [
                    'name' => $name,
                    'slug' => toSlug($name),
                    'content' => $datalang['content']
                ];
                $sync_langs[$lang->id] = $room_desc;
            }
            $room->langs()->sync($sync_langs);
            
            $room->convenients()->detach();
            if($request->has('cats')){
                $room->convenients()->attach($request->get('cats'));
            }

        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $room = $this->find($id);
        $room->langs()->detach();
        $room->delete();
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
