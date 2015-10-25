<?php

namespace App\Repositories\Slide;

use App\Repositories\BaseRepository;
use App\Repositories\Slide\SlideInterface;
use App\Exceptions\ValidateException;

class SlideRepository extends BaseRepository implements SlideInterface {

    protected $model;
    protected static $rules = [
        'image' => 'required'
    ];

    public function __construct($model) {
        $this->model = $model;
    }

    public function getByGroup($group_id, $lang = null, $args = null) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'order';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];

        return $this->model->where('status', 1)->where('group_id', $group_id)->with(['langs' => function($q) use ($lang) {
                        $q->where('code', $lang);
                    }])->orderBy($orderby, $order)->get($columns);
    }

    public function all($lang, $args) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'order';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $order_multilang = (isset($args['multilang'])) ? $args['multilang'] : false;

        if ($order_multilang == 1 || $order_multilang==true) {
            return $this->model->whereHas('langs', function($q1) use ($lang, $orderby, $order) {
                        $q1->where('code', $lang);
                        $q1->orderBy($orderby, $order);
                    })->with(['langs' => function($q) use ($lang) {
                            $q->where('code', $lang);
                            $q->select('id', 'code');
                        }])->paginate(get_option('_paginate'), $columns);
        } else {
            return $this->model->with(['langs' => function($q) use ($lang) {
                            $q->where('code', $lang);
                            $q->select('id', 'code');
                        }])->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
        }
    }

    public function listAll($except_id = 0, $lang, $has_name = false) {
        $items = $this->model->where('id', '!=', $except_id)->with(['langs' => function($q) use ($lang) {
                        $q->where('code', $lang);
                    }])->get(['id']);
        if ($has_name) {
            $result = [];
            foreach ($items as $item) {
                $result[$item->id] = $item->langs->first()->pivot->name;
            }
            return $result;
        }
        return $this->model->where('id', '!=', $except_id)->lists('id')->toArray();
    }

    public function create($request) {
        if ($this->valid($request->all())) {
            $slide = new $this->model;
            $slide->link = $request->get('link');
            $slide->image = get_path($request->get('image'));
            $slide->open_type = $request->get('open_type');
            $slide->order = $request->get('order');
            $slide->status = $request->get('status');
            $slide->group_id = $request->get('group_id');

            $slide->save();

            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $slide_desc = [
                    'name' => $datalang['name'],
                    'description' => $datalang['description']
                ];
                $slide->langs()->attach($lang->id, $slide_desc);
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        if ($this->valid($request->all())) {
            $slide = $this->find($id);
            $slide->link = $request->get('link');
            $slide->image = get_path($request->get('image'));
            $slide->open_type = $request->get('open_type');
            $slide->order = $request->get('order');
            $slide->status = $request->get('status');
            $slide->group_id = $request->get('group_id');

            $slide->update();

            $syncs = [];
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $slide_desc = [
                    'name' => $datalang['name'],
                    'description' => $datalang['description']
                ];
                $syncs[$lang->id] = $slide_desc;
            }
            $slide->langs()->sync($syncs);
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $menu = $this->find($id);
        $menu->langs()->detach();
        $menu->delete();
    }

    public function massdel($request) {
        $ids = $request->get('massdel');
        foreach ($ids as $id){
            $this->delete($id);
        }
    }

    public function editBackendSlide($lists, $parent = 0) {
        $output = '';
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent) {
                $ilang = $item->langs->first()->pivot;
                $output .= '<li data-id="' . $item->id . '" class="dd-item dd3-item">';
                $output.= '<div class="dd-handle dd3-handle"></div>';
                $output.= '<div class="dd3-content">'
                        . '<span class="title">' . $ilang->name . '</span>'
                        . '<span class="actions">'
                        . '<a href="' . route('admin.menu.edit', $item->id) . '" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>'
                        . '<a href="' . route('admin.menu.delete', $item->id) . '" class="btn btn-danger btn-sm item-delete"><i class="fa fa-close"></i></a>'
                        . '</span>'
                        . '</div>';
                unset($lists[$key]);
                $output2 = $this->editBackendSlide($lists, $item->id);
                if ($output2 != '') {
                    $output .= '<ol class="childs dd-list">' . $output2 . '</ol>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }

    public function generateSlides($lists, $parent = 0) {
        
    }

}
