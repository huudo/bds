<?php

namespace App\Repositories\UserGroup;

use App\Repositories\BaseRepository;
use App\Repositories\UserGroup\UserGroupInterface;

use DB;

class UserGroupRepository extends BaseRepository implements UserGroupInterface{
    
    protected $model;  
    protected $user;
    protected static $rules = [
        'name' => 'required'
    ];


    public function __construct($model, $user) {
        $this->model = $model;
        $this->user = $user;
    }
    
    public function listAll($name=false){
        if($name==true){
            return $this->model->lists('name', 'id')->toArray();
        }
        return $this->model->lists('id')->toArray();
    }

    public function create($request) {
        if(!$this->valid($request->all())){
            throw new ValidateException($this->getError());
        }
        $group = new $this->model;
        $name = $request->input('name');
        $group->name = $name;
        $slug = $request->input('slug');
        $group->slug = ($slug) ? toSlug($slug) : toSlug($name);
        $group->active = $request->input('active');
        if(!$group->save()){
            throw new ExcuteException('Không thể lưu dữ liệu!');
        }
    }
    
    public function update($id, $request) {
        if(!$this->valid($request->all())){
            throw new ValidateException($this->getError());
        }
        $group = $this->find($id);
        $name = $request->input('name');
        $group->name = $name;
        $slug = $request->input('slug');
        $group->slug = ($slug) ? toSlug($slug) : toSlug($name);
        $group->active = $request->input('active');
        if(!$group->update()){
            throw new ExcuteException('Không thể lưu dữ liệu!');
        }
    }

    public function delete($id) {
        DB::beginTransaction();
        $group = $this->find($id);
        $this->user->where('group_id', $id)->update(['group_id' => 0]);
        if(!$group->delete()){
            DB::rollBack();
            throw new ExcuteException('Không thể xóa!');
        }
        DB::commit();
    }

    public function massdel($request) {
        $ids = $request->get('massdel');
        if($ids){
            foreach ($ids as $id){
                $this->delete($id);
            }
        }else{
            throw new NullException('Không có dữ liệu!');
        }
    }

}
