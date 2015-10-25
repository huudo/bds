<?php

namespace App\Repositories\Banner;

use App\Repositories\BaseRepository;
use App\Repositories\Banner\BannerInterface;
use App\Exceptions\ValidateException;

class BannerRepository extends BaseRepository implements BannerInterface {

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

    public function all($args) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'order';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];

            return $this->model->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
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
            $banner = new $this->model;
            $banner->link = $request->get('link');
            $banner->image = get_path($request->get('image'));
            $banner->open_type = $request->get('open_type');
            $banner->order = $request->get('order');
            $banner->status = $request->get('status');
            
            $banner->save();
            
            if($request->has('groups')){
                $banner->groups()->attach($request->get('groups'));
            }
            
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        if ($this->valid($request->all())) {
            $banner = $this->find($id);
            $banner->link = $request->get('link');
            $banner->image = get_path($request->get('image'));
            $banner->open_type = $request->get('open_type');
            $banner->order = $request->get('order');
            $banner->status = $request->get('status');
            
            $banner->update();
            
            $banner->groups()->detach();
            if($request->has('groups')){
                $banner->groups()->attach($request->get('groups'));
            }
            
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $menu = $this->find($id);
        $menu->delete();
    }

    public function massdel($request) {
        $ids = $request->get('massdel');
        foreach ($ids as $id){
            $this->delete($id);
        }
    }

    public function editBackendBanner($lists, $parent = 0) {
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
                $output2 = $this->editBackendBanner($lists, $item->id);
                if ($output2 != '') {
                    $output .= '<ol class="childs dd-list">' . $output2 . '</ol>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }

    public function generateBanners($lists, $parent = 0) {
        
    }

}
