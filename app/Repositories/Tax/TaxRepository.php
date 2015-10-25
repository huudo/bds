<?php

namespace App\Repositories\Tax;

use App\Repositories\BaseRepository;
use App\Repositories\Tax\TaxInterface;
use App\Exceptions\ValidateException;
use App\Exceptions\ExcuteException;

class TaxRepository extends BaseRepository implements TaxInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rules($multilang = true) {
        $rules = [];
        if ($multilang) {
            foreach (get_langs() as $lang) {
                $rules[$lang->code . '.name'] = 'required';
            }
        } else {
            $rules ['dfname'] = 'required';
        }
        return $rules;
    }
    
    public function show($id, $lang, $args=null){
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $item = $this->find($id, $columns);
        if($lang != null){
            $item->desc = $item->langs()->where('code', $lang)->first()->pivot;
        }
        return $item;
    }

    public function all($type, $lang, $args = ['orderby' => 'id', 'order' => 'asc']) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'id';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $key = (isset($args['key'])) ? $args['key'] : null;
        $sfield = (isset($args['search_field'])) ? $args['search_field'] : 'name';
        $order_multilang = (isset($args['multilang'])) ? $args['multilang'] : false;

        if ($lang == 'all') {
            if ($order_multilang == 1) {
                return $this->model->where('type', $type)->whereHas('langs', function($q, $orderby, $order) {
                            $q->orderBy($orderby, $order);
                        })->with('langs')->get($columns);
            } else {
                return $this->model->where('type', $type)->with('langs')->orderBy($orderby, $order)->get($columns);
            }
        }

        if ($lang) {
            if ($order_multilang == 1) {
                return $this->model->where('type', $type)->with(['langs' => function($q) use ($lang) {
                                $q->where('code', $lang);
                                $q->select('id', 'code');
                            }])->whereHas('langs', function($q1) use ($key, $sfield, $lang, $orderby, $order) {
                            $q1->where('code', $lang);
                            if($key){
                                $q1->where($sfield, 'like', "%$key%");
                            }
                            $q1->orderBy($orderby, $order);
                        })->paginate(get_option('_paginate'), $columns);
            } else {
                return $this->model->where('type', $type)->with(['langs' => function($q) use ($lang) {
                                $q->where('code', $lang);
                                $q->select('id', 'code');
                            }])->whereHas('langs', function($q1) use ($key, $sfield, $lang) {
                            $q1->where('code', $lang);
                            if($key){
                                $q1->where($sfield, 'like', "%$key%");
                            }
                        })->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
            }
        } else {
            if($key){
                return $this->model->where('type', $type)->where($sfield, 'like', "%$key%")->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
            }else{
                return $this->model->where('type', $type)->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
            }
        }
    }

    public function listType($type = 'cat', $except_id = null, $name = true, $lang = null) {
        $result = [];
        if ($lang) {
            $item = $this->model->where('type', $type)->where('id', '!=', $except_id)->with(['langs' => function($q) use ($lang) {
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
        } else {
            if ($except_id) {
                $item = $this->model->where('type', $type)->where('id', '!=', $except_id);
            } else {
                $item = $this->model->where('type', $type);
            }
            if ($name) {
                $result = $item->lists('dfname', 'id')->toArray();
            } else {
                $result = $item->lists('id')->toArray();
            }
        }
        return $result;
    }
    

    public function create($request) {
        
    }

    public function createType($type, $request, $multilang = true) {
        if ($this->valid($request->all(), $this->rules($multilang))) {
            $tax = new $this->model;
            if ($request->has('parent')) {
                $tax->parent = $request->get('parent');
            }
            $tax->status = $request->get('status');
            $tax->type = $type;
            if ($multilang) {
                $tax->save();
                foreach (get_langs() as $lang) {
                    $langdata = $request->get($lang->code);
                    $name = $langdata['name'];
                    $slug = (isset($langdata['slug'])) ? $langdata['slug'] : '';
                    $tax_desc = [
                        'name' => $name,
                        'slug' => (trim($slug) == '') ? toSlug($name) : toSlug($slug)
                    ];
                    $tax->langs()->attach($lang->id, $tax_desc);
                }
            } else {
                $name = $request->get('dfname');
                $slug = $request->get('dfslug');
                $tax->dfname = $name;
                $tax->dfslug = (trim($slug) == '') ? toSlug($name) : toSlug($slug);
                $tax->save();
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request, $multilang = true) {
        if ($this->valid($request->all(), $this->rules($multilang))) {
            $tax = $this->find($id);
            if ($request->has('parent')) {
                $tax->parent = $request->get('parent');
            }
            $tax->status = $request->get('status');
            if ($multilang) {
                $tax->update();

                $syncs = [];
                foreach (get_langs() as $lang) {
                    $langdata = $request->get($lang->code);
                    $name = $langdata['name'];
                    $slug = (isset($langdata['slug'])) ? $langdata['slug'] : '';
                    $tax_desc = [
                        'name' => $name,
                        'slug' => (trim($slug) == '') ? toSlug($name) : toSlug($slug)
                    ];
                    $syncs[$lang->id] = $tax_desc;
                }
                $tax->langs()->sync($syncs);
            } else {
                $name = $request->get('dfname');
                $slug = $request->get('dfslug');
                $tax->dfname = $name;
                $tax->dfslug = (trim($slug) == '') ? toSlug($name) : toSlug($slug);
                $tax->update();
            }
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

    public function cat_checklists($lists, $parent = 0, $checkeds = null) {
        $output = '';
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent) {
                $output .= '<li>';
                if ($checkeds != null) {
                    $output.= '<label><input type="checkbox" name="cats[]" value="' . $item->id . '" ' . checkecho($item->id, $checkeds, false) . ' /> ' . $item->langs->first()->pivot->name . '</label>';
                } else {
                    $output.= '<label><input type="checkbox" name="cats[]" value="' . $item->id . '" /> ' . $item->langs->first()->pivot->name . '</label>';
                }
                unset($lists[$key]);
                $output2 = $this->cat_checklists($lists, $item->id, $checkeds);
                if ($output2 != '') {
                    $output .= '<ul class="childs">' . $output2 . '</ul>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }

    public function cat_selectlists($lists, $parent = 0, $selected = 0) {
        $output = '';
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent) {
                $output .= '<li>';
                $output.= '<label><input type="checkbox" name="cats[]" value="' . $item->id . '" ' . checkecho($item->id, $checkeds, false) . ' /> ' . $item->langs->first()->pivot->name . '</label>';
                unset($lists[$key]);
                $output2 = $this->cat_checklists($lists, $item->id, $selected);
                if ($output2 != '') {
                    $output .= '<ul class="childs">' . $output2 . '</ul>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }
    
    public function cat_trees($lists, $parent = 0, $checkeds = null) {
        $output = '';
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent) {
                $output .= '<li>';
                if ($checkeds != null) {
                    $output.= '<label><i class="fa fa-check  ' . checkecho($item->id, $checkeds, false) . ' "></i> ' . $item->langs->first()->pivot->name . '</label>';
                } else {
                    $output.= '<label><i class="fa fa-check"></i>' . $item->langs->first()->pivot->name . '</label>';
                }
                unset($lists[$key]);
                $output2 = $this->cat_trees($lists, $item->id, $checkeds);
                if ($output2 != '') {
                    $output .= '<ul class="childs">' . $output2 . '</ul>';
                }
                $output .= '</li>';
            }
        }
        return $output;
    }
    public function list_trees($lists, $parent = 0, $checkeds = null, $count) {
        $output = '';
        foreach ($lists as $key => $item) {
            if ($item->parent == $parent) {
                if($count == 0) {
                    $output .= '<tr>';
                } else {
                    $output .= '<li>';
                }

                if ($checkeds != null) {
                    if($count == 0) {
                        $output .= '<td class="parent_con"><label>' . $item->langs->first()->pivot->name . '</label></td>';
                    } else {
                        $output .= '<label><i class="fa fa-check  ' . checkecho($item->id, $checkeds, false) . ' "></i> ' . $item->langs->first()->pivot->name . '</label>';
                    }
                } else {
                    $output.= '<label><i class="fa fa-check"></i>' . $item->langs->first()->pivot->name . '</label>';
                }
                unset($lists[$key]);
                $output2 = $this->list_trees($lists, $item->id, $checkeds, 1);
                if ($output2 != '') {
                    $output .= '<td><ul class="childs">' . $output2 . '</ul></td>';
                }
                if($count == 0) {
                    $output .= '</tr>';
                } else {
                    $output .= '</li>';
                }
            }
        }
        return $output;
    }

}
