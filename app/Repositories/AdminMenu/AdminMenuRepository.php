<?php

namespace App\Repositories\AdminMenu;

use App\Repositories\BaseRepository;
use App\Repositories\AdminMenu\AdminMenuInterface;
use App\Exceptions\ValidateException;

class AdminMenuRepository extends BaseRepository implements AdminMenuInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rules($id = null) {
        return [
            'name' => 'required',
            'route' => 'unique:admin_menus,route,' . $id
        ];
    }

    public function all($args = ['orderby' => 'id', 'order' => 'asc']) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'id';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $key = (isset($args['key'])) ? $args['key'] : null;
        $sfield = (isset($args['search_field'])) ? $args['search_field'] : 'name';
        $status = (isset($args['status'])) ? $args['status'] : null;

        return $this->model->where(function($query) use ($status){
            if($status){
                $query->where('status', $status);
            }
        })->where($sfield, 'like', "%$key%")->orderBy($orderby, $order)->get($columns);
    }

    public function listAll($excerpt_id = 0, $has_name = false) {
        $item = $this->model->where('id', '!=', $excerpt_id);
        if ($has_name) {
            return $item->lists('name', 'id')->toArray();
        }
        return $item->lists('id')->toArray();
    }

    public function create($request) {
        if ($this->valid($request->all(), $this->rules())) {
            $menu = new $this->model;
            $menu->name = $request->get('name');
            $menu->slug = (trim($request->get('slug')) == '') ? toSlug($request->get('name')) : toSlug($request->get('slug'));
            if ($request->get('route') != '0') {
                $menu->route = $request->get('route');
            }
            $menu->order = $request->get('order');
            $menu->permission = (trim($request->get('permission')) == '') ? 'read' : $request->get('permission');
            if ($request->has('parent')) {
                $menu->parent = $request->get('parent');
            }
            $menu->status = $request->get('status');
            $menu->icon = $request->get('icon');
            $menu->save();
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        if ($this->valid($request->all(), $this->rules($id))) {
            $menu = $this->find($id);
            $menu->name = $request->get('name');
            $menu->slug = (trim($request->get('slug')) == '') ? toSlug($request->get('name')) : toSlug($request->get('slug'));
            if ($request->get('route') != '0') {
                $menu->route = $request->get('route');
            }
            $menu->order = $request->get('order');
            $menu->permission = (trim($request->get('permission')) == '') ? 'read' : $request->get('permission');
            if ($request->has('parent')) {
                $menu->parent = $request->get('parent');
            }
            $menu->status = $request->get('status');
            $menu->icon = $request->icon;
            $menu->update();
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
        if ($ids) {
            foreach ($ids as $id) {
                $this->delete($id);
            }
        }
    }

    public function updateOrder($orders, $parent=0) {
        foreach ($orders as $key => $item) {
            $menu = $this->model->find($item['id']);
            $menu->order = $key + 1;
            $menu->parent = $parent;
            $menu->update();
            if (isset($item['children'])) {
                $this->updateOrder($item['children'], $item['id']);
            }
        }
    }

    public function editMenuHtml($lists, $parent = 0) {
        $output = '';
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent) {
                $route = ($item->route) ? route($item->route) : '';

                $output .= '<li data-id="' . $item->id . '" class="dd-item dd3-item">';
                $output.= '<div class="dd-handle dd3-handle"></div>';
                $output.= '<div class="dd3-content">'
                        . '<span class="title">' . $item->name . '</span>'
                        . '<span class="actions">'
                        . '<a href="' . route('admin.admin_menu.edit', $item->id) . '" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>'
                        . '<a href="' . route('admin.admin_menu.delete', $item->id) . '" class="btn btn-danger btn-sm item-delete"><i class="fa fa-close"></i></a>'
                        . '</span>'
                        . '</div>';
                unset($lists[$key]);
                $output2 = $this->editMenuHtml($lists, $item->id);
                if ($output2 != '') {
                    $output .= '<ol class="childs dd-list">' . $output2 . '</ol>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }

    public function generateMenu($lists, $parent = 0) {
        $output = '';
        foreach ($lists as $key => $item) {
            if (has_cap($item->permission)) {
                if ($item->parent == $parent) {
                    $route = ($item->route) ? route($item->route) : '';
                    $active = (\Request::route()->getName() == $item->route) ? ' active ' : '';
                    if ($item->has_child()) {
                        $output .= '<li class="has-child '.$active.'">';
                        $output .= '<a href="' . $route . '">'
                                . '<i class="fa ' . $item->icon . '"> </i> '
                                . '<span> ' . $item->name . '</span> '
                                . '<i class="fa fa-angle-right pull-right"> </i></a>';
                        unset($lists[$key]);
                        $output2 = $this->generateMenu($lists, $item->id);
                        $output .= '<ul class="menu-child">' . $output2 . '</ul>';
                    } else {
                        $output .= '<li class="'.$active.'">';
                        $output .= '<a href="' . $route . '">'
                                . '<i class="fa ' . $item->icon . '"> </i> '
                                . '<span> ' . $item->name . '</span> '
                                . '</a>';
                        unset($lists[$key]);
                    }
                    $output .= '</li>';
                }
            }
        }
        return $output;
    }

}
