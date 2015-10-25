<?php

namespace App\Repositories\User;

use App\Exceptions\ValidateException;
use App\Exceptions\NullException;
use App\Exceptions\ExcuteException;

use App\Repositories\BaseRepository;
use App\Repositories\User\UserInterface;

class UserRepository extends BaseRepository implements UserInterface {

    protected $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function rules($id=null) {
        if($id){
            $pass = 'min:5|confirmed';
        }else{
            $pass = 'required|min:5|confirmed';
        }
        return [
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => $pass
        ];
    }
    
    
    public function getByEmail($email, $columns = ['username', 'id']) {
        $user = $this->model->where('email', $email)->first($columns);
        if (is_null($user)) {
            throw new NullException('Không tìm thấy email này');
        }
        return $user;
    }

    public function create($request) {
        if ($this->valid($request->all(), $this->rules())) {
            $user = new $this->model;
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->password = bcrypt($request->get('password'));
            $user->active = $request->get('active');
            $user->group_id = $request->get('group_id');
            $user->save();
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function update($id, $request) {
        if ($this->valid($request->all(), $this->rules($id))) {
            $user = $this->find($id);
            $user->username = $request->get('username');
            $user->email = $request->get('email');
            $user->active = $request->get('active');
            if(trim($request->get('password')) != ''){
                $user->password = bcrypt($request->get('password'));
            }
            $user->group_id = $request->get('group_id');
            $user->update();
        } else {
            throw new ValidateException($this->getError());
        }
    }

    public function delete($id) {
        $user = $this->find($id);
        if(!$user->delete($id)){
            throw new ExcuteException('Không thể xóa!');
        }
    }

    public function massdel($request) {
        $ids = $request->get('massdel');
        if($ids){
            foreach ($ids as $id){
                $this->delete($id);
            }
        }
    }

}
