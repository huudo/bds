<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\User\UserInterface;
use App\Repositories\UserGroup\UserGroupInterface;


class UserController extends Controller {

    protected $user;
    protected $group;

    public function __construct(UserInterface $user, UserGroupInterface $group) {
        $this->user = $user;
        $this->group = $group;
    }

    public function index(Request $request) {
        authorize('list_users');
        
        $orderby = (empty(trim($request->get('orderby')))) ? 'id' : $request->get('orderby');
        $order = (empty(trim($request->get('order')))) ? 'asc' : $request->get('order');
        $items = $this->user->getAll(['*'], null, $orderby, $order);
        if($request->has('key')){
            $key = $request->get('key');
            $items = $this->user->search($key, 'username', null, 'username');
            if($request->has('orderby')){
                $items = $this->user->search($key, 'username', null, $orderby, $order);
            }
        }
        $data = [
            'title' => 'Quản lý tài khoản',
            'items' => $items,
            'groups' => [0 => 'Chọn nhóm']+$this->group->listAll(true)
        ];
        
        return view('backend.user.index', $data);
    }

    public function create() {
        authorize('create_users');
    }

    public function store(Request $request) {
        authorize('create_users');
        try {
            $this->user->create($request);
            return redirect()->back()->with('Mess', 'Thêm thành công');
        } catch (App\Exceptions\ValidateException $e) {
            return redirect()->back()->withInput()->withErrors($e->getErrors());
        }
    }

    public function edit($id) {
        authorize_other('edit_users', 'edit_others_users', $id);
        $data = [
            'title' => 'Chỉnh sửa tài khoản',
            'item' => $this->user->find($id),
            'groups' => [0=>'Chọn nhóm']+$this->group->listAll(true)
        ];
        return view('backend.user.edit', $data);
    }

    public function update($id, Request $request) {
        authorize_other('edit_users', 'edit_others_users', $id);
        try {
            $this->user->update($id, $request);
            return redirect()->route('admin.user.index')->with('Mess', 'Cập nhật thành công');
        } catch (\App\Exceptions\ValidateException $ex) {
            return redirect()->back()->withInput()->withErrors($ex->getError());
        }
    }

    public function destroy($id) {
        authorize('delete_users');
        $this->user->delete($id);
        return redirect()->back()->with('Mess', 'Đã xóa!');
    }

    public function massdel(Request $request) {
        authorize('delete_users');
        try {
            $this->user->massdel($request);
            return redirect()->back()->with('Mess', 'Đã xóa!');
        } catch (NullException $e) {
            return redirect()->back()->with('errorMess', $e->getErrors());
        }
    }
    
    public function editProfile(){
        if(auth()->check()){
            $data = [
                'title' => 'Thông tin tài khoản',
                'item' => auth()->user()
            ];
            return view('backend.user.profile', $data);
        }else{
            return redirect()->route('admin.login');
        }
    }
    
    public function updateProfile(Request $request){
        
    }

}
