<?php

namespace App\Repositories\Status;

use App\Repositories\BaseRepository;
use App\Repositories\Status\StatusInterface;
use App\Exceptions\ValidateException;

class StatusRepository extends BaseRepository implements StatusInterface {

    protected $model;


    public function __construct($model) {
        $this->model = $model;
    }

    public function rules(){
        $rules = [];
        foreach (get_langs() as $lang){
            $rules[$lang->code.'.name'] = 'required';
        }
        return $rules;
    }

    public function all($lang_id) {
        return $this->model->where('lang_id', $lang_id)->orderby('id', 'asc')->get();
    }
    
    public function find_lang($status_id, $lang_id=null, $columns=['*']){
        $lang_id = ($lang_id) ? $lang_id : current_lang();
        return $this->model->where('status_id', $status_id)->where('lang_id', $lang_id)->first($columns);
    }
    
    public function findEdit($status_id) {
        $result = new \stdClass();
        $result->status_id = $status_id;
        foreach (get_langs() as $lang){
            $code = $lang->code;
            $result->$code = $this->find_lang($status_id, $lang->id, ['name']);
        }
        return $result;
    }
    
    public function listAll($lang_id, $has_name = false) {       
        $lang_id = ($lang_id) ? $lang_id : current_lang_id();
        return $this->model->where('lang_id', $lang_id)->lists('name', 'status_id')->toArray();
    }

    public function create($request) {
        if ($this->valid($request->all(), $this->rules())) {
            $status_id = $this->nextId('status_id');
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $status = new $this->model;
                $status->name = $datalang['name'];
                $status->status_id = $status_id;
                $status->lang_id = $lang->id;
                $status->save();
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        if ($this->valid($request->all(), $this->rules())) {
            foreach (get_langs() as $lang) {
                $datalang = $request->get($lang->code);
                $status = $this->model->where('status_id', $id)->where('lang_id', $lang->id)->first();
                $status->name = $datalang['name'];
                $status->update();
            }
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        return $this->model->where('status_id', $id)->delete();
    }

    public function massdel($request) {
        $ids = $request->get('massdel');
        foreach ($ids as $id){
            $this->delete($id);
        }
    }

}
