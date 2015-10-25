<?php

namespace App\Repositories\Post;

use App\Repositories\BaseRepository;
use App\Repositories\Post\PostInterface;
use App\Exceptions\ValidateException;

class PostRepository extends BaseRepository implements PostInterface {

    protected $model;
    protected $tax;

    public function __construct($model, $tax) {
        $this->model = $model;
        $this->tax = $tax;
    }

    public function rules($id = null) {
        $result = [];
        $dfcode = default_lang();
        $result[$dfcode . '.name'] = 'required';
        return $result;
    }
    public function get_by_catids($ids, $args=null) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'created_at';
        $order = (isset($args['order'])) ? $args['order'] : 'desc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $per_page = (isset($args['per_page'])) ? $args['per_page'] : get_option('paginate');
        
        return $this->model->whereHas('cats', function($q) use ($ids) {
                    $q->whereIn('tax_id', $ids);
                })->with(['langs' => function($q){
                    $q->where('code', current_lang());
                    $q->select('id');
                }])->orderBy($orderby, $order)->paginate($per_page, $columns);
    }
    
    public function show($id, $lang){
        $item = $this->find($id);
        $item->desc = $item->langs()->where('code', $lang)->first()->pivot;
        return $item;
    }

    public function getLast($number, $lang=null, $columns=['*']){
        $lang = ($lang) ? $lang : current_lang();
        return $this->model->with(['langs' => function($q) use ($lang){
            $q->where('code', $lang);
            $q->select('post_desc.*');
        }])->orderBy('created_at', 'desc')->take($number)->get($columns);
    }
    
    /**************************** Back end *******************************/

    public function all($lang, $args) {
        $orderby = (isset($args['orderby'])) ? $args['orderby'] : 'id';
        $order = (isset($args['order'])) ? $args['order'] : 'asc';
        $columns = (isset($args['columns'])) ? $args['columns'] : ['*'];
        $key = (isset($args['key'])) ? $args['key'] : null;
        $sfield = (isset($args['search_field'])) ? $args['search_field'] : 'name';
        $order_multilang = (isset($args['multilang'])) ? $args['multilang'] : false;

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
            $post = new $this->model;
            $post->image = get_path($request->get('image'));
            $post->status = $request->get('status');
            $post->author_id = auth()->user()->id;

            $post->save();

            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $name = $datalang['name'];
                $slug = $datalang['slug'];
                $post_desc = [
                    'name' => $name,
                    'slug' => (trim($slug) == '') ? toSlug($name) : toSlug($slug),
                    'excerpt' => $datalang['excerpt'],
                    'content' => $datalang['content']
                ];
                $post->langs()->attach($lang->id, $post_desc);
            }

            if ($request->has('cats')) {
                $post->cats()->attach($request->get('cats'));
            }
            if ($request->has('newtags')) {
                $newtags = $request->get('newtags');
                foreach ($newtags as $tag) {
                    $newtag = new $this->tax;
                    $newtag->type = 'tag';
                    $newtag->dfname = $tag;
                    $newtag->dfslug = toSlug($tag);
                    $newtag->save();
                    $post->tags()->attach($newtag->id);
                }
            }
            if ($request->has('availtags')) {
                $post->tags()->attach($request->get('availtags'));
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        $post = $this->find($id);
        authorize_other('edit_posts', 'edit_others_posts', $post->author_id);
        if ($this->valid($request->all(), $this->rules())) {
            $post->image = get_path($request->get('image'));
            $post->status = $request->get('status');
            $post->author_id = auth()->user()->id;

            $post->update();

            $sync_langs = [];
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $name = $datalang['name'];
                $slug = $datalang['slug'];
                $post_desc = [
                    'name' => $name,
                    'slug' => (trim($slug) == '') ? toSlug($name) : toSlug($slug),
                    'excerpt' => $datalang['excerpt'],
                    'content' => $datalang['content']
                ];
                $sync_langs[$lang->id] = $post_desc;
            }
            $post->langs()->sync($sync_langs);

            $post->cats()->detach();
            if ($request->has('cats')) {
                $post->cats()->attach($request->get('cats'));
            }
            if ($request->has('newtags')) {
                $newtags = $request->get('newtags');
                foreach ($newtags as $tag) {
                    $newtag = new $this->tax;
                    $newtag->type = 'tag';
                    $newtag->dfname = $tag;
                    $newtag->dfslug = toSlug($tag);
                    $newtag->save();
                    $post->tags()->attach($newtag->id);
                }
            }
            if ($request->has('availtags')) {
                $post->tags()->attach($request->get('availtags'));
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $post = $this->find($id);
        authorize('delete_posts');
        $post->cats()->detach();
        $post->tags()->detach();
        $post->langs()->detach();
        $post->delete();
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
