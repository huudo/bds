<?php

namespace App\Repositories\Page;

use App\Repositories\BaseRepository;
use App\Repositories\Page\PageInterface;
use App\Exceptions\ValidateException;

class PageRepository extends BaseRepository implements PageInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }
    
    public function show($id, $lang){
        $item = $this->find($id);
        $item->desc = $item->langs()->where('code', $lang)->first()->pivot;
        return $item;
    }
    
    /************************** Back end *************************/

    public function rules($id = null) {
        $result = [];
        $dfcode = default_lang();
        $result[$dfcode . '.name'] = 'required';
        return $result;
    }

    public function all($lang, $args = null) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'created_at';
        $order = (isset($args['order'])) ? $args['order'] : 'desc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $key = (isset($args['key'])) ? $args['key'] : null;
        $sfield = (isset($args['search_field'])) ? $args['search_field'] : 'name';
        $order_multilang = (isset($args['multilang'])) ? $args['multilang'] : false;

        if ($lang == 'all') {
            if ($order_multilang == 1) {
                return $this->model->whereHas('langs', function($q, $orderby, $order) {
                                $q->orderBy($orderby, $order);
                            })->with('langs')->get($columns);
            } else {
                return $this->model->with('langs')->orderBy($orderby, $order)->get($columns);
            }
        }
        if ($lang) {
            if ($order_multilang == 1) {
                return $this->model->whereHas('langs', function($q1) use ($key, $sfield, $lang, $orderby, $order) {
                            $q1->where('code', $lang);
                            $q1->where($sfield, 'like', "%$key%");
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
                            $q1->where($sfield, 'like', "%$key%");
                        })->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
            }
        } else {
            return $this->model->where($sfield, 'like', "%$key%")->orderBy($orderby, $order)->paginate(get_option('_paginate'), $columns);
        }
    }

    public function create($request) {
        
        if ($this->valid($request->all(), $this->rules())) {
            $page = new $this->model;
            $page->image = get_path($request->get('image'));
            $page->status = $request->get('status');
            $page->author_id = auth()->user()->id;
            if ($request->has('template')) {
                $page->template = $request->get('template');
            }

            $page->save();

            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $name = $datalang['name'];
                $slug = $datalang['slug'];
                $page_desc = [
                    'name' => $name,
                    'slug' => (trim($slug) == '') ? toSlug($name) : toSlug($slug),
                    'excerpt' => $datalang['excerpt'],
                    'content' => $datalang['content']
                ];
                $page->langs()->attach($lang->id, $page_desc);
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        $page = $this->find($id);
        authorize_other('edit_pages', 'edit_others_pages', $page->author_id);
        if ($this->valid($request->all(), $this->rules())) {
            $page->image = get_path($request->get('image'));
            $page->status = $request->get('status');
            $page->author_id = auth()->user()->id;
            if ($request->has('template')) {
                $page->template = $request->get('template');
            }

            $page->update();

            $sync_langs = [];
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $name = $datalang['name'];
                $slug = $datalang['slug'];
                $page_desc = [
                    'name' => $name,
                    'slug' => (trim($slug) == '') ? toSlug($name) : toSlug($slug),
                    'excerpt' => $datalang['excerpt'],
                    'content' => $datalang['content']
                ];
                $sync_langs[$lang->id] = $page_desc;
            }
            $page->langs()->sync($sync_langs);
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $page = $this->find($id);
        authorize_other('delete_pages', 'delete_others_pages', $page->author_id);
        $page->langs()->detach();
        $page->delete();
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
